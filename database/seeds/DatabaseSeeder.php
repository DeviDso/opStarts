<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrentStatus::class);
        $this->call(SkillCategories::class);
        $this->call(Business::class);
        $this->call(Categories::class);
        $this->call(Content::class);
        $this->call(Data::class);
        $this->call(Design::class);
        $this->call(Engineering::class);
        $this->call(IT::class);
        $this->call(Local::class);
        $this->call(Marketing::class);
        $this->call(Mobile::class);
        $this->call(Other::class);
        $this->call(ProductSourcing::class);
        $this->call(Translations::class);
        $this->call(CompanyTypes::class);
    }
}
