@extends('front/layout/front')

@section('content')
<div class="page-wrap login-page login sign">
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
                        <h1>забыли пароль?</h1><a class="blue-a" href="/register">регистрация</a>
                    </div>
                    <h2 class="blue-text">введите ваш почтовый ящик</h2>
                    <div class="alert alert-success hide-box mt-4" id="contactSuccess">
                        <p><strong>Успех!</strong> Новый пароль выслан на ваш емайл .</p>
                    </div>
                    <form method="POST" id="forgotform" data-content-action="{{ url('/forgotpass') }}">
                        <div class="form-group">
                            <label for="login">Email:</label>
                            <input id="email" name="email" type="text" placeholder="Ваш почтовый ящик">
                            <span class="error"  for="email">Ваш email?</span>
                        </div>
                        <input id="checkemail" class="btn blue" type="button" data-content-value="Получить" value="Получить">
                        <!-- <button id="checkemail" class="btn blue">Получить</button> -->
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

            $('#checkemail').on('click',function(){
                console.log("dataurl: " + $("#forgotform").data('content-action') + " email:" + $('#email').val());
                var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                var email = re.test($('#email').val());

                if (email) {
                    $(this).val( $(this).data('loading-text') ? $(this).data('loading-text') : 'Загрузка...' );
                    $(this).prop('disabled', true);
                    $.ajax({
                        type: 'POST',
                        url: $("#forgotform").data('content-action'),
                        data: {
                          email: $('#email').val()
                        }
                    }).always(function (data, textStatus, jqXHR) {
                        if (data.response == 'success') {
                            //console.log("resp data: " + data.data);
                            $('#contactSuccess').removeClass('hide-box');
                            var error_element = $("span", $('#email').parent());
                            $('#email').removeClass("invalid").addClass("valid");
                            error_element.removeClass("error_show").addClass("error");
                            $('#checkemail').val( $('#checkemail').data('content-value'));
                            return;
                        } else {
                            console.log("resp error");
                            var error_element = $("span", $('#email').parent());
                            $('#email').removeClass("valid").addClass("invalid");
                            error_element.removeClass("error").addClass("error_show");
                            $('#checkemail').val( $('#checkemail').data('content-value'));
                            $('#checkemail').prop('disabled', false);
                            return;
                        }
                    });
                } else {
                    var error_element = $("span", $('#email').parent());
                    $('#email').removeClass("valid").addClass("invalid");
                    error_element.removeClass("error").addClass("error_show");
                }
            });
        });
    </script>
@endsection
