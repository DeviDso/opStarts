<?php

use Illuminate\Database\Seeder;

class Other extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Anything Goes
'];
        $array[] = ['name' => 'Freelance
'];
        $array[] = ['name' => 'Testing / QA
'];
        $array[] = ['name' => 'XXX
'];
        $array[] = ['name' => 'Education &amp; Tutoring
'];
        $array[] = ['name' => 'Financial Markets
'];
        $array[] = ['name' => 'Training
'];
        $array[] = ['name' => 'Psychology
'];
        $array[] = ['name' => 'Weddings
'];
        $array[] = ['name' => 'Dating
'];
        $array[] = ['name' => 'Health
'];
        $array[] = ['name' => 'Test Automation
'];
        $array[] = ['name' => 'Cooking &amp; Recipes
'];
        $array[] = ['name' => 'Jewellery
'];
        $array[] = ['name' => 'Nutrition
'];
        $array[] = ['name' => 'Real Estate
'];
        $array[] = ['name' => 'Sports
'];
        $array[] = ['name' => 'Energy
'];
        $array[] = ['name' => 'Insurance
'];
        $array[] = ['name' => 'Life Coaching
'];
        $array[] = ['name' => 'Valuation &amp; Appraisal
'];
        $array[] = ['name' => 'Troubleshooting
'];
        $array[] = ['name' => 'Business Coaching
'];
        $array[] = ['name' => 'Automotive
'];
        $array[] = ['name' => 'Pattern Making
'];
        $array[] = ['name' => 'Christmas
'];
        $array[] = ['name' => 'Flashmob
'];
        $array[] = ['name' => 'Genealogy
'];
        $array[] = ['name' => 'History
'];
        $array[] = ['name' => 'Brain Storming'];

        foreach($array as $a)
        {
            \opStarts\Skills::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
                'category' => '10'
            ]);
        }
    }
}
