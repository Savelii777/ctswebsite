@extends('layouts.app')

@section('content')
    @include('partials.header')
    <section id="entrance" class="account">
    @if (session('success'))
<div class="alert alert-success text-center">
    <h1>Операция выполнена успешно!</h1>
</div>
@endif
        <div class="container" id="app" style="display: flex; flex-direction: column;">
            <div class="entrance__block">
                <form method="POST" action="{{ route('register') }}" style="margin-left: 400px">
                    @csrf

                    <div class="form-group row" style="display: flex; flex-direction: column">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ФИО*') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" style="display: flex; flex-direction: column">
                        <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Логин*') }}</label>

                        <div class="col-md-6">
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                            @error('login')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" style="display: flex; flex-direction: column">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Телефон*') }}</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
{{--                    <div class="form-group row" style="display: flex; flex-direction: column">--}}
{{--                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Город') }}</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>--}}

{{--                            @error('city')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row" style="display: flex; flex-direction: column">--}}
{{--                        <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Дата рождения') }}</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="birth" type="text" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" autocomplete="birth" autofocus>--}}

{{--                            @error('birth')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row" style="display: flex; flex-direction: column">--}}
{{--                        <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Пол') }}</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="sex" type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}" autocomplete="sex" autofocus>--}}

{{--                            @error('sex')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row" style="display: flex; flex-direction: column">--}}
{{--                        <label for="place_of_work" class="col-md-4 col-form-label text-md-right">{{ __('Место работы') }}</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="place_of_work" type="text" class="form-control @error('place_of_work') is-invalid @enderror" name="place_of_work" value="{{ old('place_of_work') }}" autocomplete="place_of_work" autofocus>--}}

{{--                            @error('place_of_work')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group row" style="display: flex; flex-direction: column">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Почта') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" style="display: flex; flex-direction: column">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль*') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" style="display: flex; flex-direction: column">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторите пароль*') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="form-btn" style="margin-left: -170px; border-radius: 10px; border: 1px solid #fff">
                                {{ __('Регистрация') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
