<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date=Carbon::now();
        DB::table('categories')->insert([
        ['name'=>'Политика', 'created_at'=>$date, 'updated_at'=>$date],
        ['name'=>'Общество', 'created_at'=>$date, 'updated_at'=>$date],
        ['name'=>'Спорт', 'created_at'=>$date, 'updated_at'=>$date],
        ['name'=>'Культура,наука и технологии', 'created_at'=>$date, 'updated_at'=>$date],
        ['name'=>'Экономика', 'created_at'=>$date, 'updated_at'=>$date],
    ]);
    }
}
