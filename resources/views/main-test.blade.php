<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    </head>
    <body class="antialiased">
      <!-- HEADER -->
      <header>
         <div class="container">
            <div class="row">
               <div class="logotip col-md-5 col-sm-7 col-7">
{{--                  <img src="{{ ('images/logo-white.png') }}" alt="logo">--}}
{{--                  <p>Система дистанционного обучения доктора Реутова</p>--}}
               </div>
                <a style="max-height: 50px;" href="{{ url('/') }}"
                   class="btn-active text-center col-sm-6 col-md-5">
                    <p>
                        На главную
                    </p>
                </a>
               <a href="/entrance" class="btn-active btn-exit text-center col-lg-3 col-3">
                  <p>
                     Выход <span>из личного кабинета</span>
                  </p>
                  <svg display="none">
                     <symbol viewBox="0 0 512 512" id="entrance">
                        <g>
                           <path d="M228.487,319.228c-7.811,7.811-7.811,20.474,0,28.284c7.81,7.81,20.474,7.811,28.285,0l77.37-77.37
                              c7.789-7.789,7.774-20.51,0-28.284l-77.37-77.37c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.474,0,28.284
                              L271.716,236H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h251.716L228.487,319.228z"/>
                           <path d="M433.543,7.75C429.754,2.861,423.918,0,417.733,0H170c-11.046,0-20,8.954-20,20s8.954,20,20,20h237.719
                              C451.396,100.536,472,179.45,472,256c0,76.515-20.589,155.443-64.281,216H170c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20
                              h247.733c6.185,0,12.022-2.861,15.81-7.75C486.683,435.671,512,344.876,512,256C512,167.134,486.686,76.333,433.543,7.75z"/>
                        </g>
                     </symbol>
                  </svg>
                  <svg class="entrance">
                     <use xlink:href="#entrance"></use>
                  </svg>
               </a>
            </div>
         </div>
      </header>
      <!-- HEADER -->
      <section id="structure" class="account">
         <div class="container">
            <div class="row account-block">
                <div class="account-block__row">
                    <button class="btn-active account__btn">
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
                  <img src="{{ ('images/right-blue.png') }}" alt="courses" class="exp-img">
                  <p class="exp-prg">
                     14 занятий <br>(4 выполнено)
                  </p>
                  <img src="{{ ('images/right-blue.png') }}" alt="courses" class="exp-img">
                  <p class="exp-prg">
                     40 часов <br>обучения
                  </p>
                  <div class="courses__expert expert row">
                     <div class="expert__txt">
                        <div>
                           Администратор
                        </div>

                     </div>
                     <img src="{{ ('images/expert.png') }}" alt="courses">
                  </div>
               </div>
            </div>
            <h2>
               <b>курс: </b>Патологии рефлексов. паралогические рефлексы
            </h2>
            <div id="pass" class="pass">
               <div class="row" id="app">
                  <div class="col-lg-4 pass-menu">
                     <p class="menu-title">
                        Вводное занятие по курсу  <br>«Опухоль гортани»
                     </p>
                     <nav class="menu">
                        @if (false)
                       <a href="">Видео-урок по теме</a>
                       <a href="">Презентация по теме</a>
                       @endif
                        <a href="#">Дополнительные материалы по теме</a>
                        <a href="#">Тест по теме</a>
                     </nav>
                  </div>



                     <!-- <div id="test">

                        <div class="test-block">
                           <div class="test-number number">
                              01 <b>/ 94</b>
                           </div>
                           <div class="test-main test-nervous-system">
                              <p class="test-caption">
                                 Схема строения нервной системы
                                 <span>
                                    Напишите рядом с каждой стрелкой соответствующие названия.
                                 </span>
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test1.png') }}" alt="courses">
                                 </div>
                                 <ul class="compliance-list">
                                    <li>
                                       <p class="test-txt">А)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Б)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">В)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Г)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Д)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Е)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Ж)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">З)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">И)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">К)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Л)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">М)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Н)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              02 <b>/ 94</b>
                           </div>
                           <div class="test-main test-segment-of-the-spinal-cord">
                              <p class="test-caption">
                                 Пронумеруйте элементы сегмента спинного мозга
                              </p>
                              <div id="test-explanation">
                                 <ul class="explanation-list row">
                                    <div>
                                       <li>
                                          <p class="explanation-txt">
                                             Задний рог
                                          </p>
                                          <p class="explanation-txt">
                                             1
                                          </p>
                                       </li>
                                       <li>
                                          <p class="explanation-txt">
                                             Передний столб
                                          </p>
                                          <p class="explanation-txt">
                                             2
                                          </p>
                                       </li>
                                       <li>
                                          <p class="explanation-txt">
                                             Центральный канал
                                          </p>
                                          <p class="explanation-txt">
                                             3
                                          </p>
                                       </li>
                                       <li>
                                          <p class="explanation-txt">
                                             Задний корешок
                                          </p>
                                          <p class="explanation-txt">
                                             4
                                          </p>
                                       </li>
                                       <li>
                                          <p class="explanation-txt">
                                             Передний рог
                                          </p>
                                          <p class="explanation-txt">
                                             5
                                          </p>
                                       </li>
                                    </div>
                                    <div>
                                       <li>
                                          <p class="explanation-txt">
                                             Боковой столб
                                          </p>
                                          <p class="explanation-txt">
                                             6
                                          </p>
                                       </li>
                                       <li>
                                          <p class="explanation-txt">
                                             Спинальный ганглий
                                          </p>
                                          <p class="explanation-txt">
                                             7
                                          </p>
                                       </li>
                                       <li>
                                          <p class="explanation-txt">
                                             Передний корешок
                                          </p>
                                          <p class="explanation-txt">
                                             8
                                          </p>
                                       </li>
                                       <li>
                                          <p class="explanation-txt">
                                             Задние столбы
                                          </p>
                                          <p class="explanation-txt">
                                             9
                                          </p>
                                       </li>
                                    </div>
                                 </ul>
                              </div>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test2.png') }}" alt="courses">
                                 </div>
                                 <ul class="compliance-list">
                                   <li>
                                      <p class="test-txt">А)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">Б)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">В)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">Г)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">Д)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">Е)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">Ж)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">З)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                   <li>
                                      <p class="test-txt">И)</p>
                                      <input type="text" class="test-input compliance-input">
                                   </li>
                                 </ul>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              03 <b>/ 94</b>
                           </div>
                           <div class="test-main test-arcs-of-reflexes-closure">
                              <p class="test-caption">
                                 Укажите, где замыкаются дуги рефлексов
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test12.png') }}" alt="courses">
                                 </div>
                                 <ul class="compliance-list">
                                    <li>
                                       <p class="test-txt">А)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Б)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">В)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Г)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Д)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Е)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">Ж)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">З)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                    <li>
                                       <p class="test-txt">И)</p>
                                       <input type="text" class="test-input compliance-input">
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              04 <b>/ 94</b>
                           </div>
                           <div class="test-main test-peripheral-nerves-as-part-of-reflex-arcs">
                              <p class="test-caption">
                                 Периферические нервы в составе рефлекторных дуг
                                 <span>
                                    Укажите какие нервы соответсвуют рефлексам
                                 </span>
                              </p>
                              <ul class="test-compliance">
                                 <li>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <p class="test-txt "><span>А) </span> Корнеальный (как и супраорбитальный)</p>
                                       </div>
                                       <div class="col-md-8">
                                          <input type="text" class="test-input compliance-input">
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <p class="test-txt"><span>Б) </span> Бицепс-рефлекс</p>
                                       </div>
                                       <div class="col-md-8">
                                          <input type="text" class="test-input compliance-input">
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <p class="test-txt"><span>В) </span> Трицепс-рефлекс</p>
                                       </div>
                                       <div class="col-md-8">
                                          <input type="text" class="test-input compliance-input">
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <p class="test-txt"><span>Г) </span> Брюшные</p>
                                       </div>
                                       <div class="col-md-8">
                                          <input type="text" class="test-input compliance-input">
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <p class="test-txt"><span>Д) </span> Коленный</p>
                                       </div>
                                       <div class="col-md-8">
                                          <input type="text" class="test-input compliance-input">
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <p class="test-txt"><span>Е) </span> Ахиллов</p>
                                       </div>
                                       <div class="col-md-8">
                                          <input type="text" class="test-input compliance-input">
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <p class="test-txt"><span>Ж) </span> Подошвенный</p>
                                       </div>
                                       <div class="col-md-8">
                                          <input type="text" class="test-input compliance-input">
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              05 <b>/ 94</b>
                           </div>
                           <div class="test-main  test-exercise-in-topical-diagnostics-preparatory">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test13.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          полное поперечное поражение спинного мозга <br>в области шейного утолщения
                                          <br><span>Укажите, какие сухожильные рефлексы исчезнут.</span>
                                       </p>
                                    </div>
                                    <div class="compliance-block">
                                       <div class="compliance-elem-add">
                                          <div>
                                             <p class="test-txt">A)</p>
                                             <input type="text" class="test-input compliance-input">
                                             <button class="compliance-btn-remove">x</button>
                                          </div>
                                          <button class="compliance-btn-add">Добавить</button>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>


                        <div class="test-block">
                           <div class="test-number number">
                              06 <b>/ 94</b>
                           </div>
                           <div class="test-main  test-exercise-in-topical-diagnostics-preparatory">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test14.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          полное поперечное поражение спинного <br>мозга в области поясничного утолщения.
                                          <br><span>Укажите, какие сухожильные рефлексы исчезнут.</span>
                                       </p>
                                    </div>
                                    <div class="compliance-elem-add">
                                       <div>
                                          <p class="test-txt">A)</p>
                                          <input type="text" class="test-input compliance-input">
                                          <button class="compliance-btn-remove">x</button>
                                       </div>
                                       <button class="compliance-btn-add">Добавить</button>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              07 <b>/ 94</b>
                           </div>
                           <div class="test-main  test-exercise-in-topical-diagnostics-preparatory">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test15.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          полное поражение конского хвоста (cauda equina).
                                          <br><span>Укажите, какие рефлексы исчезнут.</span>
                                       </p>
                                    </div>
                                    <div class="compliance-elem-add">
                                       <div>
                                          <p class="test-txt">A)</p>
                                          <input type="text" class="test-input compliance-input">
                                          <button class="compliance-btn-remove">x</button>
                                       </div>
                                       <button class="compliance-btn-add">Добавить</button>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              08 <b>/ 94</b>
                           </div>
                           <div class="test-main  test-exercise-in-topical-diagnostics-preparatory">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test16.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          поражение конуса спинного мозга (conus medullaris).
                                          <br><span>Укажите, какие рефлексы исчезнут.</span>
                                       </p>
                                    </div>
                                    <div class="compliance-elem-add">
                                       <div>
                                          <p class="test-txt">A)</p>
                                          <input type="text" class="test-input compliance-input">
                                          <button class="compliance-btn-remove">x</button>
                                       </div>
                                       <button class="compliance-btn-add">Добавить</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              09 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test17.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного – полное поперечное поражение спинного мозга на уровне С2.
                                          <br><span>Укажите что с рефлексами:</span>
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  На руках
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  На ногах
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              10 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test18.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного – полное поперечное поражение спинного мозга на уровне Th3.
                                          <br><span>Укажите что с рефлексами:</span>
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  На руках
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  На ногах
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              11 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test19.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного – полное поперечное поражение шейного утолщения спинного мозга (С5-С8).
                                          <br><span>Укажите что с рефлексами:</span>
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  На руках
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  На ногах
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              12 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test4.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного – полное поперечное поражение спинного мозга на уровне С5-С6.
                                          <br><span>Укажите что с рефлексами:</span>
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  На руках (бицепс-рефлекс)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  На руках (трицепс-рефлекс)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       В)  На ногах (коленные, ахилловы)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Г)  На ногах (коленные, ахилловы)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              13 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test20.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного – полное поперечное поражение спинного мозга на уровне С7-С8.
                                          <br><span>Укажите что с рефлексами:</span>
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  На руках (бицепс-рефлекс)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  На руках (трицепс-рефлекс)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       В)  На ногах (коленные, ахилловы)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Г)  На ногах (коленные, ахилловы)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              14 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test21.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного – полное поперечное поражение шейного утолщения спинного мозга (С5-С8).
                                          <br><span>Укажите что с рефлексами:</span>
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  На руках
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  На ногах
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       В)  А что с брюшными рефлексами?
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              15 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test22.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного – полное поперечное поражение спинного мозга на уровне Th9-Th10
                                          <br><span>Укажите что с рефлексами:</span>
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  На руках
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  С верхними брюшными
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       В)  Со средними брюшными
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Г)  С нижними брюшными
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Д)  С коленными и ахилловыми
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. В норме
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Повышены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Понижены
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             4. Отсуствуют
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              16 <b>/ 94</b>
                           </div>
                           <div class="test-main  test-exercise-in-topical-diagnostics-preparatory">
                              <p class="test-caption">
                                 Кортико-мускулярный путь
                                 <span>
                                    Впишите в схему двухнейронный кортико-мускулярный путь.
                                 </span>
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test6.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-prg">
                                          Расставьте цифры на картинке в нужном порядке и подпишите соответвующие названия.
                                       </p>
                                       <p class="explanation-txt">
                                          Зажмите левую кнопку мыши на нужной цифре и перетаскивайте на картинку.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Центральный мотонейрон – пирамидный путь (перекрещенный пучок)
                                    </p>
                                    <div class="compliance-elem-add">
                                       <div>
                                          <p class="test-txt">1.</p>
                                          <input type="text" class="test-input compliance-input">
                                          <button class="compliance-btn-remove">x</button>
                                       </div>
                                       <button class="compliance-btn-add">Добавить</button>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Периферический мотонейрон
                                    </p>
                                    <div class="compliance-elem-add">
                                       <div>
                                          <p class="test-txt">20.</p>
                                          <input type="text" class="test-input compliance-input">
                                          <button class="compliance-btn-remove">x</button>
                                       </div>
                                       <button class="compliance-btn-add">Добавить</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              17 <b>/ 94</b>
                           </div>
                           <div class="test-main test-signs-of-paralysis-paresis">
                              <p class="test-caption">
                                 Признаки параличей (парезов)
                                 <span>
                                    Выберите соответсвующие пункты
                                 </span>
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-block">
                                    <p class="compliance-txt">
                                       А)  Периферического <br>паралича (пареза)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>1.</span> Отсутствие активных движений (или ограничение объема активных движений)
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>2.</span> Снижение мышечной силы
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>3.</span> Арефлексия (гипорефлексия)
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>4.</span> Гиперрефлексия
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                            <span>5.</span> Патологические рефлексы
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>6. </span> Локальная атрофия мышц
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>7. </span> Диффузная атрофия мышц
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>8.</span> Атония мышц (гипотония)
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>9.</span> Гипертонус мышц
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="compliance-block">
                                    <p class="compliance-txt">
                                       Б)  Центрального<br> паралича (пареза)
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>1.</span> Отсутствие активных движений (или ограничение объема активных движений)
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>2.</span> Снижение мышечной силы
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>3.</span> Арефлексия (гипорефлексия)
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>4.</span> Гиперрефлексия
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>5.</span> Патологические рефлексы
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>6.</span> Локальная атрофия мышц
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>7.</span> Диффузная атрофия мышц
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>8.</span> Атония мышц (гипотония)
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             <span>9.</span> Гипертонус мышц
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              18 <b>/ 94</b>
                           </div>
                           <div class="test-main test-prevalence-of-paralysis">
                              <p class="test-caption">
                                 Параличи в зависимости от их распространенности
                                 <span>
                                    Подпишите наименования параличей в зависимости от их распространенности.
                                 </span>
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-block">
                                    <div class="row">
                                       <div class="compliance-elem">
                                          <div class="compliance-img">
                                             <img src="{{ ('test-img/test7-a.png') }}" alt="courses">
                                          </div>
                                          <div class="compliance-input">
                                             <p class="test-txt">А)</p>
                                             <input type="text" class="test-input compliance-input">
                                          </div>
                                       </div>
                                       <div class="compliance-elem">
                                          <div class="compliance-img">
                                             <img src="{{ ('test-img/test7-b.png') }}" alt="courses">
                                          </div>
                                          <div class="compliance-input">
                                             <p class="test-txt">Б)</p>
                                             <input type="text" class="test-input compliance-input">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="compliance-elem">
                                          <div class="compliance-img">
                                             <img src="{{ ('test-img/test7-c.png') }}" alt="courses">
                                          </div>
                                          <div class="compliance-input">
                                             <p class="test-txt">В)</p>
                                             <input type="text" class="test-input compliance-input">
                                          </div>
                                       </div>
                                       <div class="compliance-elem">
                                          <div class="compliance-img">
                                             <img src="{{ ('test-img/test7-d.png') }}" alt="courses">
                                          </div>
                                          <div class="compliance-input">
                                             <p class="test-txt">Г)</p>
                                             <input type="text" class="test-input compliance-input">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              19 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Иннервация наружного (поперечно-полосатого) сфинктера мочевого пузыря и прямой кишки
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test23.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного поражена правая половина<br> спинного мозга на уровне Th3.
                                          <br><span>Укажите будет ли нарушено мочеиспускание (дефекация).</span>
                                       </p>
                                    </div>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             А) Да
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             Б) Нет
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              20 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test8.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          в левом полушарии головного мозга имеется патологический очаг. Поражен пирамидный путь.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, у кого из больных эта патология.
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Сформулируйте синдром с указанием характера паралича и его распространенности.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       В)  Укажите ваше мнение относительно нарушений функций мочеиспускания и дефекации у этого больного.
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. Да
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Нет
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Частично
                                          </label>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              21 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test9.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          патологический процесс локализован в нижних отделах передней центральной извилины.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, у кого из больных эта патология.
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Назовите синдром
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       В)  Нарушена ли функция тазовых органов?
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. Да
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Нет
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Частично
                                          </label>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              22 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test24.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного имеется полное поперечное поражение спинного мозга на уровне С2.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, у кого из больных эта патология произвольных движений.
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   10.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Сформулируйте синдром нарушений произвольных движений.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       В)  Укажите характер нарушения функций тазовых органов.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              23 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test25.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного имеется полное поперечное поражение спинного мозга на уровне Th3.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, у кого из больных эта патология произвольных движений.
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   10.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Сформулируйте синдром параличей конечностей и нарушения функций тазовых органов.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              24 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test26.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          у больного на уровне Th3 имеется поражение правой половины спинного мозга.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, у кого из больных такая патология.
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   10.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Сформулируйте синдром нарушения произвольных движений.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       В)  Нарушена ли функция тазовых органов?
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. Да
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Нет
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Частично
                                          </label>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              25 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test27.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          поражен конус спинного мозга
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  У кого из больных такая патология произвольных движений и тазовых функций.
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   10.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Советую внимательно рассмотреть схему: целы ли рефлекторные дуги и их связь с корой?
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. Да
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Нет
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Частично
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       В)  Какой вывод следует сделать?
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              26 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test28.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          поражен конский хвост (cauda equina) L2-S5.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, у кого из больных такая патология.
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Характер паралича ног. (В том, что в ногах разовьется паралич, вы, конечно, не сомневаетесь?)
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       В)  В каком состоянии функция тазовых органов.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              27 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test29.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          разрушено поясничное утолщение спинного мозга L2-S2 Это сложная задача.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, в каком состоянии рефлекторная деятельность на ногах.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       Б)  Сформулируйте синдром нарушения произвольных движений для нижних конечностей.
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       В)  Какая фигура человека иллюстрирует эту патологию?
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   10.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              28 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test30.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          поражение шейногоутолщения (С5-С8). Это также сложная задача.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите, будут ли нарушены произвольные движения рук, ног.
                                    </p>
                                    <div class="radio test-radio">
                                       <div>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             1. Да
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             2. Нет
                                          </label>
                                          <input id="radio-1" type="radio" name="radio">
                                          <label for="radio-1">
                                             3. Частично
                                          </label>
                                       </div>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  А что происходит с тазовыми органами?
                                    </p>
                                    <input type="text" class="test-input compliance-input">
                                    <p class="compliance-txt">
                                       В)  Сформулируйте синдромы параличей.
                                    </p>
                                    <div class="compliance-elem-add">
                                       <div>
                                          <p class="test-txt">20.</p>
                                          <input type="text" class="test-input compliance-input">
                                          <button class="compliance-btn-remove">x</button>
                                       </div>
                                       <button class="compliance-btn-add">Добавить</button>
                                    </div>
                                    <p class="compliance-txt">
                                       Г)  Какая фигура человека иллюстрирует эту патологию?
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   10.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              29 <b>/ 94</b>
                           </div>
                           <div class="test-main test-exercise-in-topical-diagnostics">
                              <p class="test-caption">
                                 Упражнение в топической диагностике
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test31.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <div class="test-explanation">
                                       <p class="explanation-txt">
                                          <b>ДАНО</b><br>
                                          полное поперечное поражение спинного мозга на уровне С5-С6.
                                       </p>
                                    </div>
                                    <p class="compliance-txt">
                                       А)  Определите: сначала патологию рефлексов, а затем на этой основе сформулируйте синдромы параличей верхних конечностей, нижних конечностей, тазовых органов.
                                    </p>
                                    <div class="compliance-elem-add">
                                       <div>
                                          <p class="test-txt">20.</p>
                                          <input type="text" class="test-input compliance-input">
                                          <button class="compliance-btn-remove">x</button>
                                       </div>
                                       <button class="compliance-btn-add">Добавить</button>
                                    </div>
                                    <p class="compliance-txt">
                                       Б)  Какая фигура человека иллюстрирует эту патологию?
                                    </p>
                                    <div class="test-description">
                                       <div>
                                          <img src="{{ ('test-img/icon1.png') }}" alt="courses">
                                          <p>центральный паралич</p>
                                       </div>
                                       <div>
                                          <img src="{{ ('test-img/icon2.png') }}" alt="courses">
                                          <p>периферический паралич</p>
                                       </div>
                                    </div>
                                    <div class="radio test-radio test-radio-img">
                                       <ul>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   1.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   2.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   3.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   4.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   5.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   6.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   7.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   8.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   9.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                          <div class="row">
                                             <li class="col-md-4">
                                                <input id="radio-1" type="radio" name="radio">
                                                <label for="radio-1">
                                                   10.
                                                </label>
                                                <img src="{{ ('test-img/test8-1.png') }}" alt="courses">
                                             </li>
                                          </div>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                         30

                        <div class="test-block">
                           <div class="test-number number">
                              31 <b>/ 94</b>
                           </div>
                           <div class="test-main test-indicated-by-arrows">
                              <p class="test-caption">
                                 Назвать дерматомы, указанные стрелками.
                                 <span>
                                    Образец: 1. С1-С4. 2. и т. п.
                                 </span>
                                 <span>
                                    Эту работу Вы легко выполните, не подглядывая в ответ, если внимательно рассмотрите рисунок и увидите связь дерматомов с сегментами спинного мозга.
                                 </span>
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test32.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <ul class="compliance-list">
                                       <li>
                                          <p class="test-txt "><span>1. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>2. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>3. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>4. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>5. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>6. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>7. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>8. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>9. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="test-block">
                           <div class="test-number number">
                              32 <b>/ 94</b>
                           </div>
                           <div class="test-main test-indicated-by-arrows">
                              <p class="test-caption">
                                 Проекция корешковых болей (по Ферстеру)
                                 <span>
                                    Рассмотрите внимательно проекцию болей, возникающих при раздражении корешков, сравнивая указатели на рисунке и пояснения к нему
                                 </span>
                              </p>
                              <div class="test-compliance test-compliance-first">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test33.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <ul class="compliance-list-txt">
                                       <li>
                                          <p>С2 <span>– в затылок</span></p>
                                       </li>
                                       <li>
                                          <p>С3 <span>– в ухо, шею</span></p>
                                       </li>
                                       <li>
                                          <p>С4 <span>– в плечо</span></p>
                                       </li>
                                       <li>
                                          <p>С5 <span>– в наружную поверхность руки и большой палец</span></p>
                                       </li>
                                       <li>
                                          <p>С6 <span>– в большой и указательный пальцы</span></p>
                                       </li>
                                       <li>
                                          <p>С7 <span>– во все пальцы</span></p>
                                       </li>
                                       <li>
                                          <p>С8 <span>– в 4 и 5 пальцы</span></p>
                                       </li>
                                       <li>
                                          <p>Th1 <span>– во внутреннюю поверхность предплечья</span></p>
                                       </li>
                                       <li>
                                          <p>Th2 <span>– во внутреннюю поверхность плеча</span></p>
                                       </li>
                                       <li>
                                          <p>Th5 <span>– в соски</span></p>
                                       </li>
                                       <li>
                                          <p>Th10 <span>– в область пупка</span></p>
                                       </li>
                                       <li>
                                          <p>L1 <span>– в область trochanter major</span></p>
                                       </li>
                                       <li>
                                          <p>L2 <span>– в переднюю поверхность бедра</span></p>
                                       </li>
                                       <li>
                                          <p>L3 <span>– в колено</span></p>
                                       </li>
                                       <li>
                                          <p>L4 <span>– во внутренний мыщелок и большой палец</span></p>
                                       </li>
                                       <li>
                                          <p>L5 <span>– в тыл стопы и все пальцы</span></p>
                                       </li>
                                       <li>
                                          <p>S1 <span>– в подошву и пятку</span></p>
                                       </li>
                                       <li>
                                          <p>S2 <span>– в заднюю поверхность ноги</span></p>
                                       </li>
                                       <li>
                                          <p>S3 <span>– в ягодицы</span></p>
                                       </li>
                                       <li>
                                          <p>S4-S5 <span>– в анус и промежность</span></p>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="test-compliance test-compliance-last">
                                 <div class="compliance-img">
                                    <img src="{{ ('test-img/test34.png') }}" alt="courses">
                                 </div>
                                 <div class="compliance-block">
                                    <p class="compliance-txt">
                                       А)  Назовите корешок, раздражение которого вызывает боли, проецирующиеся в указанную на схеме область №:
                                    </p>
                                    <ul class="compliance-list">
                                       <li>
                                          <p class="test-txt "><span>1. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>2. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>3. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>4. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>5. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>6. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>7. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                       <li>
                                          <p class="test-txt "><span>8. </span></p>
                                          <input type="text" class="test-input compliance-input">
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="test-block">
                           <div class="test-number number">
                              71 <b>/ 94</b>
                           </div>
                           <div class="test-main test-enter-two-neuron-paths-in-the-diagrams">
                              <p class="test-caption">
                                 Лицевой, добавочный и подъязычный черепные нервы
                              </p>
                              <div class="test-compliance">
                                 <div class="compliance-block">
                                    <div class="row">
                                       <div class="compliance-elem">
                                          <p class="compliance-txt">
                                             А)  Вписать в схемы двухнейронные пути XI, XII и VII пар
                                             <span>
                                                Выберите то что нужно и наведите на рисунок, закрасьте все соответвующие элементы.
                                             </span>
                                          </p>
                                          <ul class="compliance-block-btn">
                                             <div class="row">
                                                <div>
                                                   <li>
                                                      <button>
                                                         <img src="{{ ('test-img/icon11.png') }}" alt="courses">
                                                      </button>
                                                   </li>
                                                </div>
                                                <div>
                                                   <li>
                                                      <button>
                                                         <img src="{{ ('test-img/icon5.png') }}" alt="courses">
                                                         <p>n. ulnaris</p>
                                                      </button>
                                                   </li>
                                                </div>
                                                <div>
                                                   <li>
                                                      <button>
                                                         <img src="{{ ('test-img/icon7.png') }}" alt="courses">
                                                         <p>n. medianus</p>
                                                      </button>
                                                   </li>
                                                </div>
                                                <div>
                                                   <li>
                                                      <button>
                                                         <img src="{{ ('test-img/icon11.png') }}" alt="courses">
                                                         <p>n. radialis</p>
                                                      </button>
                                                   </li>
                                                </div>
                                                <div>
                                                   <li>
                                                      <button>
                                                         <img src="{{ ('test-img/icon5.png') }}" alt="courses">
                                                         <p>n. ulnaris</p>
                                                      </button>
                                                   </li>
                                                </div>
                                             </div>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>



                     </div> -->


               </div>
            </div>
         </div>
      </section>
      <!-- FOOTER -->
      <footer>
         <div class="container">
            <div class="row footer__logo">
               <div class="logotip col-6">
{{--                  <img src="{{ ('images/logo-white.png') }}" alt="logo">--}}
{{--                  <p>Система дистанционного мобучения доктора Реутова</p>--}}
               </div>
               <div class="col-6">
                  <a class="footer__link footer__link-active">
{{--                     info@reutov.ru--}}
                      example@gmail.com

                  </a>
               </div>
            </div>
            <div class="row">
               <a href="#" class="footer__links">
                  Политика конфидициальности
               </a>
               <a href="#" class="footer__links">
                  Правила пользования сайтом
               </a>
               <p class="footer__prg">
                  Все права защищены © 2021
               </p>
               <a class="footer__link">
{{--                  info@reutov.ru--}}
                   example@gmail.com

               </a>
            </div>
         </div>
      </footer>
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
      <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>
