<?php

use Illuminate\Database\Seeder;

class Marketing extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Internet Marketing
'];
        $array[] = ['name' => 'Marketing
'];
        $array[] = ['name' => 'Sales
'];
        $array[] = ['name' => 'Facebook Marketing
'];
        $array[] = ['name' => 'Social Media Marketing
'];
        $array[] = ['name' => 'Advertising
'];
        $array[] = ['name' => 'Leads
'];
        $array[] = ['name' => 'Telemarketing
'];
        $array[] = ['name' => 'Internet Research
'];
        $array[] = ['name' => 'Email Marketing
'];
        $array[] = ['name' => 'Bulk Marketing
'];
        $array[] = ['name' => 'WooCommerce
'];
        $array[] = ['name' => 'Google Adwords
'];
        $array[] = ['name' => 'Branding
'];
        $array[] = ['name' => 'eBay
'];
        $array[] = ['name' => 'Market Research
'];
        $array[] = ['name' => 'Classifieds Posting
'];
        $array[] = ['name' => 'CRM
'];
        $array[] = ['name' => 'Affiliate Marketing
'];
        $array[] = ['name' => 'Search Engine Marketing
'];
        $array[] = ['name' => 'Google Adsense
'];
        $array[] = ['name' => 'Mailchimp
'];
        $array[] = ['name' => 'Viral Marketing
'];
        $array[] = ['name' => 'Journalist
'];
        $array[] = ['name' => 'Conversion Rate Optimisation
'];
        $array[] = ['name' => 'Etsy
'];
        $array[] = ['name' => 'Ad Planning &amp; Buying
'];
        $array[] = ['name' => 'Mailwizz
'];
        $array[] = ['name' => 'MLM
'];
        $array[] = ['name' => 'Airbnb
'];
        $array[] = ['name' => 'Visual Merchandising
'];
        $array[] = ['name' => 'Periscope'];

        foreach($array as $a)
        {
            \opStarts\Skills::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
                'category' => '9',
            ]);
        }
    }
}
