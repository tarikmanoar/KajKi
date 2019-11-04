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
        factory(User::class, 20)->create();
        factory(Profile::class, 20)->create();
        factory(Company::class, 20)->create();
//        factory(Category::class, 20)->create();
        $this->call(CrudSeeder::class);

        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software',
        ];
        foreach ($categories as $cat) {
            Category::create(['name' => $cat, 'slug' => str_slug($cat)]);
        }
        factory(Job::class, 20)->create();
    }
}
