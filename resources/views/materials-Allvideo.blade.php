@extends('layouts.main_layout')

@section('content')
@include('partials.header')
<section id="structure" class="account">
   <div class="container">
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
                    <img src="{{ asset('images/right-blue.png') }}" alt="courses" class="exp-img">
                    <p class="exp-prg">
                        {{ $course->chapters->count() }} занятий <br>({{ $course->completeCount(Auth::user()->id) }}
                        выполнено)
                    </p>
                    <img src="{{ asset('images/right-blue.png') }}" alt="courses" class="exp-img">
                    <p class="exp-prg">
                        {{ $course->hours }} часов <br>обучения
                    </p>
                    <div class="courses__expert expert row">
                        <div class="expert__txt">
                            <div>
                                Администратор
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
                {{ $course->title }}
                <p class="tests-title">
                  Видеоматериалы:
               </p>
            </h2>
         </div>
    </section>

      <div id="pass" class="pass">
         <div style="margin-left:0; margin-right:0;" class="row">
            <div class="col-lg-4 pass-menu">

               <nav class="menu">
                  @if (false)
                  <a href="">Видео-урок по теме</a>
                  <a href="">Презентация по теме</a>
                  @endif

               </nav>
            </div>
            <div class=" col-lg-7 materials-block">

               <div class="materials-list">
                  <div style="margin-left:0; margin-right:0; flex-direction: column" class="row">
                     @foreach($course->chapters as $chapter)

                        @foreach ($chapter->files as $file)
                           @if (pathinfo($file->url, PATHINFO_EXTENSION) === 'mp4')
                           <b>{{$chapter->title}}</b>
                              <div class="col-md-4" id="materials-item">
                                 <a style="display: none" class="link-pdf" id="materials-item-{{$file->id}}" href="{{$file->url}}">materials-item-{{$file->id}}</a>
                                 <a style="display: none" class="link-video" id="materials-item-{{$file->id}}" href="{{$file->url}}">materials-item-{{$file->id}}</a>
                              </div>
                           @endif

                        @endforeach
                     @endforeach
                  </div>
                  <div id="pass" class="pass" style="position: relative">



                  </div>

               </div>

            </div>
         </div>
      </div>

   </div>
</section>
@include('partials.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>

@endsection
