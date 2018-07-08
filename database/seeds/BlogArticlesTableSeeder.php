<?php

use Illuminate\Database\Seeder;

class BlogArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Знижки на куртки SoftShell', 'Черевики Tactical Urban Black. Нова ціна – 750 грн!!!', 'Костюм зимовий Hard-Shell Black!!!'];
        foreach ($items as $item)
        {
            $c = new \App\BlogArticle();
            $c->save();

            $c_t = new \App\BlogArticlesTranslation();
            $c_t->article_id = $c->id;
            $c_t->name = $item;
            $c_t->locale = 'ru';
            $c_t->slug = str_slug('b-' . $c->id . '-' . 'ru' . '-' . $item, '-', 'en');
            $c_t->save();

            $c_t = new \App\BlogArticlesTranslation();
            $c_t->article_id = $c->id;
            $c_t->name = $item;
            $c_t->locale = 'ua';
            $c_t->slug = str_slug('b-' . $c->id . '-' . 'ua' . '-' . $item, '-', 'en');
            $c_t->save();

            $c_t = new \App\BlogArticlesTranslation();
            $c_t->article_id = $c->id;
            $c_t->name = $item;
            $c_t->locale = 'en';
            $c_t->slug = str_slug('b-' . $c->id . '-' . 'en' . '-' . $item, '-', 'en');
            $c_t->save();
        }
    }
}
