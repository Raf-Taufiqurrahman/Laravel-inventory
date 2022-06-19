<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super Admin']);

        $permissions = Permission::whereIn('name', [
            'index-order', 'create-order', 'index-rent', 'create-rent', 'index-transaction', 'create-transaction'
        ])->get();

        $role = Role::create(['name' => 'Customer']);

        $role->givePermissionTo($permissions);
    }
}
