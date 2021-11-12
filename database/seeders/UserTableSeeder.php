<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->profile_image = "profile_image1.png";
        $user->name = "Perla";
        $user->middle_name = "Noriega";
        $user->last_name = "Sandoval";
        $user->nick_name = "perla";
        $user->email = "perla@gmail.com";
        $user->password = bcrypt("secret");
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->profile_image = "profile_image2.png";
        $user->name = "Miguel";
        $user->middle_name = "Aviles";
        $user->last_name = "Resendiz";
        $user->nick_name = "miguel";
        $user->email = "miguel@gmail.com";
        $user->password = bcrypt("secret");
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->profile_image = "profile_image3.png";
        $user->name = "Guillermo";
        $user->middle_name = "Dominguez";
        $user->last_name = "Gameros";
        $user->nick_name = "paradox";
        $user->email = "guillermo@gmail.com";
        $user->password = bcrypt("asd");
        $user->role_id = 1;
        $user->save();
    }
}
