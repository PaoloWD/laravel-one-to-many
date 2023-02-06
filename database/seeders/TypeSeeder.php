<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
               'e-commerce',
               'personal',
               'other catego'
            ];
            foreach ($categories as $category) {
                $newCategory = new Type();
                $newCategory->name = $category;
                $newCategory->save();
            }
    }
}