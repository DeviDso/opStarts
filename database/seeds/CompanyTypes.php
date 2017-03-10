<?php

use Illuminate\Database\Seeder;

class CompanyTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Private Limited Company', 'Public Limited Company', 'General Partnership', 'Limited Partnership ', 'Sole Proprietorship'];

        foreach($array as $a)
        {
            \opStarts\CompanyTypes::create([
                'name' => $a,
                'slug' => str_slug($a),
            ]);
        }
    }
}
