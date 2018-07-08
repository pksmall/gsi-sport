<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SliderTableSeeder::class);
        $this->call(SocialTableSeeder::class);

         $this->call(ItemTableSeeder::class);
         $this->call(ItemCategoriesTableSeeder::class);
         $this->call(ItemCharacteristicsTableSeeder::class);
         $this->call(ItemAttributesTableSeeder::class);
         $this->call(AttributeTermsTableSeeder::class);

         $this->call(BlogArticlesTableSeeder::class);
         $this->call(BlogCategoriesTableSeeder::class);

         $this->call(StaticPageTableSeeder::class);

         $this->call(SettingsTableSeeder::class);
         $this->call(ConfigTableSeeder::class);

         $this->call(RoleTableSeeder::class);
         $this->call(UserTableSeeder::class);

         $this->call(TypePayTableSeeder::class);
         $this->call(TypeDeliveryTableSeeder::class);
    }
}
