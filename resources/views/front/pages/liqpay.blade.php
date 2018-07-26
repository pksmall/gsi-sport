@extends('front/layout/front')
@section('content')
    <form id="liqpayform" name=="liqpayform" method="POST" action="{{$data['action']}}" accept-charset="utf-8">
        <input type="hidden" name="data" value="{{$data['data']}}">
        <input type="hidden" name="signature" value="{{$data['signature']}}">
        <input type="image" src="//static.liqpay.ua/buttons/p1ru.radius.png" name="btn_text" />
    </form>

@endsection
@section('page-js-script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("form#liqpayform").submit();
        });
    </script>
@endsection
