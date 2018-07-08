<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['administrator', 'moderator', 'optclient', 'client'];
        $user_index = 0;
        foreach ($users as $user)
        {
            $u = new \App\User();
            $u->name = $user;
            $u->email = $user . '@gmail.com';
            $u->telephone = 1;
            $u->ip = '127.0.0.1';
            $u->password = bcrypt($user);
            $u->status_id = 1;
            $u->save();
            $u->roles()->attach(\App\Role::where('id', ++$user_index)->first());
        }
    }
}
