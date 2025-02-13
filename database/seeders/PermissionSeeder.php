<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "user-list",
            "user-create",
            "user-edit",
            "user-delete",
            "role-list",
            "role-create",
            "role-edit",
            "role-delete",
            "product-list",
            "product-create",
            "product-edit",
            "product-delete",
        ];
        foreach ($permissions as $key => $permission) {
        Permission::create(['name' => $permission]);
    }
}
}
