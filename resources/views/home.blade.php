@extends('layouts.main_layout')
@section('content')
    @include('partials.header')
    <section id="person">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4">
                    <div class="person__img person_image_margin">
                        <img
                             src="{{ Auth::user()->img_url ? Auth::user()->img_url : ('images/default-avatar.jpg') }}"
                             alt="person" class="img-responsive mx-auto d-block">
                    </div>
                </div>
                <ul class="only_desktop person__list col-lg-7 col-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <li class="person__item">
                                <p>
                                    ФИО
                                </p>
                                <div>
                                    {{ Auth::user()->name }}
                                </div>
                            </li>
                            <li class="person__item">
                                <p>
                                    Номер телефона
                                </p>
                                <div>
                                    {{ Auth::user()->phone_number }}
                                </div>
                            </li>
                            <li class="person__item">
                                <p>
                                    Почта
                                </p>
                                <div>
                                    {{ Auth::user()->email }}
                                </div>
                            </li>

                        </div>
                        <div class="col-lg-12">

                        <li class="person__item">
                            <p>
                                дата рождения
                            </p>
                            <div>
                                {{ Auth::user()->birth ? date_format(date_create(Auth::user()->birth), 'd.m.Y') : 'не указана' }}
                            </div>
                        </li>
                        <li class="person__item">
                            <p>
                                пол
                            </p>
                            <div>
                                {{ Auth::user()->sex }}
                            </div>
                        </li>
                        <li class="person__item">
                            <p>
                                город
                            </p>
                            <div>
                                {{ Auth::user()->city ? Auth::user()->city : 'не указан' }}
                            </div>
                        </li>
                        <li class="person__item">
                            <p>
                                место работы
                            </p>
                            <div class="font">
                                {{ Auth::user()->place_of_work ? Auth::user()->place_of_work : 'не указано'}}
                            </div>
                        </li>
                        </div>

                    </div>
                </ul>
                <ul class="only_mobile person__list col-lg-7 col-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <li class="person__item">
                                <p>
                                    ФИО
                                </p>
                                <div>
                                    {{ Auth::user()->name }}
                                </div>
                            </li>
                            <li class="person__item">
                                <p>
                                    дата рождения
                                </p>
                                <div>
                                    {{ Auth::user()->birth ? date_format(date_create(Auth::user()->birth), 'd.m.Y') : 'не указана' }}
                                </div>
                            </li>
                        </div>
                        <div id="collapseProfile" class="collapse show">
                            <div class="col-lg-12">
                                <li class="person__item">
                                    <p>
                                        пол
                                    </p>
                                    <div>
                                        {{ Auth::user()->sex }}
                                    </div>
                                </li>
                                <li class="person__item">
                                    <p>
                                        курс
                                    </p>
                                    <div>
                                        {{ Auth::user()->city ? Auth::user()->city : 'не указан' }}
                                    </div>
                                </li>
                                <li class="person__item">
                                    <p>
                                        место учебы/работы
                                    </p>
                                    <div class="font">
                                        {{ Auth::user()->place_of_work ? Auth::user()->place_of_work : 'не указано'}}
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                </ul>
                <div class="person__btn-elem col-lg-3">
                    <button class="person__btn">
                        <a href="{{route('settings')}}"> Настроки профиля</a>
                    </button>
                    <button
                        type="button" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile"
                        id="button_hide_profile_info" class="person__btn btn-hide">
                            <div style="color:white">
                                <span>
                                    <i class="fa fa-angle-up"></i>
                                </span>
                            Скрыть описание профиля</div>
                            <div class="profile_visibity" style="color:white">
                                <span>
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            Показать описание профиля</div>
                    </button>
                </div>

            </div>
        </div>
    </section>
    <section id="courses">
        <div class="container" id="app">
            <h2 style="color:#fff">
               Корзина покупок
            </h2>

            <div class="courses__block" style="display:flex; justify-content:center; align-items:center;">
            <div class="shopping-cart-wrapper" style="min-width: 100%">
  <table class="table is-fullwidth shopping-cart">
    <thead>
      <tr>
        <th>Наименование</th>
        <th style="max-width:20px">Цена</th>
        <th style="max-width:15px">Количество</th>
        <th style="max-width:20px">Всего</th>
        <th></th>
      </tr>
    </thead>
  </table>
  <div class="totals" style="color: #000; margin-top: 20px;">
    <div class="totals-item">
      <label>Итого</label>
      <div class="totals-value" id="cart-subtotal">0 ₽</div>
    </div>
    <button onClick="downloadToExcel()" class="btn btn-success float-right" style="color:#fff;  margin-top: 20px;"><img src="/images/excel.png" width="16" height="16">Скачать</button>
  </div>
  <button onClick="sendDataToServer()" class="checkout" style="color: #fff; background: #6b7fe3; border-radius:5px; font-size: 24px; min-width:85px; min-height:30px; margin-top: 20px;">Заказать</button>
</div>
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
