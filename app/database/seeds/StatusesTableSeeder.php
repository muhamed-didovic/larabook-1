<?php

use Faker\Factory as Faker;
use Larabook\Entities\Status\Status;
use Larabook\Entities\User\User;

class StatusesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        $userIds = User::lists('id');

        foreach (range(1, 1000) as $index) {
            Status::create([
                'user_id' => $faker->randomElement($userIds),
                'body' => $faker->sentence(),
                'created_at' => $faker->dateTime()
            ]);
        }
    }
}
