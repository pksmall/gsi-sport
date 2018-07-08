<?php

use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = ['facebook', 'gplus', 'instagram', 'youtube'];
        foreach ($socials as $social)
        {
            $s = new \App\Social();
            $s->name = $social;
            $s->link = '#';
            $s->save();
        }
    }
}
