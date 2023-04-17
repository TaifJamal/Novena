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
        $permissions=[
            'award-list','award-create','award-edit','award-delete',
            'testimonial-list', 'testimonial-create', 'testimonial-edit', 'testimonial-delete',
            'partner-list','partner-create','partner-edit','partner-delete',
            'about-list','about-create','about-edit','about-delete',
            'department-list','department-create','department-edit','department-delete',
            'feature-list','feature-create','feature-edit','feature-delete',
            'schedules-list', 'schedules-create', 'schedules-edit', 'schedules-delete',
            'doctor-list', 'doctor-create', 'doctor-edit', 'doctor-delete',
            'qualification-list', 'qualification-create', 'qualification-edit', 'qualification-delete',
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
        ];

        foreach( $permissions as  $permission){
            Permission::create([
                'name'=>$permission,
            ]);
        }
    }
}
