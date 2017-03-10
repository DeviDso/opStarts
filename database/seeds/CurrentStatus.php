<?php

use Illuminate\Database\Seeder;

class CurrentStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Unemployed'];
        $array[] = ['name' => 'Full-time employee'];
        $array[] = ['name' => 'Part-time employee'];
        $array[] = ['name' => 'Freelancer'];
        $array[] = ['name' => 'University graduate'];
        $array[] = ['name' => 'Student'];

        foreach($array as $a)
        {
            \opStarts\CurrentStatus::create([
                'name' => $a['name'],
            ]);
        }
    }
}
