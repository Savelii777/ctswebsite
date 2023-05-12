@extends('layouts.main_layout')

@section('content')
    @include('partials.header')
    <section id="structure" class="account">
        <div class="container">
            @include('partials.test_top', ['chapter' => $chapter])
           <h2>
              <b>курс: </b>{{ $chapter->course->title }}
           </h2>
           <div id="pass" class="pass">
              <div style="margin-left:0; margin-right:0;" class="row">
                 <div class="col-lg-4 pass-menu">
                    <p class="menu-title">
                        {{ $chapter->title }}
                    </p>
                    <nav class="menu">
                       @if (false)
                       <a href="">Видео-урок по теме</a>
                       <a href="">Презентация по теме</a>
                       @endif
                       <!-- <a href="">Видео-урок по теме</a> -->

                       <!--<a href="">Дополнительные материалы по теме</a>-->
                       <a href="{{ url("/test/about/{$chapter->tests[0]['id']}")}}">Тест по теме</a>
                    </nav>
                 </div>
                 <div  class=" col-lg-7 materials-block">
                    <p class="tests-title">
                      Материалы по теме "{{ $chapter->title }}"
                    </p>
                    <div class="materials-list" >
                       <div style="margin-left:0; margin-right:0; flex-direction: column" class="row">
                        @foreach ($chapter->files as $file)
                           @if (pathinfo($file->url, PATHINFO_EXTENSION) === 'pdf')

                        <div class="col-md-4" id="materials-item">
                            <a style="display: none" class="link-pdf" id="materials-item-{{$file->id}}" href="{{$file->url}}">materials-item-{{$file->id}}</a>
                            <a style="display: none" class="link-video" id="materials-item-{{$file->id}}" href="{{$file->url}}">materials-item-{{$file->id}}</a>
                            </div>
                            @endif

                         @endforeach
                        
                        </div>
                       <div id="pass" class="pass" style="position: relative">
  
                        <div class="d-flex justify-content-center" style="position: relative; left: 25%">
                         <a href="{{ url("/test/about/{$chapter->tests[0]['id']}")}}" class="btn btn-primary btn-lg" style="background-color: #3c421a;">Пройти тест</a>
                        </div>
  
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
