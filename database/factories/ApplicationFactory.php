<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Application;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return ['job_ad'=>$faker->url,
            'job_title'=>$faker->jobTitle,
            'job_type'=>'Software Engineer',
            'applied_at'=>$faker->dateTimeThisDecade,
            'salary'=>'100000',
            'additional_description'=>$faker->realText(200),
            'personal_rank'=> $faker->numberBetween(0,10),
            'possibility'=>$faker->numberBetween(0,10),
            'email_templates_id'=>'1',
            'cover_letter_id'=>null,
            'resume_id'=>null,
            'user_id'=>'2',
            'company_id'=>factory(Company::class)];

});
