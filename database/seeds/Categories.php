<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list[] = ['name' => 'Events', 'name_dk' => 'Begivenheder'];
        $list[] = ['name' => 'Wellness and beauty', 'name_dk' => 'Wellness og skønhed'];
        $list[] = ['name' => 'Clothes and footwear', 'name_dk' => 'Tøj og sko'];
        $list[] = ['name' => 'Jewelry and accessories', 'name_dk' => 'Smykker og tilbehør'];
        $list[] = ['name' => 'Household, repairs & cleaning ', 'name_dk' => 'Household, reparationer og rengøring'];
        $list[] = ['name' => 'Building construction and interior', 'name_dk' => 'Byggevirksomhed og interiør'];
        $list[] = ['name' => 'IT Services', 'name_dk' => 'IT-Service'];
        $list[] = ['name' => 'Transportation', 'name_dk' => 'Transport'];
        $list[] = ['name' => 'Artworks', 'name_dk' => 'Kunstværker'];
        $list[] = ['name' => 'Rental services', 'name_dk' => 'Udlejning tjenester'];
        $list[] = ['name' => 'Craftsmanship', 'name_dk' => 'Håndværk'];
        $list[] = ['name' => 'Education and training', 'name_dk' => 'Uddannelse og træning'];
        $list[] = ['name' => 'Finance, Sales and Marketing', 'name_dk' => 'Finans, Salg og Marketing'];
        $list[] = ['name' => 'Social and Health', 'name_dk' => 'Social og sundhed'];
        $list[] = ['name' => 'Security & Surveillance', 'name_dk' => 'Sikkerhed og overvågning'];
        $list[] = ['name' => 'Hospitality, restaurant  and tourism', 'name_dk' => 'Gæstfrihed, restaurant og turisme'];

        foreach ($list as $l) {
            \opStarts\Categories::create([
                'name' => $l['name'],
                'name_dk' => htmlentities($l['name_dk'], ENT_QUOTES, "utf-8"),
                'slug' => str_slug($l['name']),
                'slug_dk' => htmlentities(str_slug($l['name_dk']), ENT_QUOTES, "utf-8"),
                'icon' => '<i class="fa fa-laptop fa-3x" aria-hidden="true"></i>'
            ]);
        }

    }
}
