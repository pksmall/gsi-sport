@extends('front/layout/front')

@section('content')

    <div class="page-wrap login-page sign">
        <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
        @include('front/parts/rightnav')

        <div class="content login-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title">
                            <h1>регистрация</h1><a href="/login">Войти с помощью</a>
                        </div>
                        <h2 class="blue-text">заполните все поля для регистрации</h2>
                        <form method="POST" action="{{ route('register') }}" id="regform">
                            @csrf
                            <div class="form-group">
                                <label for="name">ФИО:</label>
                                <input id="name" name="name" type="text" autofocus>
                                <span class="error" for="name">Ваше Имя?</span>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Телефон: </label>
                                <input id="telephone" name="telephone" type="text" min=12 data-content="Телефон должен быть из 12 цифр.">
                                <span class="error" for="telephone">Ваш телефон?</span>
                            </div>
                            <div class="form-group">
                                <label for="email">e-mail:</label>
                                <input id="email" name="email" type="email">
                                <span class="error" for="email">Ваш Емайл?</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль:</label>
                                <input id="password" name="password" type="password">
                                <span  class="error" for="password">Пароль?</span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">ПОВТОРИТЕ ПАРОЛЬ:</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" data-content="Пароль не совпадает.">
                                <span class="error" id="error-password_confirmation" for="password_confirmation" data-content="Повторите пароль.">Повторите пароль.</span>
                            </div>
                            <div class="checkbox-wrap">
                                <input id="save-password" name="save-password" type="checkbox">
                                <label for="save-password" ><span><a style="color: #f5f8fa;" href="{{ url('policy.pdf') }}">принять пользовательское соглашение</a></span></label>
                            </div>
                            <div class="form-group">
                                <span class="error" id="err-save-password" for="save-password">Принять?</span>
                            </div>

                            <input id="checkreg" class="btn blue" type="button" data-content="Зарегистрироваться" value="Зарегистрироваться">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('page-js-script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">
    $(function() {
        <!--Name can't be blank-->
        $('#name').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            var error_element=$("span", input.parent());
            if(is_name){
                input.removeClass("invalid").addClass("valid");
                error_element.removeClass("error_show").addClass("error");
            } else{
                input.removeClass("valid").addClass("invalid");
                error_element.removeClass("error").addClass("error_show");
            }
        });

        <!-- Numbers -->
        $('#telephone').on('input', function() {
            $(this).mask('000 (00) 000-00-00', {placeholder: "___ (__) ___-__-__"});
            var input=$(this);
            var clearval = input.val();
            var minlen = input.attr('min');
            var len = input.val().length - 6;
            var minlenflag = false;
            var error_element=$("span", input.parent());
            if (len < minlen) {
                minlenflag = true;
            }
            if(!minlenflag) {
                input.removeClass("invalid").addClass("valid");
                error_element.removeClass("error_show").addClass("error");
            } else {
                if (minlenflag) {
                    error_element.html(input.data('content'));
                }
                input.removeClass("valid").addClass("invalid");
                error_element.removeClass("error").addClass("error_show");
            }
            console.log("Phlen: " + len + " FL: " + minlenflag + " V:" + clearval );
        });

        <!--Email must be an email -->
        $('#email').on('input', function() {
            var input=$(this);
            var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var is_email=re.test(input.val());
            var error_element=$("span", input.parent());
            if(is_email) {
                input.removeClass("invalid").addClass("valid");
                error_element.removeClass("error_show").addClass("error");
            } else {
                input.removeClass("valid").addClass("invalid");
                error_element.removeClass("error").addClass("error_show");
            }
        });

        $('#password_confirmation').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            var error_element=$("span", input.parent());
            if(is_name) {
                input.removeClass("invalid").addClass("valid");
                error_element.removeClass("error_show").addClass("error");
            } else {
                input.removeClass("valid").addClass("invalid");
                error_element.removeClass("error").addClass("error_show");
            }
        });

        $('#password').on('input', function() {
            var input=$(this);
            var is_name=input.val();
            var error_element=$("span", input.parent());
            if(is_name){
                input.removeClass("invalid").addClass("valid");
                error_element.removeClass("error_show").addClass("error");
            } else{
                input.removeClass("valid").addClass("invalid");
                error_element.removeClass("error").addClass("error_show");
            }
        });

        $('#save-password').on('change',function() {
            var input=$(this);
            if ($(this).is(':checked')) {
                input.removeClass("invalid").addClass("valid");
                var error_element=$('#err-save-password');
                error_element.removeClass("error_show").addClass("error");
            }
        });

        $('#checkreg').on('click', function() {
            //$(this).html( $(this).data('loading-text') ? $(this).data('loading-text') : 'Загрузка...' );
            //$(this).prop('disabled', true);
            console.log("dataurl: " + $("#regform").attr('action'));

            var form_data = $("#regform").serializeArray();
            var error_free = true;
            for (var input in form_data) {
                if (form_data[input]['name'] == '_token' ) { continue; }

                var element=$("#"+form_data[input]['name']);
                var valid=element.hasClass("valid");
                var error_element=$("span", element.parent());

                if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
                else{error_element.removeClass("error_show").addClass("error");}

                if ($('#save-password').is(':checked')) {
                    var error_element=$('#err-save-password');
                    error_element.removeClass("error_show").addClass("error");
                } else {
                    var error_element=$('#err-save-password');
                    error_element.removeClass("error").addClass("error_show");
                    error_free=false;
                }
                console.log("name:" + form_data[input]['name'] + ' errel: ' + valid + ' err:' + error_free);
            }

            if (error_free && $('#password').val() != $('#password_confirmation').val()) {
                $("#error-password_confirmation").html($('#password_confirmation').data('content'));
                $("#error-password_confirmation").removeClass("error").addClass("error_show");
                error_free=false;
            }

            if (!error_free){
                event.preventDefault();
            } else {
                $.ajax({
                    type: "POST",
                    url: $("#regform").attr('action'),
                    data: $("#regform").serialize(),
                    async: true,
                    dataType: 'json',
                }).always(function (data, textStatus, jqXHR) {
                    //console.log("rest success. ws:" + JSON.stringify(data));
                    if (data.response == 'success') {
                        console.log("rest success. d:" + data.data);
                        document.location.href = data.data;
                        return;
                    } else {
                        console.log("rest error.");
                        return;
                    }
                });
            }
        });

    });
</script>
@endsection