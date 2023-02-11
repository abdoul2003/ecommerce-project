<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->insert([
        //     [
        //         'name' => 'PC Mac',
        //         'price' => 500000,
        //         'category' => 'Machine',
        //         'description' => 'RAM: 16Go / DD: 1Tera / Processeur: Core i5',
        //         'gallery' => 'pc-mac.jpg',
        //     ],
        //     [
        //         'name' => 'PC Dell',
        //         'price' => 100000,
        //         'category' => 'Machine',
        //         'description' => 'RAM: 2Go / DD: 400Go / Processeur: Core i3',
        //         'gallery' => 'pc-dell.jpg',
        //     ]
        // ]);
        DB::table('products')->insert([
            'name' => 'PC Apple',
            'price' => 900000,
            'category' => 'Ordinateur',
            'description' => 'RAM: 16Go / DD: 2Tera / Processeur: Core i6',
            'gallery' => 'pc-apple.jpg',
        ]);
    }
}
