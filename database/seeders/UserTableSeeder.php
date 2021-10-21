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
        $user->profile_image ="profile_image1.png";
        $user->name ="Perla Sandoval";
        $user->nick_name ="perla";
        $user->email ="perla@gmail.com";
        $user->password = bcrypt("secret");
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->profile_image ="profile_image2.png";
        $user->name ="Miguel Aviles";
        $user->nick_name ="miguel";
        $user->email ="miguel@gmail.com";
        $user->password = bcrypt("secret");
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->profile_image ="profile_image3.png";
        $user->name ="Guillermo Dominguez";
        $user->nick_name ="paradox";
        $user->email ="guillermo@gmail.com";
        $user->password = bcrypt("asd");
        $user->role_id = 1;
        $user->save();
    }
}
