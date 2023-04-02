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
                        </div>
                        <div class="col-lg-12">
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
                                        город
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
                    <!--<button id="button_show_profile_info" class="person__btn btn-hide profile_visibity">
                        <div style="color:white">
                                <span>
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            Показать описание профиля</div>
                    </button>-->
                </div>

            </div>
        </div>
    </section>
    <section id="courses">
        <div class="container" id="app">
            <h2>
                Мои программы и курсы
            </h2>
            @foreach ($courses as $key => $course)
                <div class="progress row" style="margin-left: 0">
                    <line-progress :percent="{{ $course->completePercent(Auth::user()->id) }}"></line-progress>
                </div>
            <div class="courses__block">
                <button 
                type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseImg{{$key}} multiCollapseText{{$key}} multiCollapseInfo{{$key}}"
                id="button_hide_course_info_{{$key}}" style="background-color: white" class="person__btn btn-hide">
                    <div class="profile_visibity">
                        <span>
                            <i class="fa fa-angle-up"></i>
                        </span>
                            Скрыть</div>
                    <div>
                    <span>
                        <i class="fa fa-angle-down"></i>
                    </span>
                        Раскрыть</div>
                </button>
                <div class="courses__img col-md-4 col-lg-3 only_desktop">
                    <img style="object-fit: cover" src="{{ $course->img_url }}" alt="courses">
                </div>
                <div class="collapse multi-collapse only_mobile" id="multiCollapseImg{{$key}}">
                    <div class="courses__img col-md-4 col-lg-3">
                        <img style="object-fit: cover" src="{{ $course->img_url }}" alt="courses">
                    </div>
                </div>
                <div class="courses__elem col-md-8 col-lg-9">
                    <div class="courses__elem-up">
                        <div class="courses__caption">
                            <a class="courses__title" href="{{ route('course.show.user', $course['id']) }}">
                                {{ $course->title }}
                            </a>
                            <div class="courses__percent">
                                <percent-counter :percent="{{$course->completePercent(Auth::user()->id)}}"></percent-counter>
                                <p>
                                    изучено
                                </p>
                            </div>
                        </div>
                        <div class="courses__txt col-md-10 only_desktop">
                            {{ $course->description }}
                        </div>
                        <div class="collapse multi-collapse only_mobile" id="multiCollapseText{{$key}}">
                            <div class="courses__txt col-md-10">
                                {{ $course->description }}
                            </div>
                        </div>
                        <div class="collapse multi-collapse only_mobile" id="multiCollapseInfo{{$key}}">
                            <div class="courses__elem-info row">
                                <img src="{{ ('icons/right-blue.png') }}" alt="courses" class="exp-img">
                                <p class="exp-prg">
                                    {{ $course->chapters->count() }} занятий <br>({{ $course->completeCount(Auth::user()->id) }} выполнено)
                                </p>
                                <img src="{{ ('icons/right-blue.png') }}" alt="courses" class="exp-img">
                                <p class="exp-prg">
                                    40 часов <br>обучения
                                </p>
                                <div class="courses__expert expert row">
                                    <div class="expert__txt">
                                        <div>
                                            эксперт
                                        </div>
                                        <p>
                                            {{ $course->user->name }}
                                        </p>
                                    </div>
                                    <img src="{{ $course->user->img_url ? $course->user->img_url : ('/images/default-avatar.jpg') }}" alt="courses"
                                         class="img-responsive mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <div class="courses__elem-info row only_desktop">
                            <img src="{{ ('icons/right-blue.png') }}" alt="courses" class="exp-img">
                            <p class="exp-prg">
                                {{ $course->chapters->count() }} занятий <br>({{ $course->completeCount(Auth::user()->id) }} выполнено)
                            </p>
                            <img src="{{ ('icons/right-blue.png') }}" alt="courses" class="exp-img">
                            <p class="exp-prg">
                                40 часов <br>обучения
                            </p>
                            <div class="courses__expert expert row">
                                <div class="expert__txt">
                                    <div>
                                        эксперт
                                    </div>
                                    <p>
                                        {{ $course->user->name }}
                                    </p>
                                </div>
                                <img src="{{ $course->user->img_url ? $course->user->img_url : ('/images/default-avatar.jpg') }}" alt="courses"
                                     class="img-responsive mx-auto d-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @include('partials.footer')
@endsection
