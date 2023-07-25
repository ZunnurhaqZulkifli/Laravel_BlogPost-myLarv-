<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = max((int)$this->command->ask('How Many Users Would You Like ?', 10), 1);

        factory(App\User::class)->states('H4CK3RZzZ')->create();
        factory(App\User::class, $usersCount)->create();
    }
}
