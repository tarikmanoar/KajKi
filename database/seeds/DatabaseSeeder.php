<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Job;
use App\Models\Profile;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         factory(User::class,20)->create();
         factory(Profile::class,20)->create();
         factory(Company::class,20)->create();
         factory(Category::class,20)->create();
         factory(Job::class,20)->create();
    }
}
