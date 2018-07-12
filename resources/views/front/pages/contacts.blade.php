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
                    <div class="left col-6"><h2 class="title">{{ $static_page->name }}</h2>
                        <div class="text-block-wrap">
                            <div class="text-block">
                            {!! $static_page->description !!}
                                <!-- <div class="text-block-title">Местоположение: Одесса</div>
                                <p class="m-0">По любым интересующим вопросам вы можете связаться с нами по телефонам:</p>
                                <ul>
                                    <li><a href="tel:0975156767">(097) 515-67-67</a></li>
                                    <li><a href="tel:0502911443">(050) 291-14-43</a></li>
                                    <li><a href="tel:0487029845">(048) 702-98-45</a></li>
                                    <li><a href="tel:0487431889">(048) 743-18-89 </a></li>
                                </ul>
                                <br>
                                <p class="m-0">Также вы можете отправить письмо на наш E-mail адрес:</p>
                                <p class="email">e-mail: <a href="mailto:gsi-sport@ukr.net">gsi-sport@ukr.net</a></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="right col-6">
                        <form id="contactForm" action="{{ url('/contactformsend') }}" method="post">
                            <div class="alert alert-success hide-box mt-4" id="contactSuccess">
                                <p><strong>Успех!</strong> Мы получили ваше сообщение.</p>
                            </div>

                            <div class="alert alert-danger hide-box mt-4" id="contactError">
                                <p><strong>Ошибка!</strong> Проблема при отсылке сообщения</p>
                                <span class="text-1 mt-2 d-block" id="mailErrorMessage"></span>
                            </div>
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <h2 class="title">Контактная форма</h2>
                            <label id="name-error" class="error" for="name"></label>
                            <input class="form-control" maxlength="100" placeholder="Ваше имя" data-msg-required="Ваше имя" type="text" name="name" id="name" required>
                            <label id="name-error" class="error"  for="email"></label>
                            <input class="form-control" type="email" placeholder="Ваше E-mail" data-msg-required="Ваш E-mail?" data-msg-email="Ваш E-mail неверный" name="email" id="email" required>
                            <label id="name-error" class="error" for="message"></label>
                            <textarea class="form-control" maxlength="5000" placeholder="Сообщение" data-msg-required="Сообщение" row="20" name="message" id="message" required></textarea>
                            <input class="btn blue tblue opacity" data-loading-text="Отправляется..." type="submit" value="Отправить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>

@endsection