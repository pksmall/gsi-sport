<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Администратор', 'Модератор', 'Оптовый клиент', 'Клиент'];
        foreach ($roles as $role)
        {
            $r = new \App\Role();
            $r->name = $role;
            $r->description = 'Описание группы';
            $r->save();
        }
    }
}
