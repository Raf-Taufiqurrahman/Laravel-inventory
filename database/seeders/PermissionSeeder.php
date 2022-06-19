<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'index-dashboard']);
        Permission::create(['name' => 'index-product']);
        Permission::create(['name' => 'create-product']);
        Permission::create(['name' => 'delete-product']);
        Permission::create(['name' => 'update-product']);
        Permission::create(['name' => 'index-category']);
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'delete-category']);
        Permission::create(['name' => 'update-category']);
        Permission::create(['name' => 'index-supplier']);
        Permission::create(['name' => 'create-supplier']);
        Permission::create(['name' => 'delete-supplier']);
        Permission::create(['name' => 'update-supplier']);
        Permission::create(['name' => 'index-vehicle']);
        Permission::create(['name' => 'create-vehicle']);
        Permission::create(['name' => 'delete-vehicle']);
        Permission::create(['name' => 'update-vehicle']);
        Permission::create(['name' => 'index-stock']);
        Permission::create(['name' => 'create-stock']);
        Permission::create(['name' => 'index-permission']);
        Permission::create(['name' => 'create-permission']);
        Permission::create(['name' => 'delete-permission']);
        Permission::create(['name' => 'update-permission']);
        Permission::create(['name' => 'index-role']);
        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'delete-role']);
        Permission::create(['name' => 'update-role']);
        Permission::create(['name' => 'index-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'index-order']);
        Permission::create(['name' => 'create-order']);
        Permission::create(['name' => 'index-rent']);
        Permission::create(['name' => 'create-rent']);
        Permission::create(['name' => 'index-transaction']);
        Permission::create(['name' => 'create-transaction']);
    }
}
