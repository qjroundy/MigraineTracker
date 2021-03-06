<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $gender = $faker->randomElement([
        'Androgynous', 'Agender', 'Bigender', 'Cisgender Female', 'Cisgender Male',
        'FTM', 'Gender Fluid', 'Gender Nonconforming', 'Gender Variant', 'Genderqueer', 
        'Intersex', 'MTF', 'Neither', 'Neutrois', 'Non-binary', 'Other', 'Pangender', 
        'Transgender', 'Transexual person', 'Transmasculine', 'Transfeminine', 'Two-Spirit'
    ]);

    return [
        'name' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'gender' => $gender,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date,
        'has_diabetes' => $faker->boolean(),
        'has_glasses' => $faker->boolean(),
        'last_eye_exam' => $faker->dateTime,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Journal::class, function (Faker\Generator $faker) {
    $data = [
        'name' => $faker->sentence(5),
        'description' => $faker->paragraph(10),
        'severity' => $faker->numberBetween(0,10),
        'location_city' => 'Pensacola',
        'location_state' => 'FL',
        'location_zip' => strval(32514),
        'location_country' => 'US',
        'weather_temperature' => $faker->numberBetween(-15,110),
        'weather_pressure' => $faker->numberBetween(800,1100),
        'sound_level' => $faker->numberBetween(0,10),
        'light_level' => $faker->numberBetween(0,10),
        'still_suffering' => $faker->randomElement(['true', 'false', null]),
        'start_time' => $faker->dateTimeBetween('-48 hours', '-5 hours'),
        'end_time' => $faker->dateTimeBetween('-5 hours', '+48 hours'),
        'has_aura' => $faker->randomElement(['true', 'false', null]),
        'has_nausea' => $faker->randomElement(['true', 'false', null]),
        'has_vomited' => $faker->randomElement(['true', 'false', null]),
        'has_light_sensitivity' => $faker->randomElement(['true', 'false', null]),
        'has_sound_sensitivity' => $faker->randomElement(['true', 'false', null]),
        'has_disrupted' => $faker->randomElement(['true', 'false', null]),
        'missed_workschool' => $faker->randomElement(['true', 'false', null]),
        'missed_routines' => $faker->randomElement(['true', 'false', null]),
        'missed_social' => $faker->randomElement(['true', 'false', null]),
        'missed_personal_activity' => $faker->randomElement(['true', 'false', null])
    ];
    $data['start_time'] = $data['start_time']->format('Y-m-d\TH:i');
    $data['end_time'] = $data['end_time']->format('Y-m-d\TH:i');
    if($data['has_aura'])
        $data['aura_description'] = $faker->paragraph(5);
    return $data;
});

$factory->define(App\Medicine::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
//        'dose' => $faker->numberBetween(0,10).'mg',
        // This is why dose can't just be a number ;) You need unit-qty, unit-type, volume-qty, volume-type
        'dose' => $faker->numberBetween(1,4) . ' ' . $faker->randomElement(['teaspoons', 'tablespoons', 'pills', 'sprays', 'patches', 'pads', 'mL', 'mcL', 'L', 'CC']) . ' : ' . $faker->randomFloat(2,1,100) . $faker->randomElement(['mcg', 'mg', 'g']) . ' per ' . $faker->numberBetween(1,5) . $faker->randomElement(['mcL', 'mL', 'L', 'CC']),
        'description' => $faker->paragraph(3),
    ];
});
$factory->define(App\Trigger::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(8),
    ];
});

$factory->define(App\Note::class, function (Faker\Generator $faker){
   return [
        'name' => $faker->word,
        'body' => $faker->paragraph(10),
   ];
});