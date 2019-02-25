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
        /** @var array $roles */
        $roles = config('init.users');

        array_map(function ($role) {
            User::create([
                'email'      => $role['email'],
                'password'   => $role['password'],
                'last_name'  => $role['last_name'],
                'first_name' => $role['first_name']
            ]);
        }, $roles);
    }
}
