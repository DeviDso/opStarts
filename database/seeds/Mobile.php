<?php

use Illuminate\Database\Seeder;

class Mobile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Mobile Phone
'];
        $array[] = ['name' => 'Android
'];
        $array[] = ['name' => 'iPhone
'];
        $array[] = ['name' => 'iPad
'];
        $array[] = ['name' => 'Windows Phone
'];
        $array[] = ['name' => 'Palm
'];
        $array[] = ['name' => 'Windows Mobile
'];
        $array[] = ['name' => 'Geolocation
'];
        $array[] = ['name' => 'Amazon Kindle
'];
        $array[] = ['name' => 'Blackberry
'];
        $array[] = ['name' => 'Samsung
'];
        $array[] = ['name' => 'Android Honeycomb
'];
        $array[] = ['name' => 'Windows CE
'];
        $array[] = ['name' => 'Amazon Fire
'];
        $array[] = ['name' => 'Apple Watch
'];
        $array[] = ['name' => 'J2ME
'];
        $array[] = ['name' => 'Metro
'];
        $array[] = ['name' => 'WebOS
'];
        $array[] = ['name' => 'Appcelerator Titanium
'];
        $array[] = ['name' => 'Nokia
'];
        $array[] = ['name' => 'Symbian'];

        foreach($array as $a)
        {
            \opStarts\Skills::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
                'category' => '3'
            ]);
        }
    }
}
