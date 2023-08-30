<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Status;

use Illuminate\Database\Seeder;

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
        $user = [
            [
                'name'=>'I am Admin',
                'email'=>'admin@gmail.com',
                'is_permission'=>'-1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Reviewer',
                'email'=>'rev@gmail.com',
                'is_permission'=>'1',
                'password'=> bcrypt('123456'),
            ],

            [
                'name'=>'Student',
                'email'=>'std@gmail.com',
                'is_permission'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];


//        $status = [
//            [
//                'mahalpola_name' => 'Expect the next installment soon',
//                'status' => 'Not in progress',
//                'level' => '0'
//            ]
//        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

//        foreach ($status as $key => $value) {
//            Status::create($value);
//        }
    }
}
