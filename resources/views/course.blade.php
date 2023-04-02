@extends('layouts.main_layout')

@section('content')
    @include('partials.header')
    <section id="structure" class="account">
        <div class="container">
            <div style="margin-left:0; margin-right:0" class="row account-block">
                <div class="account-block__row">
                    <button onclick="location.href='{{ url('/home') }}'" class="btn-active account__btn">
                        <svg display="none">
                            <symbol viewBox="0 0 512.011 512.011" id="arrow">
                                <g>
                                    <path d="M505.755,123.592c-8.341-8.341-21.824-8.341-30.165,0L256.005,343.176L36.421,123.592c-8.341-8.341-21.824-8.341-30.165,0
                         s-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251c5.462,0,10.923-2.091,15.083-6.251l234.667-234.667
                         C514.096,145.416,514.096,131.933,505.755,123.592z"/>
                                </g>
                            </symbol>
                        </svg>
                        <svg class="arrow">
                            <use xlink:href="#arrow"></use>
                        </svg>
                        <p>Вернуться в профиль</p>
                    </button>
                    <button style="margin-top: 1rem; width: 100px;" id="history-button" class="btn-active account__btn">
                        <svg display="none">
                            <symbol viewBox="0 0 512.011 512.011" id="arrow">
                                <g>
                                    <path d="M505.755,123.592c-8.341-8.341-21.824-8.341-30.165,0L256.005,343.176L36.421,123.592c-8.341-8.341-21.824-8.341-30.165,0
                         s-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251c5.462,0,10.923-2.091,15.083-6.251l234.667-234.667
                         C514.096,145.416,514.096,131.933,505.755,123.592z"/>
                                </g>
                            </symbol>
                        </svg>
                        <svg class="arrow">
                            <use xlink:href="#arrow"></use>
                        </svg>
                        <p>Назад</p>
                    </button>
                </div>
                <div class="account-elem">
                    <img src="{{ asset('icons/right-blue.png') }}" alt="courses" class="exp-img">
                    <p class="exp-prg">
                        {{ $course->chapters->count() }} занятий <br>({{ $course->completeCount(Auth::user()->id) }}
                        выполнено)
                    </p>
                    <img src="{{ asset('icons/right-blue.png') }}" alt="courses" class="exp-img">
                    <p class="exp-prg">
                        {{ $course->hours }} часов <br>обучения
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
                        <img
                            src="{{ $course->user->img_url ? $course->user->img_url : ('/images/default-avatar.jpg') }}"
                            alt="person">
                    </div>
                </div>
            </div>
            <h2>
                <b>курс: </b>{{ $course->title }}
            </h2>
        </div>
    </section>
    <section id="chapter">
        <div class="container">
            <div class="chapter__block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chapter-accordion">
                            @foreach($course->chapters as $chapter)
                                <div class="trigger">
                                    <p class="trigger-title">
                                        {{ $loop->iteration }} раздел курса
                                    </p>
                                    <div class="trigger-elem {{$chapter->tests[0]->in_progress?"pause-icon":""}}" >

                                        <input type="checkbox" id="checkbox-{{ $loop->iteration }}"
                                               name="checkbox-1"/>
                                        <label for="checkbox-{{ $loop->iteration }}" class="checkbox">
                                            <div class="checkbox-img
                                       @if ($chapter->complete(Auth::user()))
                                                checkbox-img-passed
@endif
                                                ">
                                                <img src="{{ asset('icons/tick.png') }}" alt="courses">
                                                <img src="{{ asset('icons/tick-hover.png') }}" alt="courses">
                                            </div>

                                            {{ $chapter->title }}


                                        </label>






                                        <div class="content">
                                            <p class="content-caption">Содержимое</p>
                                            @if (false)
                                                <div class="content-elem">
                                                    <div class="content-left">
                                                        <img src="{{ asset('icons/play-button.png') }}" alt="courses">
                                                        <p>
                                                            Видео-урок по теме
                                                        </p>
                                                    </div>
                                                    <div class="content-right">
                                                        <p>
                                                            1 час 42 минуты
                                                        </p>
                                                        <button
                                                            style="margin-left: 20px"
                                                            class="btn-active">
                                                            <a href="#">Смотреть</a>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="content-elem">
                                                    <div class="content-left">
                                                        <img src="{{ asset('icons/board.png') }}" alt="courses">
                                                        <p>
                                                            Презентация по теме
                                                        </p>
                                                    </div>
                                                    <div class="content-right">
                                                        <button
                                                            style="margin-left: 20px"
                                                            class="btn-active">
                                                            <a href="#">Смотреть</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="content-elem">
                                                <div class="content-left">
                                                    <img src="{{ asset('icons/google-docs.png') }}" alt="courses">
                                                    <p>
                                                        Дополнительные материалы по теме
                                                    </p>
                                                </div>
                                                <div class="content-right">
                                                    <button
                                                        style="margin-left: 20px"
                                                        onclick="location.href='{{ route('chapter.materials', $chapter['id']) }}'"
                                                        class="btn-active">
                                                        <div style="font-size: 12px;color: #000;">Смотреть</div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="content-test">


                                                <div class="row mb-2 w-100">
                                                    <div class="col-10">
                                                        <p>
                                                            Тест по теме
                                                        </p>
                                                        @if (!$chapter->available(Auth::user()))
                                                            <p style="color: red">
                                                                Завершите тест предыдущео раздела
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div class="col-2 d-flex justify-content-end">
                                                        <button
                                                            {{!$chapter->available(Auth::user()) ? 'disabled' : ''}} style="color: white"
                                                            onclick="location.href='{{ url("/test/about/{$chapter->tests[0]['id']}")}}'">
                                                            Пройти
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row w-100">
<!--                                                    {{print_r($chapter->tests[0]->complete_questions??[],true)}}-->

                                                    @foreach($chapter->tests[0]->questions as $index=>$q)
                                                        <div class="col-3 border-left">
                                                            <p class="d-flex justify-content-between text-black">
                                                                Вопрос {{$index+1}}
                                                                @if(in_array($q->id,$chapter->tests[0]->complete_questions??[]))
                                                                    <span class="text-primary">сдано</span>
                                                                @else
                                                                    <span class="text-danger">не сдано</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    @endforeach

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
