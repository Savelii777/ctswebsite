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
                               @if ($test->questions->count() > 0)
                                <div>
                                {{ $test->questions->count() }}
                                </div>
                                @else
                                <div>91</div>
                               @endif        
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
                       <button style="color: white" onclick="location.href='{{ url("/test/{$test['id']}")}}'" class="btn-active test-button">
                           Сдать тест
                       </button>
                   </div>
               </div>
            </div>
         </div>
      </section>
    @include('partials.footer')
@endsection
