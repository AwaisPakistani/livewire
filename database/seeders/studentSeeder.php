<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stdentrecord=[
            ['id'=>1,'name'=>'Arman','email'=>'arman@gmail.com','mobile'=>'879878787'],
            ['id'=>2,'name'=>'Maria','email'=>'maria@gmail.com','mobile'=>'7676676']

           ];

           Student::insert($stdentrecord);
    }
}
