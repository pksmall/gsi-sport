@extends('front/layout/front')

@section('content')
    <div class="page-wrap contacts-page">
        <!-- header -->
        @include('front/parts/header')
        <!-- sidebar -->
        @include('front/parts/sidebar')
        <!-- right-nav & footer -->
        @include('front/parts/rightnav')

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="left col-6"><h2 class="title">контакты</h2>
                        <div class="text-block-wrap">
                            <div class="text-block">
                                <div class="text-block-title">Местоположение: Одесса</div>
                                <p class="m-0">По любым интересующим вопросам вы можете связаться с нами по телефонам:</p>
                                <ul>
                                    <li><a href="tel:0975156767">(097) 515-67-67</a></li>
                                    <li><a href="tel:0502911443">(050) 291-14-43</a></li>
                                    <li><a href="tel:0487029845">(048) 702-98-45</a></li>
                                    <li><a href="tel:0487431889">(048) 743-18-89 </a></li>
                                </ul>
                                <br>
                                <p class="m-0">Также вы можете отправить письмо на наш E-mail адрес:</p>
                                <p class="email">e-mail: <a href="mailto:gsi-sport@ukr.net">gsi-sport@ukr.net</a></p></div>
                        </div>
                    </div>
                    <div class="right col-6">
                        <form action="#"><h2 class="title">Контактная форма</h2><input type="text"
                                                                                       placeholder="Ваше имя"><input
                                    type="email" placeholder="Ваш E-mail"><textarea placeholder="Сообщение" row="20"></textarea>
                            <button class="btn blue tblue opacity" type="submit">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>

@endsection