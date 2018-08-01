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
                                <input class="form-control" id="reg-telephone" name="reg-telephone" type="text"  min="12" placeholder="Телефон">
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
                                        <div class="table-text custom-select">
                                            <select class="form-control" name="regionname" id="regionname" disabled>
                                                <option data-id="" value="">Выберите область</option>
                                                @foreach($regions as $region)
                                                <option data-id="{{ $region->nameru }}" value="{{ $region->regionref }}">{{ $region->nameru }}</option>
                                                @endforeach
                                            </select>
                                            <span id="err-regionname" class="error"  for="city">Область доставки?</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="table-cell">
                                        &nbsp;
                                    </div>
                                    <div class="table-cell">
                                        <div class="table-text custom-select">
                                            <select class="form-control form-disabled" id="npcities" name="npcities" data-json-path="{{ asset('/api/v1/get_np_cities') }}" disabled>
                                                <option data-id="" value="">Выберите город</option>
                                            </select>
                                        </div>
                                        <span id="err-npcities" class="error"  for="city">Город доставки?</span>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="table-cell">
                                        &nbsp;
                                    </div>
                                    <div class="table-cell">
                                        <div class="table-text custom-select">
                                            <select class="form-control form-disabled" id="npposts" name="npposts" data-json-path="{{ asset('/api/v1/get_np_warehouses') }}"  disabled>
                                                <option data-id="" value="">Выберите отделение</option>
                                            </select>
                                        </div>
                                        <span id="err-npposts" class="error"  for="city">НП Отделение?</span>
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
    <script src="{{ asset('/js/jquery-json-get-np-cities.js') }}"></script>
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
            $('#reg-telephone').mask('+380 (55) 555-55-55', {
                placeholder: "+380 (__) ___-__-__"}
            );
            $('#reg-telephone').on('input', function() {
                var input=$(this);
                var clearval = input.val();
                var minlen = input.attr('min');
                var len = input.val().length - 7;
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
                //console.log("Phlen: " + len + " FL: " + minlenflag + " V:" + clearval );
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

            $('#submitforms').on('click', function() {
                $(this).html( $(this).data('loading-text') ? $(this).data('loading-text') : 'Загрузка...' );
                $(this).prop('disabled', true);

                var first_form_check = false;
                var form_data=$("#registerForm").serializeArray();
                var error_free = true;
                var post_text = "[";
                for (var input in form_data) {
                    post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' + form_data[input]['value'] + '"},';
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
//                        post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' + form_data[input]['value'] + '"},';
                        if (form_data[input]['name'] == '_token') { continue; }
                        post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' + form_data[input]['value'] + '"},'
                        var element=$("#"+form_data[input]['name']);
                        if (form_data[input]['name'] == 'deliverychoose' ||form_data[input]['name'] == '_token') { continue; }
                        var error_element=$('#fx-error');
                        var valid=element.hasClass("valid");
                        if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
                        else{error_element.removeClass("error_show").addClass("error");}
                        console.log("name:" + form_data[input]['name'] + ' errel: ' + valid);
                    }
                }


                if (!$('#novapochta').is(":disabled")){
                    //console.log(form_data);
                    var falseindex = 0;
                    for (var input in form_data) {
                        if (form_data[input]['name'] == '_token')  { continue; }
                        post_text = post_text + '{ "' + form_data[input]['name'] + '":' + '"' +  form_data[input]['value'] + '"},'
                        //form_data[input]['name'] == 'npposts' ||
                        if (form_data[input]['name'] == 'deliverychoose' || form_data[input]['name'] == 'weareregister') { continue; }
                        var element=$("#"+form_data[input]['name']);
                        var error_element=$('#err-'+form_data[input]['name']);
                        var valid = element.hasClass("valid");
                        if (!valid || form_data[input]['value'] == '') {
                            error_element.removeClass("error").addClass("error_show");
                            falseindex++;
                            error_free = false;
                        }
                        else {
                            error_element.removeClass("error_show").addClass("error");
                        }
                        console.log("name:" + form_data[input]['name'] + ' errel: ' + valid);
                    }
                    console.log("fidx:" + falseindex);
                    if (falseindex > 1) {
                        //$('#err-regionname').removeClass("error_show").addClass("error");
                        //$('#err-npcities').removeClass("error_show").addClass("error");
                        $('#err-npposts').removeClass("error_show").addClass("error");
                    }
                    if (falseindex > 2) {
                        //$('#err-regionname').removeClass("error_show").addClass("error");
                        $('#err-npcities').removeClass("error_show").addClass("error");
                        $('#err-npposts').removeClass("error_show").addClass("error");
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
                            //console.log("rest success. d:" + data.data);
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

            $('#selfdelivery').on('change',function() {
                if ($(this).is(':checked')) {
                    $('#fxaddr').prop('disabled', true);
                    $('#npposts').prop('disabled', true);
                    $('#regionname').prop('disabled', true);
                    $('#npcities').prop('disabled', true);
                    var error_element=$('#fx-error');
                    error_element.removeClass("error_show").addClass("error");
                    $('#err-regionname').removeClass("error_show").addClass("error");
                    $('#err-npcities').removeClass("error_show").addClass("error");
                    $('#err-npposts').removeClass("error_show").addClass("error");
                }
            });

            $('#novapochta').on('change',function() {
                if ($(this).is(':checked')) {
                    $('#fxaddr').prop('disabled', true);
                    $('#regionname').prop('disabled', false);
                    $('#npcities').prop('disabled', false);
                    $('#npposts').prop('disabled', false);
                    var error_element=$('#fx-error');
                    error_element.removeClass("error_show").addClass("error");
                }
            });
            $('#fedex').on('change',function() {
                if ($(this).is(':checked')) {
                    $('#npposts').prop('disabled', true);
                    $('#regionname').prop('disabled', true);
                    $('#npcities').prop('disabled', true);
                    $('#fxaddr').prop('disabled', false);
                    $('#fxaddr').focus();
                    var error_element=$('#fx-error');
                    error_element.removeClass("error_show").addClass("error");
                    $('#err-regionname').removeClass("error_show").addClass("error");
                    $('#err-npcities').removeClass("error_show").addClass("error");
                    $('#err-npposts').removeClass("error_show").addClass("error");
                }
            });

            $('#npposts').on('change', function() {
                var input=$(this);
                var is_name=input.val();
                var error_element=$('#err-npposts');
                //console.log('nppost name changes to :' + is_name);
                if(is_name != "") {
                    input.removeClass("invalid").addClass("valid");
                    error_element.removeClass("error_show").addClass("error");
                } else {
                    input.removeClass("valid").addClass("invalid");
                    $('#err-npregionname').removeClass("error_show").addClass("error");
                    $('#err-npcities').removeClass("error_show").addClass("error");
                    error_element.removeClass("error").addClass("error_show");
                }
            });

            $('#npcities').on('change', function() {
                var input=$(this);
                var is_name=input.val();
                var error_element=$('#err-npcities');
                $('#npposts').removeClass("invalid").addClass("valid");
                $('#err-npposts').removeClass("error_show").addClass("error");
                if(is_name != ""){
                    input.removeClass("invalid").addClass("valid");
                    error_element.removeClass("error_show").addClass("error");
                    //console.log('city name changes to :' + is_name);
                    // get warehouses
                    $('#submitforms').html( $('#submitforms').data('loading-text') ? $('#submitforms').data('loading-text') : 'Загрузка...' );
                    $('#submitforms').prop('disabled', true);
                    $('#npposts').jsonGetNpPosts({
                            jsonVal: $(this).val()
                    });
                    $('#submitforms').html( $('#submitforms').val()).prop('disabled', false);

                    $('#npposts').removeClass('form-disabled')
                    $('#npposts').prop('disabled', false);
                    $('#npposts').focus();

                } else{
                    input.removeClass("valid").addClass("invalid");
                    error_element.removeClass("error").addClass("error_show");
                    $('#err-regionname').removeClass("error_show").addClass("error");
                }
            });

            $('#regionname').on('change', function() {
                var input=$(this);
                var is_name=input.val();
                var error_element=$('#err-regionname');
                $('#npposts').removeClass("invalid").addClass("valid");
                $('#err-npposts').removeClass("error_show").addClass("error");
                if(is_name != ""){
                    input.removeClass("invalid").addClass("valid");
                    error_element.removeClass("error_show").addClass("error");
                    //console.log('regionname changes to :' + is_name);
                    $('#npcities').removeClass('form-disabled');
                    $('#npcities').prop('disabled', false);
                    $('#npcities').focus();
                    // get cities
                    $('#submitforms').html( $('#submitforms').data('loading-text') ? $('#submitforms').data('loading-text') : 'Загрузка...' );
                    $('#submitforms').prop('disabled', true);
                    $('#npcities').jsonGetNpCities({
                        jsonVal: $(this).val()
                    });
                    $('#submitforms').html( $('#submitforms').val()).prop('disabled', false);

                } else{
                    input.removeClass("valid").addClass("invalid");
                    $('#err-npcities').removeClass("error_show").addClass("error");
                    $('#err-npposts').removeClass("error_show").addClass("error");
                    error_element.removeClass("error").addClass("error_show");
                }
            });



        });
    </script>
@endsection