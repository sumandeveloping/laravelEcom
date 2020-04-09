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
        // * creating random products
        // laptops
        for ($i=1; $i <= 30 ; $i++) { 
            # code...
            Product::create([
                'name' => 'Laptop '. $i,
                'slug' => 'laptop-'. $i,
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1,2,3][array_rand([1,2,3])] . ' TB SSD, 32 GB RAM',
                'price' => mt_rand(1232,3456),
                'description' => 'Laptop ' . $i .' is a great laptop.Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate vitae voluptates numquam voluptatibus? In earum tempore a  amet expedita dignissimos, quod cumque quis cupiditate.'        
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        //desktops
        for ($i=1; $i <= 9; $i++) { 
            # code...
            Product::create([
                'name' => 'Desktop '. $i,
                'slug' => 'desktop-'. $i,
                'details' => [24,25,27][array_rand([24,25,27])] . ' inch, ' . [1,2,3][array_rand([1,2,3])] . ' TB SSD, 32 GB RAM',
                'price' => mt_rand(2564,5256),
                'description' => 'Desktop ' . $i .' is a great desktop.Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate vitae voluptates numquam voluptatibus? In earum tempore a  amet expedita dignissimos, quod cumque quis cupiditate.'        
            ])->categories()->attach(2);
        }

        // Phones
        for ($i = 1; $i <= 9; $i++) {
            #code
            Product::create([
                'name' => 'Phone ' . $i,
                'slug' => 'phone-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [7, 8, 9][array_rand([7, 8, 9])] . ' inch screen, 4GHz Quad Core',
                'price' => rand(79999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(3);
        }

        // Tablets
        for ($i = 1; $i <= 9; $i++) {
            #code
            Product::create([
                'name' => 'Tablet ' . $i,
                'slug' => 'tablet-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [10, 11, 12][array_rand([10, 11, 12])] . ' inch screen, 4GHz Quad Core',
                'price' => rand(49999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(4);
        }

        // TVs
        for ($i = 1; $i <= 9; $i++) {
            #code
            Product::create([
                'name' => 'TV ' . $i,
                'slug' => 'tv-' . $i,
                'details' => [46, 50, 60][array_rand([7, 8, 9])] . ' inch screen, Smart TV, 4K',
                'price' => rand(79999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(5);
        }

        // Cameras
        for ($i = 1; $i <= 9; $i++) {
            #code
            Product::create([
                'name' => 'Camera ' . $i,
                'slug' => 'camera-' . $i,
                'details' => 'Full Frame DSLR, with 18-55mm kit lens.',
                'price' => rand(79999, 249999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(6);
        }

         // Appliances
        for ($i = 1; $i <= 9; $i++) {
            #code
            Product::create([
                'name' => 'Appliance ' . $i,
                'slug' => 'appliance-' . $i,
                'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, dolorum!',
                'price' => rand(79999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(7);
        }

        //macbook pro
        Product::create([
            'name' => 'Macbook Pro',
            'slug' => 'macbook-pro',
            'details' => '15 inch, 1TB SSD, 32 GB RAM',
            'price' => 2455,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
                            vitae voluptates numquam voluptatibus? In earum tempore a
                            amet expedita dignissimos, quod cumque quis cupiditate.'
        ])->categories()->attach(1);

        // Product::create([
        //     'name' => 'Laptop 1',
        //     'slug' => 'laptop-1',
        //     'details' => '15 inch, 1TB SSD, 16 GB RAM',
        //     'price' => 1056,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
        //                     vitae voluptates numquam voluptatibus? In earum tempore a
        //                     amet expedita dignissimos, quod cumque quis cupiditate.'
        // ]);
        // Product::create([
        //     'name' => 'Laptop 2',
        //     'slug' => 'laptop-2',
        //     'details' => '15 inch, 1TB SSD, 16 GB RAM',
        //     'price' => 1056,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
        //                     vitae voluptates numquam voluptatibus? In earum tempore a
        //                     amet expedita dignissimos, quod cumque quis cupiditate.'
        // ]);

        // Product::create([
        //     'name' => 'Laptop 3',
        //     'slug' => 'laptop-3',
        //     'details' => '15 inch, 1TB SSD, 16 GB RAM',
        //     'price' => 1056,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
        //                     vitae voluptates numquam voluptatibus? In earum tempore a
        //                     amet expedita dignissimos, quod cumque quis cupiditate.'
        // ]);

        // Product::create([
        //     'name' => 'Laptop 4',
        //     'slug' => 'laptop-4',
        //     'details' => '15 inch, 1TB SSD, 16 GB RAM',
        //     'price' => 1056,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
        //                     vitae voluptates numquam voluptatibus? In earum tempore a
        //                     amet expedita dignissimos, quod cumque quis cupiditate.'
        // ]);
        // Product::create([
        //     'name' => 'Laptop 5',
        //     'slug' => 'laptop-5',
        //     'details' => '15 inch, 1TB SSD, 16 GB RAM',
        //     'price' => 1056,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita provident est dignissimos, officia at cupiditate 
        //                     vitae voluptates numquam voluptatibus? In earum tempore a
        //                     amet expedita dignissimos, quod cumque quis cupiditate.'
        // ]);

    }
}
