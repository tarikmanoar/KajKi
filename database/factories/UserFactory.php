<?php

/** @var Factory $factory */

use App\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Job;
use App\Models\Profile;
use App\Models\Album;
use App\Models\Contact;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name('Male'),
        'email'             => $faker->unique()->safeEmail,
        'role'              => 'seeker',
        'email_verified_at' => now(),
        'password'          => bcrypt('12345'), // password
        'remember_token'    => Str::random(10),
    ];
});
$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id'      => User::all()->random()->id,
        'address'      => $faker->address,
        'gender'       => 'Male',
        'dob'          => $faker->date('Y-m-d'),
        'experience'   => 'Good',
        'bio'          => $faker->sentence(3),
        'cover_latter' => $faker->sentence(3),
        'resume'       => $faker->domainName,
        'avatar'       => $faker->imageUrl(250, 250)
    ];
});
$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id'     => User::all()->random()->id,
        'cname'       => $name = $faker->company,
        'slug'        => Str::slug($name),
        'address'     => $faker->address,
        'phone'       => $faker->unique()->phoneNumber,
        'email'       => $faker->unique()->safeEmail,
        'website'     => $faker->domainName,
        'logo'        => $faker->imageUrl('300', '300'),
        'cover_photo' => $faker->imageUrl('1366', '768'),
        'slogan'      => 'Learn-earn and grow',
        'description' => $faker->paragraph(rand(2, 20))
    ];
});

//$factory->define(Category::class, function (Faker $faker) {
//    return [
//        'name' => $name = $faker->name,
//        'slug' => Str::slug($name)
//    ];
//});

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id'     => User::all()->random()->id,
        'company_id'  => Company::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'title'       => $name = $faker->text,
        'slug'        => Str::slug($name),
        'description' => $faker->paragraph(rand(2, 20)),
        'position'    => $faker->jobTitle,
        'roles'    => $faker->text,
        'address'     => $faker->address,
        'job_type'    => 'Full Time',
        'status'      => rand(0, 1),
        'last_date'   => $faker->date('Y-m-d'),
    ];
});


