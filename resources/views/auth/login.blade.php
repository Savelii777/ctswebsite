@extends('layouts.main_layout')

@section('content')
@include('partials.header')
<section id="entrance" class="account">
    <div class="container" id="app">
    @if (session('success'))
<div class="alert alert-success text-center">
    <h1>Операция выполнена успешно!</h1>
</div>
@endif
    <div class="entrance__block">

             <form method="POST" action="{{ route('login') }}" class="auth-block">
                @csrf
                <p class="form-title">
                  Вход
                </p>
                <div class="row">
                   <div class="form-group">
                      <label style="color:#6b7fe3">Введите Ваш логин</label>
                      <input id="login" type="login" style="color:#000; border: 1px solid #6b7fe3" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                      @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   </div>
                </div>
                <div class="row">
                   <div class="form-group">
                      <label style="color:#6b7fe3">Введите Ваш пароль</label>
                      <input id="password" type="password" style="color:#000; border: 1px solid #6b7fe3" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                </div>
                <button class="form-btn" type="submit"><a>Войти</a></button>
               <div class="form-txt" style="display: flex; flex-direction: column">
                   <a href="/register" style="color: #6b7fe3; max-width: max-content; margin-bottom: 15px">Регистрация</a>
                   @if (Route::has('password.request'))
                       <a href="{{ route('password.request') }}" style="color: #6b7fe3; max-width: max-content; ">
                           Восстановить пароль?
                       </a>
                   @endif
               </div>
             </form>
          </div>
    </div>
 </section>
 @include('partials.footer')
@endsection
