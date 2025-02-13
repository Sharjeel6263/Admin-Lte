@component('mail::message')
# Welcome, {{ $user->name }}!

Your account has been successfully created.

@component('mail::button', ['url' => url('/home')])
Visit Our Website
@endcomponent

Thanks,<br>
OctalSol
@endcomponent
