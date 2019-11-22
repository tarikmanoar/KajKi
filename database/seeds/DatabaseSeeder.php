<?php

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();
        factory(Profile::class, 20)->create();
        factory(Company::class, 20)->create();
//        factory(Category::class, 20)->create();
        $this->call(CrudSeeder::class);

        $categories = [
            'Accounting / Finanace'      => 'flaticon-calculator',
            'Automotive Jobs'            => 'flaticon-wrench',
            'Construction / Facilities'  => 'flaticon-worker',
            'Telecommunications'         => 'flaticon-telecommunications',
            'Healthcare'                 => 'flaticon-stethoscope',
            'Design, Art & Multimedia'   => 'flaticon-computer-graphic',
            'Transportation & Logistics' => 'flaticon-trolley',
            'Restaurant / Food Service'  => 'flaticon-restaurant'
        ];
        foreach ($categories as $cat => $icon) {
            Category::create(['name' => $cat, 'slug' => str_slug($cat), 'icon' => $icon]);
        }
        factory(Job::class, 20)->create();
    }
}
