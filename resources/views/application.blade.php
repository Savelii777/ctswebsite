@extends('layouts.main_layout')

@section('content')
    @include('partials.header')
    <section id="application" class="account">
        <div class="container">
        <div class="application__block">
              <form method="POST" action="{{ route('application.send.guest') }}" class="auth-block">
               @csrf
                 <p class="form-title">
                    Отправить заявку
                 </p>
                 <div class="row">
                    <div class="form-group">
                       <label>Представьтесь пожалуйста</label>
                       <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                       @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group">
                       <label>Сфера деятельности</label>
                       <input value="{{ old('place_of_work') }}" name="place_of_work" type="text" class="form-control @error('place_of_work') is-invalid @enderror">
                       @error('place_of_work')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group">
                       <label>Ваш город</label>
                       <input value="{{ old('city') }}" name="city" type="text" class="form-control @error('city') is-invalid @enderror">
                       @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group">
                       <label>Введите Ваш e-mail</label>
                       <input value="{{ old('email') }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                       @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                 </div>
                 <div class="row">
                 <button class="form-btn" type="submit" :disabled="!formReady"><a>Отправить заявку</a></button>
                 </div>
                 <div class="form-txt">
                    Нажимая кнопку «Отправить заявку» пользователь соглашается с <a href="#">политикой конфеденциальности</a> и <a href="#">правилами сайта</a>
                 </div>
              </form>
           </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
