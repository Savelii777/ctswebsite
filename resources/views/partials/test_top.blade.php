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
            {{ $chapter->course->chapters->count() }} занятий <br>({{ $chapter->course->completeCount(Auth::user()->id) }} выполнено)
        </p>
        <img src="{{ asset('icons/right-blue.png') }}" alt="courses" class="exp-img">
        <p class="exp-prg">
            {{ $chapter->course->hours }} часов <br>обучения
        </p>
        <div class="courses__expert expert row">
            <div class="expert__txt">
                <div>
                    эксперт
                </div>
                <p>
                    {{ $chapter->course->user->name }}
                </p>
            </div>
            <img
                src="{{ $chapter->course->user->img_url ? $chapter->course->user->img_url : ('/images/default-avatar.jpg') }}"
                alt="person">
        </div>
    </div>
</div>
