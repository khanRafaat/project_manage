<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    DB::table('users')->insert([

            'name' => 'Adminstrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),

        ]);

        DB::table('users')->insert([

            'name' => 'Assignee',
            'email' => 'assignee@gmail.com',
            'password' => Hash::make('12345678'),
                
        ]);

        DB::table('roles')->insert([

            'name' => 'Administrator',
            'guard_name' => 'web',
           
                
        ]);


        
        DB::table('roles')->insert([

            'name' => 'Assingee',
            'guard_name' => 'web',
           
                
        ]);

        DB::table('model_has_roles')->insert([

            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' => '1',
           
                
        ]);

        DB::table('model_has_roles')->insert([

            'role_id' => '2',
            'model_type' => 'App\Models\User',
            'model_id' => '2',
           
                
        ]);

        DB::table('daily_task_users')->insert([

            'duty_time' => '8',
            'weekly_duty' => '6',
            'user_id' => '1',
           
                
        ]);

        DB::table('daily_task_users')->insert([

            'duty_time' => '8',
            'weekly_duty' => '6',
            'user_id' => '2',
           
                
        ]);



    }
}
