@extends('front/layout/front')

@section('content')

    <section class="account">

        <div class="container-pages">
            <div class="content-wrapper">
                <div class="accoutn-header">
                    <h2>{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Профиль</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Подписка на рассылку</li>
                        </ol>
                    </nav>
                </div>

                @include('front/partials/profile-aside')

                <div class="account-body account-user-sub flex-column">

                    @if (Session::has('subs-update'))
                        <div class="alert alert-success" role="alert" style="background: #1e7e34; color:#fff;">
                            {{ trans('item.subs_upd') }}
                        </div>
                    @endif

                    <h3>{{ trans('item.profile_aside_subs') }}</h3>
                    <p>{{ trans('item.subs_info') }}</p>
                    <form action="{{ route('update_my_subscribe') }}" method="post">
                        @csrf
                        <div class="input-group-sub">
                            <label class="mail-label" for="e-mail">
                                <span>{{ trans('item.profile_email') }}</span>
                                <input type="text" name="email-for-sub" value="{{ $user->email }}">
                            </label>
                            <div class="radio-sub btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary @if($user->is_subscribe) active @endif">
                                    <input type="radio" name="is_subscribe" id="option1" @if($user->is_subscribe) checked @endif value="1">{{ trans('item.check_true') }}
                                </label>
                                <label class="btn btn-secondary remove-check @if(!$user->is_subscribe) active @endif">
                                    <input type="radio" name="is_subscribe" id="option2" value="0">{{ trans('item.check_false') }}
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="send">{{ trans('item.profile_edit') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection