<?php

use Illuminate\Database\Seeder;

class ProductSourcing extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Product Design
'];
        $array[] = ['name' => 'Supplier Sourcing
'];
        $array[] = ['name' => 'Manufacturing
'];
        $array[] = ['name' => 'Product Sourcing
'];
        $array[] = ['name' => 'Buyer Sourcing
'];
        $array[] = ['name' => 'Logistics &amp; Shipping
'];
        $array[] = ['name' => '3D Printing'];

        foreach($array as $a)
        {
            \opStarts\Skills::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
                'category' => '11',
            ]);
        }
    }
}
