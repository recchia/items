<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Root',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
