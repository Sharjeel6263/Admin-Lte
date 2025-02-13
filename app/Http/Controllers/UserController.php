<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserRegisteredMail;
use App\Mail\ExistingUserMail;
use Illuminate\Support\Facades\Mail;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function sendMail($id)
{
    $user = User::find($id);

    Mail::to($user->email)->send(new ExistingUserMail($user));

    return redirect()->route('users.index')->with('success', 'Email sent to ' . $user->name);
}

    public function __construct()
    {
        $this->middleware(['permission:user-create'], ["only" => ["create", "store"]]);
        $this->middleware(['permission:user-list'], ["only" => ["index", "show"]]);
        $this->middleware(['permission:user-edit'], ["only" => ["edit", "update"]]);
        $this->middleware(['permission:user-delete'], ["only" => ["destroy"]]);
    }


    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = User::all();
        return view("users.index", compact("users"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("users.create" , compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $this->validate($request, [
        "name" => "required",
        "email" => "required|email|unique:users,email",
        "phone_number" => "required",
        "password" => "required|min:6",
    ]);

    $user = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "phone_number" => $request->phone_number,
        "password" => Hash::make($request->password),
    ]);

    $user->syncRoles($request->roles);
    Mail::to($user->email)->send(new UserRegisteredMail($user));

    return redirect()->route("users.index")->with("success", "User Stored and Email Sent Successfully");
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view("users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::find($id);
        $roles = Role::all();
        return view("users.edit", compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate( [
            "name"=> "required",
            "email"=> "required|email",
            "phone_number"=> "required",
            "password"=> "required",
            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->save();

            $user->syncRoles($request->roles);


            return redirect()->route("users.index")->with("success","User Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("users.index")->with("success","User Deleted");
    }
}
