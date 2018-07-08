<?php

use Illuminate\Database\Seeder;

class update_admin_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$id = 1;
        $user = \App\User::findOrFail($id);
        
        $user->password = bcrypt('123');
        $user->save();
    }
}
