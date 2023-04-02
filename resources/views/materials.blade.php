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
              <div style="margin-left:0; margin-right:0" class="row">
                 <div class="col-lg-4 pass-menu">
                    <p class="menu-title">
                        {{ $chapter->title }}
                    </p>
                    <nav class="menu">
                       @if (false)
                       <a href="">Видео-урок по теме</a>
                       <a href="">Презентация по теме</a>
                       @endif
                       <a href="">Дополнительные материалы по теме</a>
                       <a href="{{ url("/test/about/{$chapter->tests[0]['id']}")}}">Тест по теме</a>
                    </nav>
                 </div>
                 <div class="offset-lg-1 col-lg-7 materials-block">
                    <p class="tests-title">
                      Материалы по теме "{{ $chapter->title }}"
                    </p>
                    <div class="materials-list">
                       <div style="margin-left:0; margin-right:0" class="row">
                        @foreach ($chapter->files as $file)
                        <div class="col-md-4">
                            <a class="materials-item">
                              <svg style="fill: #00bfff; height:40px; min-height: 40px;align-self: flex-start;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                   viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                              <g>
                                 <g>
                                    <path d="M64,0v80H0v144h64v160h224l96-96V0H64z M16,208V96h240v112H16z M288,361.376V288h73.376L288,361.376z M368,272h-96v96H80
                                       V224h192V80H80V16h288V272z"/>
                                 </g>
                              </g>
                              <g>
                                 <g>
                                    <path d="M90.848,130.864c-0.64-2.464-1.696-4.656-3.168-6.576c-1.472-1.92-3.392-3.472-5.808-4.656
                                       c-2.416-1.184-5.36-1.776-8.88-1.776H48.8V186.4h13.824v-27.36h7.392c3.264,0,6.24-0.448,8.928-1.264s4.976-2.08,6.864-3.744
                                       c1.888-1.648,3.36-3.792,4.416-6.416c1.056-2.624,1.584-5.696,1.584-9.216C91.808,135.84,91.472,133.312,90.848,130.864z
                                          M75.44,146.384c-1.68,1.664-3.92,2.512-6.672,2.512h-6.144v-20.848h5.76c3.456,0,5.92,0.912,7.392,2.688
                                       c1.472,1.792,2.208,4.416,2.208,7.872C77.984,142.128,77.136,144.72,75.44,146.384z"/>
                                 </g>
                              </g>
                              <g>
                                 <g>
                                    <path d="M153.36,137.44c-0.576-4.112-1.664-7.6-3.312-10.512c-1.632-2.928-3.92-5.152-6.864-6.72
                                       c-2.96-1.568-6.816-2.368-11.632-2.368h-22.656v68.544h21.824c4.608,0,8.416-0.704,11.424-2.112
                                       c3.008-1.408,5.408-3.536,7.2-6.432c1.792-2.88,3.056-6.56,3.792-10.992c0.736-4.448,1.088-9.68,1.088-15.696
                                       C154.224,146.112,153.936,141.536,153.36,137.44z M139.952,163.264c-0.272,3.152-0.848,5.68-1.728,7.6
                                       c-0.864,1.92-2.032,3.296-3.504,4.128c-1.472,0.832-3.424,1.248-5.856,1.248h-6.144v-48.208h5.84c2.624,0,4.72,0.512,6.288,1.504
                                       c1.584,0.976,2.752,2.448,3.568,4.4c0.8,1.952,1.328,4.4,1.584,7.344c0.24,2.96,0.384,6.384,0.384,10.288
                                       C140.384,156.24,140.24,160.144,139.952,163.264z"/>
                                 </g>
                              </g>
                              <g>
                                 <g>
                                    <polygon points="211.232,129.184 211.232,117.856 172.928,117.856 172.928,186.4 186.752,186.4 186.752,156.64 209.792,156.64 
                                       209.792,145.312 186.752,145.312 186.752,129.184 		"/>
                                 </g>
                              </g>
                              </svg>
                               <div class="materials-txt">
                                  <p 
                                    onclick="window.open('{{ $file->url }}')"
                                    style="cursor: pointer">
                                     {{ str_replace(".pdf", "", $file->title) }}
                                  </p>
                                  <div>
                                     0,4 MB
                                  </div>
                               </div>  
                            </a>
                         </div>
                        @endforeach
                        </div>
                    </div>                      
                 </div>
              </div>
           </div>
        </div>
     </section>
    @include('partials.footer')
@endsection
