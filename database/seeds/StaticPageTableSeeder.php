<?php

use Illuminate\Database\Seeder;

class StaticPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new \App\StaticPage();
        $page->active_title = false;
        $page->active_breadcrumbs = false;
        $page->is_second_menu = true;
        $page->is_footer_menu = true;
        $page->sort_order = 0;
        $page->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ru';
        $page_locales->name = 'О нас';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ru' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section class="about-us">
        <article class=" container-pages who-we-are">
            <div class="article-head content-wrapper">
                <div class="head-line-holder">
                    <h2>Кто<br>мы<br>такие?</h2>
                </div>
                <div class="article-img-holder">
                    <img src="' . asset('http://camotek.sitelook.in.ua/images/content/about/article_img_solger_559_575.png') . '">
                </div>
            </div>
            <div class="article-body content-wrapper">
                <div class="left-column">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                </div>
                <div class="right-column">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>
                </div>
            </div>
        </article>
    </section>
    <section class="about-next container-pages">
        <div class="content-wrapper">
            <article class="about-next-article">
                <h3>Превосходное<br>качество<br>ткани</h3>
                <div class="orange-line"></div>
                <div class="img-holder">
                    <img src="' . asset('http://camotek.sitelook.in.ua/images/content/about/next_content_img_742_393.jpg') . '">
                </div>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
            </article>
        </div>
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ua';
        $page_locales->name = 'Про нас';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ua' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section class="about-us">
        <article class=" container-pages who-we-are">
            <div class="article-head content-wrapper">
                <div class="head-line-holder">
                    <h2>Хто<br>ми<br>такі?</h2>
                </div>
                <div class="article-img-holder">
                    <img src="' . asset('http://camotek.sitelook.in.ua/images/content/about/article_img_solger_559_575.png'). '">
                </div>
            </div>
            <div class="article-body content-wrapper">
                <div class="left-column">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                </div>
                <div class="right-column">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>
                </div>
            </div>
        </article>
    </section>
    <section class="about-next container-pages">
        <div class="content-wrapper">
            <article class="about-next-article">
                <h3>Превосходное<br>качество<br>ткани</h3>
                <div class="orange-line"></div>
                <div class="img-holder">
                    <img src="' . asset('http://camotek.sitelook.in.ua/images/content/about/next_content_img_742_393.jpg'). '">
                </div>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
            </article>
        </div>
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'en';
        $page_locales->name = 'About';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'en' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section class="about-us">
        <article class=" container-pages who-we-are">
            <div class="article-head content-wrapper">
                <div class="head-line-holder">
                    <h2>Who<br>we<br>are?</h2>
                </div>
                <div class="article-img-holder">
                    <img src="' . asset('http://camotek.sitelook.in.ua/images/content/about/article_img_solger_559_575.png'). '">
                </div>
            </div>
            <div class="article-body content-wrapper">
                <div class="left-column">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                </div>
                <div class="right-column">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>
                </div>
            </div>
        </article>
    </section>
    <section class="about-next container-pages">
        <div class="content-wrapper">
            <article class="about-next-article">
                <h3>Превосходное<br>качество<br>ткани</h3>
                <div class="orange-line"></div>
                <div class="img-holder">
                    <img src="' . asset('http://camotek.sitelook.in.ua/images/content/about/next_content_img_742_393.jpg'). '">
                </div>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
            </article>
        </div>
    </section>';
        $page_locales->save();

















        $page = new \App\StaticPage();
        $page->is_second_menu = true;
        $page->is_footer_menu = true;
        $page->active_title = true;
        $page->active_breadcrumbs = true;
        $page->sort_order = 0;
        $page->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ru';
        $page_locales->name = 'Доставка и оплата';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ru' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '
<section>
Самовывоз в Одессе бесплатно.<br/>
Доставка осуществляется в срок от 3 до 5 дней<br/>
Новая почта<br/>
Деливери<br/>
Автолюксом<br/>
Ночной экспресс<br/>
Курьером. От 5 500 грн. Доставка - БЕСПЛАТНО<br/>
Оплата:<br/>
Услуга наложенного платежа - ОТСУТСТВУЕТ<br/>
Безналичный расчет (банковский перевод/перевод на карту)<br/>
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ua';
        $page_locales->name = 'Доставка і оплата';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ua' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section>
Самовывоз в Одессе бесплатно.<br/>
Доставка осуществляется в срок от 3 до 5 дней<br/>
Новая почта<br/>
Деливери<br/>
Автолюксом<br/>
Ночной экспресс<br/>
Курьером. От 5 500 грн. Доставка - БЕСПЛАТНО<br/>
Оплата:<br/>
Услуга наложенного платежа - ОТСУТСТВУЕТ<br/>
Безналичный расчет (банковский перевод/перевод на карту)<br/>
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'en';
        $page_locales->name = 'Shipping and payment';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'en' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section>
Самовывоз в Одессе бесплатно.<br/>
Доставка осуществляется в срок от 3 до 5 дней<br/>
Новая почта<br/>
Деливери<br/>
Автолюксом<br/>
Ночной экспресс<br/>
Курьером. От 5 500 грн. Доставка - БЕСПЛАТНО<br/>
Оплата:<br/>
Услуга наложенного платежа - ОТСУТСТВУЕТ<br/>
Безналичный расчет (банковский перевод/перевод на карту)<br/>
    </section>';
        $page_locales->save();














        $page = new \App\StaticPage();
        $page->is_second_menu = true;
        $page->is_footer_menu = true;
        $page->active_title = true;
        $page->active_breadcrumbs = true;
        $page->sort_order = 0;
        $page->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ru';
        $page_locales->name = 'Обмен и возврат';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ru' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '
<section>
Самовывоз в Одессе бесплатно.<br/>
Доставка осуществляется в срок от 3 до 5 дней<br/>
Новая почта<br/>
Деливери<br/>
Автолюксом<br/>
Ночной экспресс<br/>
Курьером. От 5 500 грн. Доставка - БЕСПЛАТНО<br/>
Оплата:<br/>
Услуга наложенного платежа - ОТСУТСТВУЕТ<br/>
Безналичный расчет (банковский перевод/перевод на карту)<br/>
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ua';
        $page_locales->name = 'Обмін і повернення';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ua' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section>
Самовывоз в Одессе бесплатно.<br/>
Доставка осуществляется в срок от 3 до 5 дней<br/>
Новая почта<br/>
Деливери<br/>
Автолюксом<br/>
Ночной экспресс<br/>
Курьером. От 5 500 грн. Доставка - БЕСПЛАТНО<br/>
Оплата:<br/>
Услуга наложенного платежа - ОТСУТСТВУЕТ<br/>
Безналичный расчет (банковский перевод/перевод на карту)<br/>
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'en';
        $page_locales->name = 'Exchange and return';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'en' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section>
Самовывоз в Одессе бесплатно.<br/>
Доставка осуществляется в срок от 3 до 5 дней<br/>
Новая почта<br/>
Деливери<br/>
Автолюксом<br/>
Ночной экспресс<br/>
Курьером. От 5 500 грн. Доставка - БЕСПЛАТНО<br/>
Оплата:<br/>
Услуга наложенного платежа - ОТСУТСТВУЕТ<br/>
Безналичный расчет (банковский перевод/перевод на карту)<br/>
    </section>';
        $page_locales->save();











        $page = new \App\StaticPage();
        $page->is_second_menu = true;
        $page->is_footer_menu = true;
        $page->active_title = true;
        $page->active_breadcrumbs = true;
        $page->sort_order = 0;
        $page->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ru';
        $page_locales->name = 'Опт';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ru' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '
<section>
Для оптовых покупателей у нас существует гибкая система скидок.<br/>
Для регистрации Вас, как оптового покупателя и получения скидки на стоимость товара Вам необходимо:<br/>
- выбрать товар который вас интересует;<br/>
- при оформлении заказа указать, что Вы ориентированы на ОПТ;<br/>
- связаться с администратором за номером <a href="tel:+380978882165">+380978882165</a> для более детального обсуждения.
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'ua';
        $page_locales->name = 'Опт';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'ua' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section>
Для оптових покупців у нас існує гнучка система знижок. <br/>
Для реєстрації Вас, як оптового покупця і отримання знижки на вартість товару Вам необхідно: <br/>
- вибрати товар який вас цікавить; <br/>
- при оформленні замовлення вказати, що Ви орієнтовані на ОПТ; <br/>
- Зв\'язок з адміністратором за номером <a href="tel:+380978882165"> +380978882165 </a> для більш детального обговорення.
    </section>';
        $page_locales->save();

        $page_locales = new \App\StaticPagesTranslation();
        $page_locales->page_id = $page->id;
        $page_locales->locale = 'en';
        $page_locales->name = 'Опт';
        $page_locales->slug = str_slug('sp-' . $page->id . '-' . 'en' . '-' . $page_locales->name, '-', 'en');
        $page_locales->description = '<section>
For wholesale buyers, we have a flexible system of discounts. <br/>
To register you as a wholesale buyer and receive a discount on the cost of the goods you need: <br/>
- choose the product you are interested in; <br/>
- when registering an order, indicate that you are focused on the OPT; <br/>
- contact the administrator for the number <a href="tel:+380978882165"> +380978882165 </a> for more detailed discussion.
    </section>';
        $page_locales->save();
    }
}
