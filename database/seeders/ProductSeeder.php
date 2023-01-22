<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                "name"=>"Vivo Pro",
                "price"=>"3000",
                "category"=>"Mobile",
                "description"=>"This is very good mobile by ram anuj",
                "gallery"=>"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD…REBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERB//Z"
            ],
            [
                "name"=>"Oppo Pro",
                "price"=>"230000",
                "category"=>"Mobile",
                "description"=>"This is very good mobile by ram anuj",
                "gallery"=>"https://images.pexels.com/photos/1092644/pexels-photo-1092644.jpeg?auto=compress&cs=tinysrgb&w=600"
            ],
            [
                "name"=>"Samsung Pro",
                "price"=>"40000",
                "category"=>"Mobile",
                "description"=>"This is very good mobile by ram anuj",
                "gallery"=>"https://cdn1.smartprix.com/rx-iGNlyOFEo-w1200-h1200/GNlyOFEo.jpg"
            ]
           ]);
    }
}
