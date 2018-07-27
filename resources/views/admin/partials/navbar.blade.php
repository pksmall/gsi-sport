<header class="camotek-admin-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('admin') }}">GSI-Sport</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Каталог
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Товары</h6>
                        <a class="dropdown-item" href="{{ route('admin_items') }}">Все товары</a>
                        <a class="dropdown-item" href="{{ route('admin_items_categories') }}">Категории</a>
                        {{--<a class="dropdown-item" href="{{ route('admin_items_attributes') }}">Атрибуты</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('admin_items_characteristics') }}">Характеристики</a>--}}
                        {{--<div class="dropdown-divider"></div>--}}
                        {{--<h6 class="dropdown-header">Технологии</h6>--}}
                        {{--<a class="dropdown-item" href="{{ route('admin_technologies') }}">Все технологии</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('admin_technologies_categories') }}">Категории</a>--}}
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Новости и статьи</h6>
                        <a class="dropdown-item" href="{{ route('blog_articles') }}">Все материалы</a>
                        {{--<a class="dropdown-item" href="{{ route('blog_categories') }}">Категории</a>--}}
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Прочее</h6>
                        {{--<a class="dropdown-item" href="{{ route('reviews') }}">Отзывы</a>--}}
                        <a class="dropdown-item" href="{{ route('static_pages') }}">Статические страницы</a>
                        <a class="dropdown-item" href="{{ route('slider') }}">Слайдер</a>
                        {{--<a class="dropdown-item" href="{{ route('table_sizes') }}">Таблицы размеров</a>--}}
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders') }}">Заказы</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('clients') }}">Клиенты</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Отчеты
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Продажи</h6>
                        <a class="dropdown-item" href="{{ route('report_sales') }}">Заказы</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Товары</h6>
                        <a class="dropdown-item" href="{{ route('items_views') }}">Просмотрено</a>
                        <a class="dropdown-item" href="{{ route('items_sales') }}">Куплено</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Покупатели</h6>
                        <a class="dropdown-item" href="{{ route('clients_activity') }}">Активность покупателей</a>
                        <a class="dropdown-item" href="{{ route('clients_orders') }}">Заказы</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('settings') }}">Настройки</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Перейти на сайт</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Выйти</a></li>
            </ul>
        </div>
    </nav>
</header>