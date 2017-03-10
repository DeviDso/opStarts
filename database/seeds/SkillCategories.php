<?php

use Illuminate\Database\Seeder;

class SkillCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Business, Accounting, Human Resources & Legal'];
        $array[] = ['name' => 'Websites, IT & Software'];
        $array[] = ['name' => 'Mobile phones & Computing'];
        $array[] = ['name' => 'Writing & Content'];
        $array[] = ['name' => 'Data Entry & Admin'];
        $array[] = ['name' => 'Design, Media & Architecture'];
        $array[] = ['name' => 'Engineering & Science'];
        $array[] = ['name' => 'Local Jobs & Services'];
        $array[] = ['name' => 'Sales & Marketing'];
        $array[] = ['name' => 'Other'];
        $array[] = ['name' => 'Product Sourcing & Manufacturing'];
        $array[] = ['name' => 'Translation & Languages'];

        foreach($array as $a)
        {
            \opStarts\SkillsCategory::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
            ]);
        }
    }
}
