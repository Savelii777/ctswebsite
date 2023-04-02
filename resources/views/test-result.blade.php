@extends('layouts.main_layout')

@section('content')
    @include('partials.header')
    <section id="structure" class="account">
        <div class="container">
            @include('partials.test_top', ['chapter' => $test->chapter])
            <h2>
                <b>курс: </b>{{ $test->chapter->course->title }}
            </h2>
            <div id="pass" class="pass">
                <div style="margin-left:0; margin-right:0" class="row" id="app">
                    <div class="col-lg-4 pass-menu">
                        <p class="menu-title">
                            {{ $test->chapter->title }}
                        </p>
                        <nav class="menu">
                            @if (false)
                       <a href="">Видео-урок по теме</a>
                       <a href="">Презентация по теме</a>
                       @endif
                            <a href="{{ route('chapter.materials', $test->chapter['id']) }}">Дополнительные материалы по теме</a>
                            <a href="">Тест по теме</a>
                        </nav>
                    </div>

                    <div class="offset-lg-1 col-lg-7 pass-tests">
                        <p class="tests-title">
                            Тест по теме "{{ $test->chapter->title }}"
                        </p>
                        <ul class="tests-list">
                            <li class="tests-item">
                                <p>
                                    всего вопросов
                                </p>
                                <div>
                                    {{ $test->questions->count() }}
                                </div>
                            </li>
                            <li class="tests-item">
                                <p>
                                    правильных ответов для зачета
                                </p>
                                <div>
                                    {{ $test->min_correct }}
                                </div>
                            </li>
                            <li class="tests-item">
                                <p>
                                    время на выполение
                                </p>
                                <div>
                                    {{ $test->minutes }} минут
                                </div>
                            </li>
                        </ul>
                        @if($attempt->is_passed)
                            <div class="tests-good tests">
                                <div>
                                    <button class="btn-active btn btn-good">
                                        <a href="#">Тест сдан</a>
                                    </button>
                                    <p>верных ответов <b>{{ $attempt->correct }}</b></p>
                                </div>
                                <div>
                                    <button
                                        onclick="location.href='{{ url("/test/{$test['id']}")}}'"
                                        style="color: black"
                                        class="btn-active">
                                        Сдать еще раз
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="tests-bad tests">
                                <div>
                                    <button class="btn-active btn btn-bad">
                                        <a href="#">Тест не сдан</a>
                                    </button>
                                    <p>верных ответов <b>{{ $attempt->correct }}</b></p>
                                </div>
                                <div>
                                    <button class="btn-active"
                                            style="color: black"
                                            onclick="location.href='{{ url("/test/{$test['id']}")}}'"
                                    >
                                        Пересдать
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
