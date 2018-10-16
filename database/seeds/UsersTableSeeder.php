<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@ad.min',
            'password' => bcrypt('111111'),
            'points' => 7777,
            'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlNQ2yyZICBI_pcqc_KxT55FYvlpE8TtOKTlVuNuVyjbr1BSwLhw',
            'is_admin' => 1,
        ]);

        User::insert([
            'name' => 'user',
            'email' => 'user@us.er',
            'password' => bcrypt('111111'),
            'points' => 2222,
            'avatar' => 'https://www.w3schools.com/w3images/avatar2.png',
            'is_admin' => 0,
        ]);

        factory(User::class, 10)->create();
    }
}
