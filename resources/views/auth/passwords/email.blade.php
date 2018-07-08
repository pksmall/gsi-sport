@extends('front.layout.front')

@section('content')

    <section class="login container-pages
             form-camo-tek">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <h4>{{ trans('base.reset_pass_title') }}</h4>

        <div class="content-wrapper">
            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <input type="email" name="email" placeholder="e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" autofocus/>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <button type="submit" class="send">
                    {{ trans('base.reset_pass') }}
                </button>
            </form>
        </div>

    </section>

@endsection
