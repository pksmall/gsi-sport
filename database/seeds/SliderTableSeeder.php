<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = ['slide1_1360_765.jpg', 'slide2_1360_765.jpg', 'slide3_1360_765.jpg'];
        $locales = ['ru', 'ua', 'en'];
        $names = ['Слайд Camotec', 'Слайд Camotec', 'Slide Camotec'];
        $descriptions = ['предлагает полный асортимент экипировки, обуви и амуниции', 'пропонує повний асортимент екіпіровки, взуття та амуніції', 'offers a full range of equipment, footwear and ammunition'];
        $links = ['http://camotec.ua', null, null];
        for ($i = 0; $i < 3; $i++)
        {
            $image = new \App\Image();
            $image->path = '/images/content/slides/' . $slides[$i];
            $image->save();

            $slide = new \App\Slide();
            $slide->attach_id = $image->id;
            $slide->sort_order = $i;
            $slide->save();

            for ($j = 0; $j < 3; $j++)
            {
                $slide_translation = new \App\SlidesTranslations();
                $slide_translation->slide_id = $slide->id;
                $slide_translation->locale = $locales[$j];
                $slide_translation->name = $names[$j];
                $slide_translation->slug = str_slug('sl-' . $slide->id . '-' . $locales[$j] . '-' . $slide_translation->name, '-', 'en');
                $slide_translation->description = $descriptions[$j];
                $slide_translation->link = $links[$j];
                $slide_translation->save();
            }

        }
    }
}
