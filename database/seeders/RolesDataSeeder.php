<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $ability = [
     'all_department'=>'All Department',
     'add_department'=>'Add new Department',
     'delete_department'=>'Delete Department',
     'edit_department'=>'Edit Department',

     'all_feature'=>'All Feature',
     'add_feature'=>'Add new Feature',
     'delete_feature'=>'Delete Feature',
     'edit_feature'=>'Edit Feature',

     'all_about'=>'All About',
     'add_about'=>'Add new About',
     'delete_about'=>'Delete About',
     'edit_about'=>'Edit About',

     'all_award'=>'All Award',
     'add_award'=>'Add new Award',
     'delete_award'=>'Delete Award',
     'edit_award'=>'Edit Award',

     'all_partner'=>'All Partner',
     'add_partner'=>'Add new Partner',
     'delete_partner'=>'Delete Partner',
     'edit_partner'=>'Edit Partner',

     'all_doctor'=>'All Doctor',
     'add_doctor'=>'Add new Doctor',
     'delete_doctor'=>'Delete Doctor',
     'edit_doctor'=>'Edit Doctor',

     'all_qualification'=>'All Qualification',
     'add_qualification'=>'Add new Qualification',
     'delete_qualification'=>'Delete Qualification',
     'edit_qualification'=>'Edit Qualification',

     'all_testimonial'=>'All Testimonial',
     'add_testimonial'=>'Add new Testimonial',
     'delete_testimonial'=>'Delete Testimonial',
     'edit_testimonial'=>'Edit Testimonial',

     'all_user'=>'All User',
     'add_user'=>'Add new User',
     'delete_user'=>'Delete User',

     'all_schedule'=>'All Schedule',
     'add_schedule'=>'Add new Schedule',
     'delete_schedule'=>'Delete Schedule',
     'edit_schedule'=>'Edit Schedule',

     'all_role'=>'All Role',
     'add_role'=>'Add new Role',
     'delete_role'=>'Delete Role',
     'edit_role'=>'Edit Role',


    ];
    public function run()
    {
        Ability::truncate();
        Role::truncate();

        $data= [
            ['name'=>'Super Admin'],
            ['name'=>'Department Manger'],
            ['name'=>'Doctor Manger']
        ];
        Role::insert($data);

        foreach($this->ability as $code=>$name){
           Ability::create([
               'name'=>$name,
               'code'=>$code,
           ]);
        }
    }
}
