<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date=Carbon::now();
        DB::table('roles')->insert([
         ['title_roles'=>'Пользователь', 'created_at'=>$date,'updated_at'=>$date],
         ['title_roles'=>'Администратор', 'created_at'=>$date,'updated_at'=>$date],
        ]);
    }
}
