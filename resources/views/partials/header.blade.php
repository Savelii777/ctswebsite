<header style="background: #c2c1f5; padding-bottom: 10px">
<a style="max-width: 200px" href="{{ url('/') }}">
    <div class="header__logo"></div>
</a>
    @auth

    <ul class="menu-nav" style=" position:absolute; top:10px; left:200px; margin-top:0; display: flex; justify-content: space-between; min-width: 1600px">
        <li><a class="menu-nav-link" style="background:#6b7fe3; width:max-content; color: #fff"  href="{{ url('/') }}">
            <div style="background:#6b7fe3; color:#fff; z-index: 1; font-size: 20px; padding: 10px">На главную</div>
          </a></li>
        <li><a class="menu-nav-link" style="background:#6b7fe3" href="{{ route('login') }}">
            <div style="background:#6b7fe3; color:#fff; z-index: 1; font-size: 20px; padding: 10px">Личный кабинет</div>
          </a></li>

        <li><a class="menu-nav-link" style="background:#6b7fe3" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit(); localStorage.clear();">
               <div style="background:#6b7fe3; color:#fff; z-index: 1; font-size: 20px; padding: 10px">
                   Выход из личного кабинета
               </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>
        <li>
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <a class="menu-nav-link" style="background:#6b7fe3" href="/admin">

                            <div style="background:#6b7fe3; color:#fff; z-index: 1; font-size: 20px; padding: 10px">Панель администратора</div>

                    </a>
                @endif
            @endauth
        </li>

    </ul>

    @endauth

    @if(Request::is('/')) <!-- Проверка, что текущая страница - главная -->
    <div class="menu">
  <div class="menu-inner">
    <div class="gallery" style="margin-top:0px; margin-bottom: 50px">
      <div class="images">
        <a class="image-link" href="{{ route('page1') }}">
          <div class="image"  data-label="Бумага/плёнки/наклейки"><img src="https://rhs.com.ru/files/product-image/ofisnaya_bumaga_svetocopy_a3-25329.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page2') }}">
          <div class="image" data-label="Девелопер"><img src="https://cdn.tze1.ru/a6/63c6ecbd-0b89-11e9-a4ef-e8611f100fce/600K88840.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page3') }}">
          <div class="image" data-label="ЗИП - аксессуары (смазки, салфетки, фильтры, шнуры  и др.)"><img src="https://im01.itaiwantrade.com/93946157-33a3-40cd-bf19-b2422b1883ce/Printer_Parts_01.png" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page4') }}">
          <div class="image" data-label="ЗИП - аппаратные (ролики, шестерни, втулки, лампы, шлейфы и др.)"><img src="https://im01.itaiwantrade.com/93946157-33a3-40cd-bf19-b2422b1883ce/Printer_Parts_01.png" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page5') }}">
          <div class="image" data-label="ЗИП - комплектующие корпусные к лаз. Картриджам"><img src="https://printmall.ru/upload/resize_cache/iblock/fea/800_600_1/fea8a6f22d0d190a5f473bd84bf8125d.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page6') }}">
          <div class="image" data-label="ЗИП - лезвия, ракеля"><img src="https://alkorta.ru/sites/default/files/catalog_data/2134/2134_9569.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page7') }}">
          <div class="image" data-label="ЗИП - валы магнитные, валы заряда"><img src="https://alkorta.ru/sites/default/files/catalog_data/2585/2585_9553.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page8') }}">
          <div class="image" data-label="ЗИП - термоблока (валы тефлоновые, резиновые, термопленки, бушинги и др.)"><img src="https://printmall.ru/upload/resize_cache/iblock/7a5/800_600_1/7a544ba509a8e89667941f45c6613a9b.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page9') }}">
          <div class="image" data-label="ЗИП - чипы"><img src="https://www.atlantcom.ru/upload/iblock/4ad/ouib1s1ot9loprd0lrx9dwerq7997nqk.webp" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page10') }}">
          <div class="image" data-label="Картриджи к лазерным принтерам"><img src="https://images.satom.ru/i3/firms/28/334/334281/zapravka-lazernyh-kartridzhey-hp-v-simferopole_53f36c66c4b87ce_800x600.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page11') }}">
          <div class="image" data-label="Картриджи к матричным принтерам, лента красящая"><img src="https://images.satom.ru/i3/firms/28/334/334281/zapravka-lazernyh-kartridzhey-hp-v-simferopole_53f36c66c4b87ce_800x600.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page12') }}">
          <div class="image" data-label="Картриджи к струйным принтерам"><img src="https://images.satom.ru/i3/firms/28/334/334281/zapravka-lazernyh-kartridzhey-hp-v-simferopole_53f36c66c4b87ce_800x600.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page13') }}">
          <div class="image" data-label="Тонер"><img src="https://paper66.ru/image/product_foto/image/products_images_2/goods/361159/537ee9a0acdb2_xl.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page14') }}">
          <div class="image" data-label="Тонер к цветным принтерам/копирам"><img src="https://sc04.alicdn.com/kf/H2cd023933503485a891c34290b4e10cc6.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page15') }}">
          <div class="image" data-label="Фотобарабаны"><img src="https://siyzran.sidex.ru/images_offers/1723/1723891/imgfotobaraban_hp_laserjet_m106_m104_m203_mitsubishi_opchpm104mit_2.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page16') }}">
          <div class="image" data-label="Чернила для струйных принтеров"><img src="https://cdn1.ozone.ru/s3/multimedia-0/6051924276.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page17') }}">
          <div class="image" data-label="Чернила для лазерных принтеров"><img src="https://cdn1.ozone.ru/s3/multimedia-0/6051924276.jpg" alt=""></div>
        </a>
        <a class="image-link" href="{{ route('page18') }}">
          <div class="image" data-label="Чернила для матричных принтеров"><img src="https://cdn1.ozone.ru/s3/multimedia-0/6051924276.jpg" alt=""></div>
        </a>

      </div>
    </div>
  </div>
</div>
    @endif

</header>
