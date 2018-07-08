<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = new \App\Config();
        $config->item_limit = '20';
        $config->item_desc_length = '100';
        $config->review_active = true;
        $config->review_guest = true;
        $config->review_notify = true;
        $config->exchange_rate = '27.5';
        $config->save();
    }
}
