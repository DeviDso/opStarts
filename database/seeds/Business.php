<?php

use Illuminate\Database\Seeder;

class Business extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Accounting
', 'category' => '1'];
        $array[] = ['name' => 'Finance
', 'category' => '1'];
        $array[] = ['name' => 'Project Management
', 'category' => '1'];
        $array[] = ['name' => 'Business Plans
', 'category' => '1'];
        $array[] = ['name' => 'Business Analysis
', 'category' => '1'];
        $array[] = ['name' => 'Legal
', 'category' => '1'];
        $array[] = ['name' => 'Recruitment
', 'category' => '1'];
        $array[] = ['name' => 'Financial Analysis
', 'category' => '1'];
        $array[] = ['name' => 'Payroll
', 'category' => '1'];
        $array[] = ['name' => 'Management
', 'category' => '1'];
        $array[] = ['name' => 'Contracts
', 'category' => '1'];
        $array[] = ['name' => 'Human Resources
', 'category' => '1'];
        $array[] = ['name' => 'Intuit QuickBooks
', 'category' => '1'];
        $array[] = ['name' => 'Legal Writing
', 'category' => '1'];
        $array[] = ['name' => 'Salesforce.com
', 'category' => '1'];
        $array[] = ['name' => 'ERP
', 'category' => '1'];
        $array[] = ['name' => 'Legal Research
', 'category' => '1'];
        $array[] = ['name' => 'Risk Management
', 'category' => '1'];
        $array[] = ['name' => 'SAS
', 'category' => '1'];
        $array[] = ['name' => 'Xero
', 'category' => '1'];
        $array[] = ['name' => 'Tax
', 'category' => '1'];
        $array[] = ['name' => 'Inventory Management
', 'category' => '1'];
        $array[] = ['name' => 'Visa / Immigration
', 'category' => '1'];
        $array[] = ['name' => 'Attorney
', 'category' => '1'];
        $array[] = ['name' => 'Event Planning
', 'category' => '1'];
        $array[] = ['name' => 'MYOB
', 'category' => '1'];
        $array[] = ['name' => 'Personal Development
', 'category' => '1'];
        $array[] = ['name' => 'Audit
', 'category' => '1'];
        $array[] = ['name' => 'Crystal Reports
', 'category' => '1'];
        $array[] = ['name' => 'Employment Law
', 'category' => '1'];
        $array[] = ['name' => 'ISO9001
', 'category' => '1'];
        $array[] = ['name' => 'Public Relations
', 'category' => '1'];
        $array[] = ['name' => 'Fundraising
', 'category' => '1'];
        $array[] = ['name' => 'Patents
', 'category' => '1'];
        $array[] = ['name' => 'Property Development
', 'category' => '1'];
        $array[] = ['name' => 'Property Law
', 'category' => '1'];
        $array[] = ['name' => 'Compliance
', 'category' => '1'];
        $array[] = ['name' => 'Property Management
', 'category' => '1'];
        $array[] = ['name' => 'Entrepreneurship
', 'category' => '1'];
        $array[] = ['name' => 'Organizational Change Management
', 'category' => '1'];
        $array[] = ['name' => 'Autotask
', 'category' => '1'];
        $array[] = ['name' => 'Linnworks Order Management
', 'category' => '1'];
        $array[] = ['name' => 'Nintex Workflow
', 'category' => '1'];
        $array[] = ['name' => 'PeopleSoft
', 'category' => '1'];
        $array[] = ['name' => 'Startups
', 'category' => '1'];
        $array[] = ['name' => 'Tax Law
', 'category' => '1'];
        $array[] = ['name' => 'Nintex Forms
', 'category' => '1'];
        $array[] = ['name' => 'Unit4 Business World', 'category' => '1'];

        foreach($array as $a){
            \opStarts\Skills::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
                'category' => $a['category']
            ]);
        }
    }
}
