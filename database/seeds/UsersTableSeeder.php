<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create("tr_TR");
        for ($i = 0; $i < 5; $i++) {
            $user = new User;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = Hash::make($faker->password);
            $user->phone = $faker->phoneNumber;
            $user->address = $faker->address;
            $user->save();
        }
    }
}
