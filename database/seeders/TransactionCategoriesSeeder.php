<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaction_categories')->insert([
            ['name' => 'food'],
            ['name' => 'transportation'],
            ['name' => 'housing'],
            ['name' => 'utilities'],
            ['name' => 'clothing'],
            ['name' => 'health'],
            ['name' => 'insurance'],
            ['name' => 'personal'],
            ['name' => 'education'],
            ['name' => 'entertainment'],
            ['name' => 'miscellaneous']
        ]);
    }
}
