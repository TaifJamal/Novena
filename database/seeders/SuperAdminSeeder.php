<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'name'=> 'SuperAdmin',
            'email'=> 'SuperAdmin@gimal.com',
            'password'=> Hash::make('SuperAdmin123'),
            'type'=> 'admin',
        ]);

        $role= Role::create([
            'name'=> 'SuperAdmin',
        ]);

        $permission= Permission::pluck('id')->all();
        $role->syncPermissions($permission);
        $user->assignRole($role->id);



    }
}
