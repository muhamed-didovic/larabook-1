<?php

use Faker\Factory as Faker;
use Larabook\Entities\User\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        //create one known user for manual login
        User::create([
            'username' => 'lotus',
            'email' => 'lotus@gmail.com',
            'password' => 'secret'
        ]);

        foreach(range(1, 50) as $index)
        {
            User::create([
                'username' => $faker->word . $index,
                'email' => $faker->email,
                'password' => 'secret'
            ]);
        }
    }

}
