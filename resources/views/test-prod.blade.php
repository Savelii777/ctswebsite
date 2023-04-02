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
                            <a href="{{ route('chapter.materials', $test->chapter['id']) }}">Дополнительные материалы по
                                теме</a>
                            <a href="">Тест по теме</a>
                        </nav>
                    </div>
                    @switch($test->id)
                        @case(1)
                        <test-1
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-1>
                        @break

                        @case(2)
                        <test-2
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-2>
                        @break

                        @case(3)
                        <test-3
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-3>
                        @break

                        @case(4)
                        <test-4
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-4>
                        @break

                        @case(5)
                        <test-5
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-5>
                        @break

                        @case(6)
                        <test-6
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-6>
                        @break

                        @case(7)
                        <test-7
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-7>
                        @break

                        @case(8)
                        <test-8
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-8>
                        @break

                        @case(9)
                        <test-9
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-9>
                        @break

                        @case(10)
                        <test-10
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-10>
                        @break

                        @case(11)
                        <test-11
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-11>
                        @break

                        @case(12)
                        <test-12
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-12>
                        @break

                        @case(13)
                        <test-13
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-13>
                        @break

                        @case(14)
                        <test-14
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-14>
                        @break

                        @case(15)
                        <test-15
                            :test="{{ $test }}"
                            :questions="{{ $test->questions->count() }}"
                            :chapter="{{ $test->chapter }}"
                        ></test-15>
                        @break

                        @case(16)
                        <test-16
                            :test="{{ $test }}"
                            :questions="91"
                            :chapter="{{ $test->chapter }}"
                        ></test-16>
                        @break

                        @default
                    @endswitch
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: flex-end; margin: 0 0 15px;">
                @switch($test->id)
                    @case(1)
                    <button
                        onclick="location.href='{{ url("/test/2")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(2)
                    <button
                        onclick="location.href='{{ url("/test/3")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(3)
                    <button
                        onclick="location.href='{{ url("/test/4")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(4)
                    <button
                        onclick="location.href='{{ url("/test/5")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(5)
                    <button
                        onclick="location.href='{{ url("/test/6")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(6)
                    <button
                        onclick="location.href='{{ url("/test/7")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(7)
                    <button
                        onclick="location.href='{{ url("/test/8")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(8)
                    <button
                        onclick="location.href='{{ url("/test/9")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(9)
                    <button
                        onclick="location.href='{{ url("/test/10")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(10)
                    <button
                        onclick="location.href='{{ url("/test/11")}}'"
                        type="button"
                        style="color: black; min-width: 190px; height: 60px; width: fit-content;"
                        class="btn-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(11)
                    <button
                        onclick="location.href='{{ url("/test/12")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(12)
                    <button
                        onclick="location.href='{{ url("/test/13")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(13)
                    <button
                        onclick="location.href='{{ url("/test/14")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(14)
                    <button
                        onclick="location.href='{{ url("/test/15")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к следующему тесту
                    </button>
                    @break
                    @case(15)
                    <button
                        onclick="location.href='{{ url("/test/16")}}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        Перейти к финальному тесту
                    </button>
                    @break
                    @case(16)
                    <button
                        onclick="location.href='{{ url('/home') }}'"
                        type="button"
                        class="btn-active test-button-active"
                    >
                        На главную
                    </button>
                    @break
                @endswitch
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
