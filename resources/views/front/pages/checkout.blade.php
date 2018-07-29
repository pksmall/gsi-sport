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
                    <div class="title">
                        <h1>Оформление заказа</h1>@if(!Auth::check())<a href="/login">Войти с помощью</a>@endif
                    </div>
                    <!-- autoregister -->
                    <div class="left col-6"  id="autoregister">
                        <h2 class="blue-text">Контактные данные.</h2>
                        <form method="POST" action="{{ url('/save_order')}}" id="registerForm">
                            @csrf
                        @if(Auth::check())
                            <label class="login">{{ $user->name }}</label>
                            <label class="email mb-2">{{ $user->email }}</label>
                            <label class="date">{{ $user->date }}</label>
                        @else
                            <div class="form-group">
                                <label for="reg-name" required>ФИО:</label>
                                <input class="form-control" id="reg-name" name="reg-name" type="text" autofocus  placeholder="Ваше Имя и Фамилия" required>
                                <span class="error" for="reg-name">Ваше ФИО?</span>
                            </div>
                            <div class="form-group">
                                <label for="reg-telephone" required>Телефон:</label>
                                <input class="form-control" id="reg-telephone" name="reg-telephone" type="number"  placeholder="Телефон"  required>
                                <span class="error"  for="reg-telephone">Ваш телефон?</span>
                            </div>
                            <div class="form-group">
                                <label for="reg-email" required>e-mail:</label>
                                <input class="form-control" id="reg-email" name="reg-email" type="email"  placeholder="Е-Майл" required>
                                <span class="error"  for="reg-email">Ваш E-mail?</span>
                            </div>
                        @endif
                            <h2 class="blue-text">Способ оплаты</h2>
                            <div class="radio-wrap">
                                <input id="cash-out" name="paytype" type="radio" value="1" checked>
                                <label for="cash-out"><span>Наличными</span></label>

                                <input id="card-out" name="paytype" type="radio" value="2" >
                                <label for="card-out"><span>LiqPay</span></label>

                            </div>
                        </form>
                    </div>

                    <!-- delivery -->
                    <div class="right col-6"  id="statusdelivery">
                        <form id="deliverytype"  action="{{ url('/contactformsend') }}" method="post">
                            <h2 class="blue-text">Способ доставки.</h2>
                            @csrf
                            <div class="table-block">
                                <div class="table-row">
                                    <div class="table-cell">
                                        <div class="radio-wrap-vertical">
                                            <input id="selfdelivery" name="deliverychoose" type="radio" value="1" checked>
                                            <label for="selfdelivery"><span>Самовывоз</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="table-cell">
                                        <div class="radio-wrap-vertical">
                                            <input id="fedex" name="deliverychoose" type="radio" value="3" >
                                            <label for="fedex"><span>Курьер</span></label>
                                        </div>
                                    </div>
                                    <div class="table-cell">
                                        <div class="table-text">
                                            <input class="form-control" id="fxaddr" name="fxaddr" type="text" placeholder="Адрес доставки" disabled>
                                            <span id="fx-error" class="error"  for="fxaddr">Адрес доставки?</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="table-cell">
                                        <div class="radio-wrap-vertical">
                                            <input id="novapochta" name="deliverychoose" type="radio" value="2" >
                                            <label for="novapochta"><span>Новая Почта</span></label>
                                        </div>
                                    </div>
                                    <div class="table-cell">
                                        <div class="table-text">
                                            <input class="js-combobox" min="3" list="cityname" data-json-path="{{ asset('/get_np_cities') }}" id="npcity" name="city" type="text" placeholder="Город" data-content-token="{{ csrf_token() }}" autocomplete="off" disabled>
                                            <datalist id="cityname">
                                                <option data-id="e718a680-4b33-11e4-ab6d-005056801329">Київ</option>
                                                <option data-id="e717110a-4b33-11e4-ab6d-005056801329">Дніпро</option>
                                                <option data-id="e71abb60-4b33-11e4-ab6d-005056801329">Львів</option>
                                                <option data-id="e71629ab-4b33-11e4-ab6d-005056801329">Вінниця</option>
                                                <option data-id="e71f8b5f-4b33-11e4-ab6d-005056801329">Херсон</option>
                                                <option data-id="e71b108c-4b33-11e4-ab6d-005056801329">Миколаїв</option>s
                                            </datalist>
                                            <span id="np-error" class="error"  for="city">Город доставки?</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="table-cell">
                                        &nbsp;
                                    </div>
                                    <div class="table-cell">
                                        <div class="table-text custom-select">
                                            <select class="form-control form-disabled" id="npposts" name="npposts" data-json-path="{{ asset('/get_np_posts') }}" placeholder="Номер отделения" disabled>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!Auth::check())
                            <h2 class="blue-text">Не зарегистрированы?</h2>
                            <div class="checkbox-wrap">
                                <input id="weareregister" name="weareregister" value="1" type="checkbox">
                                <label for="weareregister"><span>зарегистрируйте меня</span></label>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                <hr style="opacity: .15"/>
                <div class="row">
                    <div class="col-12">
                        <div class="text-block">>
                            <div class="text-block">
                                <p>{{ $cartTotal }} товаров на сумму {{ $cart['cart']->total_price }} грн</p>
                                <p>стоимость доставки: 0 грн</p>
                                <h1>Итого: {{ $cart['cart']->total_price_delivery }} грн</h1>
                            </div>
                        </div>
                        <button class="btn blue" id="submitforms" value="Продолжить">Продолжить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js-script')
    <script src="{{ asset('/js/jquery-json-to-datalist.js') }}"></script>
    <script src="{{ asset('/js/jquery-json-get-np-posts.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script type="text/javascript">
        $(function() {
            var oldOpt = $('#cityname').html();

            <!--Name can't be blank-->
            $('#reg-name').on('input', function() {
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
            $('#reg-telephone').on('input', function() {
                var input=$(this);
                var re = /[0-9]+/;
                var is_num=re.test(input.val());
                var error_element=$("span", input.parent());
                if(is_num) {
                    input.removeClass("invalid").addClass("valid");
                    error_element.removeClass("error_show").addClass("error");
                } else {
                    input.removeClass("valid").addClass("invalid");
                    error_element.removeClass("error").addClass("error_show");
                }
            });

            <!--Email must be an email -->
            $('#reg-email').on('input', function() {
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

            $('#fxaddr').on('input', function() {
                var input=$(this);
                var is_name=input.val();
                var error_element=$("#fx-error");
                if(is_name){
                    input.removeClass("invalid").addClass("valid");
                    error_element.removeClass("error_show").addClass("error");
                } else{
                    input.removeClass("valid").addClass("invalid");
                    error_element.removeClass("error").addClass("error_show");
                }
            });

            $('#npcity').on('input', function() {
                var input=$(this);
                var is_name=input.val();
                var error_element=$('#np-error');
                if(is_name){
                    input.removeClass("invalid").addClass("valid");
                    error_element.removeClass("error_show").addClass("error");
                } else{
                    input.removeClass("valid").addClass("invalid");
                    error_element.removeClass("error").addClass("error_show");
                }
            });


            $('#submitforms').on('click', function() {
                $(this).html( $(this).data('loading-text') ? $(this).data('loading-text') : 'Загрузка...' );
                $(this).prop('disabled', true);

                var first_form_check = false;
                var form_data=$("#registerForm").serializeArray();
                var error_free = true;
                var post_text = "[";
                for (var input in form_data) {
                    post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' + form_data[input]['value'] + '"},'
                    var element=$("#"+form_data[input]['name']);
                    if (form_data[input]['name'] == 'paytype' || form_data[input]['name'] == '_token') { continue; }
                    var valid=element.hasClass("valid");
                    var error_element=$("span", element.parent());
                    if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
                    else{error_element.removeClass("error_show").addClass("error");}
                    console.log("name:" + form_data[input]['name'] + ' errel: ' + valid);
                }

                if (!error_free){
                    $(this).html( $(this).val() ).prop('disabled', false);
                    event.preventDefault();
                } else {
                    first_form_check = true;
                }

                var error_free=true;
                var second_form_check = false;
                var form_data= $('#deliverytype').serializeArray();
                if (!$('#fxaddr').is(":disabled") || $('#selfdelivery').is(":checked")) {
                    //alert('fidex active');
                    for (var input in form_data) {
                        if (form_data[input]['name'] == '_token') { continue; }
                        post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' + form_data[input]['value'] + '"},'
                        var element=$("#"+form_data[input]['name']);
                        if (form_data[input]['name'] == 'deliverychoose' ||form_data[input]['name'] == '_token' || form_data[input]['name'] == "weareregister") { continue; }
                        var error_element=$('#fx-error');
                        var valid=element.hasClass("valid");
                        if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
                        else{error_element.removeClass("error_show").addClass("error");}
                        console.log("name:" + form_data[input]['name'] + ' errel: ' + valid);
                    }
                }


                if (!$('#npcity').is(":disabled")){
                    for (var input in form_data) {
                        if (form_data[input]['name'] == '_token') { continue; }
                        if (form_data[input]['name'] == "city") {
                            post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' + $('#np' + form_data[input]['name']).val() + '"},'
                        } else {
                            post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' +  form_data[input]['value'] + '"},'
                        }
                        var element=$("#np"+form_data[input]['name']);
                        if (form_data[input]['name'] == "city") {
                            if (form_data[input]['name'] == 'deliverychoose' ||form_data[input]['name'] == '_token' || form_data[input]['name'] == "weareregister") { continue; }
                            var error_element = $('#np-error');
                            var valid = element.hasClass("valid");
                            if (!valid) {
                                error_element.removeClass("error").addClass("error_show");
                                error_free = false;
                            }
                            else {
                                error_element.removeClass("error_show").addClass("error");
                            }
                        }
                        console.log("name:" + form_data[input]['name'] + ' errel: ' + valid);
                    }
                }
                post_text = post_text.substring(0, post_text.length - 1);
                post_text = post_text + ']';
                console.log("PT: " + post_text);

                if (!error_free){
                    $(this).html( $(this).val() ).prop('disabled', false);
                    event.preventDefault();
                } else {
                    second_form_check = true;
                }
                console.log("f:" + first_form_check + " s:" + second_form_check);

                if (first_form_check && second_form_check) {
                    //alert("do work!!")
                    var token = $('.js-combobox').data('content-token');
                    $.ajax({
                        type: 'POST',
                        url: $("#registerForm").attr('action'),
                        data: post_text,
                        contentType: "application/json; charset=utf-8",
                        dataType: "json"
                    }).always(function(data, textStatus, jqXHR) {
                        if (data.response == 'success') {
                            console.log("rest success. d:" + data.data);
                            //console.log("rest success. p:" + data.params);
                            document.location.href = data.data;
                            return;
                        } else {
                            console.log("rest error.");
                            document.location.href = "/";
                            return;
                        }
                    });
                }
                //$(this).html( $(this).val() ).prop('disabled', false);
            });

            $('.js-combobox').on('input',function() {
                var val = this.value;

                if (val.length >= 3) {
                    $('#submitforms').html( $('#submitforms').data('loading-text') ? $('#submitforms').data('loading-text') : 'Загрузка...' );
                    $('#submitforms').prop('disabled', true);
                    $('.js-combobox').jsonToDatalist({
                        jsonVal: $(this).val(),
                        token: $(this).data('content-token')
                    });
                    $('#submitforms').html( $('#submitforms').val()).prop('disabled', false);
                }

                if($('#cityname').find('option').filter(function() {
                        return this.value.toUpperCase() === val.toUpperCase();
                    }).length) {
                    var refid = $('#cityname option').filter(function() {
                        return this.value == val;
                    }).data('id');

                    // get npposts
                    $('#submitforms').html( $('#submitforms').data('loading-text') ? $('#submitforms').data('loading-text') : 'Загрузка...' ).prop('disabled', true);
                    $('#npposts').jsonGetNpPosts({
                        jsonVal: refid,
                        token: $(this).data('content-token')
                    });
                    $('#submitforms').html( $('#submitforms').val()).prop('disabled', false);

                    $('#npposts').removeClass('form-disabled')
                    $('#npposts').prop('disabled', false);
                    $('#npposts').focus();
                }

                if(val.length == 0) {
                    $('#npposts').prop('disabled', true);
                    $('#cityname').empty();
                    $('#cityname').append(oldOpt);
                    $(this).trigger('click');
                    $(this).focus();
                }
            });

            $('#selfdelivery').on('change',function() {
                if ($(this).is(':checked')) {
                    $('#fxaddr').prop('disabled', true);
                    $('#npcity').prop('disabled', true);
                    var error_element=$('#fx-error');
                    error_element.removeClass("error_show").addClass("error");
                    var error_element=$('#np-error');
                    error_element.removeClass("error_show").addClass("error");
                }
            });

            $('#novapochta').on('change',function() {
                if ($(this).is(':checked')) {
                    $('#fxaddr').prop('disabled', true);
                    $('#npcity').prop('disabled', false);
                    $('#npcity').focus();
                    var error_element=$('#fx-error');
                    error_element.removeClass("error_show").addClass("error");
                    var error_element=$('#np-error');
                    error_element.removeClass("error_show").addClass("error");
                }
            });
            $('#fedex').on('change',function() {
                if ($(this).is(':checked')) {
                    $('#npposts').prop('disabled', true);
                    $('#npcity').prop('disabled', true);
                    $('#fxaddr').prop('disabled', false);
                    $('#fxaddr').focus();
                    var error_element=$('#fx-error');
                    error_element.removeClass("error_show").addClass("error");
                    var error_element=$('#np-error');
                    error_element.removeClass("error_show").addClass("error");
                }
            });

        });
    </script>
@endsection