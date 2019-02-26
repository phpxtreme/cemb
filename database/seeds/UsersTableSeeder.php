<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var array $users */
        $users = config('init.users');

        array_map(function ($user) {
            User::create([
                'email'      => $user['email'],
                'password'   => $user['password'],
                'last_name'  => $user['last_name'],
                'first_name' => $user['first_name']
            ]);
        }, $users);
    }
}
