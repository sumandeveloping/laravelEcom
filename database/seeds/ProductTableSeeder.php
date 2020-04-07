<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating random products
        Product::create([
            'name' => 'Macbook Pro',
            'slug' => 'macbook-pro',
            'details' => '15 inch, 1TB SSD, 32 GB RAM',
            'price' => 2455,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
                            vitae voluptates numquam voluptatibus? In earum tempore a
                            amet expedita dignissimos, quod cumque quis cupiditate.'
        ]);

        Product::create([
            'name' => 'Laptop 1',
            'slug' => 'laptop-1',
            'details' => '15 inch, 1TB SSD, 16 GB RAM',
            'price' => 1056,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
                            vitae voluptates numquam voluptatibus? In earum tempore a
                            amet expedita dignissimos, quod cumque quis cupiditate.'
        ]);
        Product::create([
            'name' => 'Laptop 2',
            'slug' => 'laptop-2',
            'details' => '15 inch, 1TB SSD, 16 GB RAM',
            'price' => 1056,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
                            vitae voluptates numquam voluptatibus? In earum tempore a
                            amet expedita dignissimos, quod cumque quis cupiditate.'
        ]);

        Product::create([
            'name' => 'Laptop 3',
            'slug' => 'laptop-3',
            'details' => '15 inch, 1TB SSD, 16 GB RAM',
            'price' => 1056,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
                            vitae voluptates numquam voluptatibus? In earum tempore a
                            amet expedita dignissimos, quod cumque quis cupiditate.'
        ]);

        Product::create([
            'name' => 'Laptop 4',
            'slug' => 'laptop-4',
            'details' => '15 inch, 1TB SSD, 16 GB RAM',
            'price' => 1056,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
                            vitae voluptates numquam voluptatibus? In earum tempore a
                            amet expedita dignissimos, quod cumque quis cupiditate.'
        ]);
        Product::create([
            'name' => 'Laptop 5',
            'slug' => 'laptop-5',
            'details' => '15 inch, 1TB SSD, 16 GB RAM',
            'price' => 1056,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
                            vitae voluptates numquam voluptatibus? In earum tempore a
                            amet expedita dignissimos, quod cumque quis cupiditate.'
        ]);

    }
}
