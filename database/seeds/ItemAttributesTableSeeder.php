<?php

use Illuminate\Database\Seeder;

class ItemAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new \App\ItemAttribute();
        $c->sort_id = 0;
        $c->sort_order = 0;
        $c->is_active = true;
        $c->save();

        $c_t = new \App\ItemAttributesTranslation();
        $c_t->attribute_id = $c->id;
        $c_t->locale = 'ru';
        $c_t->name = 'Размер';
        $c_t->slug = 'at-1-ru-size';
        $c_t->save();

        $c_t1 = new \App\ItemAttributesTranslation();
        $c_t1->attribute_id = $c->id;
        $c_t1->locale = 'ua';
        $c_t1->name = 'Розмір';
        $c_t1->slug = 'at-1-ua-size';
        $c_t1->save();

        $c_t2 = new \App\ItemAttributesTranslation();
        $c_t2->attribute_id = $c->id;
        $c_t2->locale = 'en';
        $c_t2->name = 'Size';
        $c_t2->slug = 'at-1-en-size';
        $c_t2->save();





        $c = new \App\ItemAttribute();
        $c->sort_id = 0;
        $c->sort_order = 0;
        $c->is_active = true;
        $c->save();

        $c_t = new \App\ItemAttributesTranslation();
        $c_t->attribute_id = $c->id;
        $c_t->locale = 'ru';
        $c_t->name = 'Модель';
        $c_t->slug = 'at-2-ru-model';
        $c_t->save();

        $c_t1 = new \App\ItemAttributesTranslation();
        $c_t1->attribute_id = $c->id;
        $c_t1->locale = 'ua';
        $c_t1->name = 'Модель';
        $c_t1->slug = 'at-2-ua-model';
        $c_t1->save();

        $c_t2 = new \App\ItemAttributesTranslation();
        $c_t2->attribute_id = $c->id;
        $c_t2->locale = 'en';
        $c_t2->name = 'Model';
        $c_t2->slug = 'at-2-en-model';
        $c_t2->save();





        $c = new \App\ItemAttribute();
        $c->sort_id = 0;
        $c->sort_order = 0;
        $c->is_active = true;
        $c->save();

        $c_t = new \App\ItemAttributesTranslation();
        $c_t->attribute_id = $c->id;
        $c_t->locale = 'ru';
        $c_t->name = 'Цвет';
        $c_t->slug = 'at-3-ru-color';
        $c_t->save();

        $c_t1 = new \App\ItemAttributesTranslation();
        $c_t1->attribute_id = $c->id;
        $c_t1->locale = 'ua';
        $c_t1->name = 'Колір';
        $c_t1->slug = 'at-3-ua-color';
        $c_t1->save();

        $c_t2 = new \App\ItemAttributesTranslation();
        $c_t2->attribute_id = $c->id;
        $c_t2->locale = 'en';
        $c_t2->name = 'Color';
        $c_t2->slug = 'at-3-en-color';
        $c_t2->save();






        $c = new \App\ItemAttribute();
        $c->sort_id = 0;
        $c->sort_order = 0;
        $c->is_active = true;
        $c->save();

        $c_t = new \App\ItemAttributesTranslation();
        $c_t->attribute_id = $c->id;
        $c_t->locale = 'ru';
        $c_t->name = 'Сезонность';
        $c_t->slug = 'at-4-ru-seasonality';
        $c_t->save();

        $c_t1 = new \App\ItemAttributesTranslation();
        $c_t1->attribute_id = $c->id;
        $c_t1->locale = 'ua';
        $c_t1->name = 'Сезонність';
        $c_t1->slug = 'at-4-ua-seasonality';
        $c_t1->save();

        $c_t2 = new \App\ItemAttributesTranslation();
        $c_t2->attribute_id = $c->id;
        $c_t2->locale = 'en';
        $c_t2->name = 'Seasonality';
        $c_t2->slug = 'at-4-en-seasonality';
        $c_t2->save();




        $c = new \App\ItemAttribute();
        $c->sort_id = 0;
        $c->sort_order = 0;
        $c->is_active = true;
        $c->save();

        $c_t = new \App\ItemAttributesTranslation();
        $c_t->attribute_id = $c->id;
        $c_t->locale = 'ru';
        $c_t->name = 'Материал';
        $c_t->slug = 'at-5-ru-material';
        $c_t->save();

        $c_t1 = new \App\ItemAttributesTranslation();
        $c_t1->attribute_id = $c->id;
        $c_t1->locale = 'ua';
        $c_t1->name = 'Матеріал';
        $c_t1->slug = 'at-5-ua-material';
        $c_t1->save();

        $c_t2 = new \App\ItemAttributesTranslation();
        $c_t2->attribute_id = $c->id;
        $c_t2->locale = 'en';
        $c_t2->name = 'Material';
        $c_t2->slug = 'at-5-en-material';
        $c_t2->save();





        $c = new \App\ItemAttribute();
        $c->sort_id = 0;
        $c->sort_order = 0;
        $c->is_active = true;
        $c->save();

        $c_t = new \App\ItemAttributesTranslation();
        $c_t->attribute_id = $c->id;
        $c_t->locale = 'ru';
        $c_t->name = 'Применение';
        $c_t->slug = 'at-6-ru-usage';
        $c_t->save();

        $c_t1 = new \App\ItemAttributesTranslation();
        $c_t1->attribute_id = $c->id;
        $c_t1->locale = 'ua';
        $c_t1->name = 'Застосування';
        $c_t1->slug = 'at-6-ua-usage';
        $c_t1->save();

        $c_t2 = new \App\ItemAttributesTranslation();
        $c_t2->attribute_id = $c->id;
        $c_t2->locale = 'en';
        $c_t2->name = 'Usage';
        $c_t2->slug = 'at-6-en-usage';
        $c_t2->save();

    }
}
