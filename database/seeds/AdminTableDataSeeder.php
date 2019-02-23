<?php

use App\model\Admin;
use App\model\auther;
use App\model\category;
use App\model\Setting;
use Illuminate\Database\Seeder;

class AdminTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'rupan',
            'password' => '$2y$10$DLzbZbUM0ahFtA3681uUOuRJjUcREfqKIv6YiSXkt/2P9iRUh9SuC',
            'email' => 'rupandangol87@gmail.com',
            'address' => 'kathmandu',
            'phone' => '9813957417',
            'status' => 1,

        ]);
        for ($i = 0; $i < 3; $i++) {
            category::create([
                'title' => str_random(8),
                'status' => 1,
            ]);
            auther::create([
                'name' => str_random(8),
                'status' => 1
            ]);
        }
        Setting::create([
            'noOfIssue' => 2,
            'fineAmount' => 10,
            'returnTime' => '15days',
        ]);
    }
}
