<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Train;



class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) {
            $new_train = new Train();
            $new_train->company = $faker->word();
            $new_train->departure_city = $faker->city();
            $new_train->arrival_city = $faker->city();
            $new_train->departure_time = $faker->time();
            $new_train->arrival_time = $faker->time();
            $new_train->train_code = $faker->regexify('[A-Z]{6}[0-4]{4}');
            $new_train->train_car = $faker->numberBetween(7, 12);
            $new_train->cancelled = $faker->numberBetween(0, 1);
            if(!$new_train->cancelled) {
                $new_train->on_time = $faker->numberBetween(0, 1);
            }
            $new_train->save();
        }
    }
}
