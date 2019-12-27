<?php

/** @var Factory $factory */

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
        'role'              => $faker->randomElement(['seeker', 'employer']),
        'email_verified_at' => now(),
        'password'          => bcrypt('12345'), // password
        'remember_token'    => Str::random(10),
    ];
});
$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id'      => User::all()->random()->id,
        'address'      => $faker->address,
        'gender'       => $faker->randomElement(['Male', 'Female']),
        'dob'          => Carbon::parse($faker->dateTimeBetween('-25 years', '-15 years'))->format('Y-m-d'),
        'experience'   => 'Good',
        'phone_number' => $faker->unique()->phoneNumber,
        'bio'          => $faker->realText(80),
        'cover_latter' => $faker->realText(80),
        'resume'       => 'Eel4a.pdf',
        'avatar'       => $faker->randomElement(['bag.png', 'man.jpg']),
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
        'logo'        => $faker->randomElement(['logo.jpg', 'bag.png', 'man.jpg']),
        'cover_photo' => $faker->randomElement(['cv1.jpg', 'cv2.png']),
        'slogan'      => $faker->randomElement([
            '"The Few. The Proud. The Marines"',
            '"Maybe she\'s born with it. Maybe it\'s Maybelline."',
            '"Like a Good Neighbor, State Farm is There"',
            '"All the News That\'s Fit to Print"',
            '"Advancement Through Technology"',
            '"We Power Transactions That Drive Commerce"',
            '"It Does Exactly What It Says on the Tin."'
        ]),
        'description' => $faker->realText(200,5)
    ];
});

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id'           => User::all()->random()->id,
        'company_id'        => Company::all()->random()->id,
        'category_id'       => Category::all()->random()->id,
        'title'             => $name = $faker->realText(55),
        'slug'              => Str::slug($name),
        'description'       => $faker->realText(200,5),
        'position'          => $faker->jobTitle,
        'roles'             => $faker->realText,
        'address'           => $faker->address,
        'job_type'          => $faker->randomElement(['Full Time', 'Part Time', 'Casual']),
        'status'            => rand(0, 1),
        'last_date'         => $faker->date('Y-m-d'),
        'number_of_vacancy' => rand(1, 10),
        'experience'        => rand(1, 10),
        'gender'            => $faker->randomElement(['Male', 'Female', 'Any']),
        'salary'            => rand(10000, 50000)
    ];
});


