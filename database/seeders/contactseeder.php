<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

Use Faker\Factory as Faker;
use App\Models\contact;
class contactseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i <=50; $i++) {
            $table = new contact();
            $table->name = $faker->name;
            $table->email = $faker->email;
            $table->comment = $faker->realText;
            $table->save();
        }
        

    }
}
