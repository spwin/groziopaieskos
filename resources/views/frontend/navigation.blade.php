<header>
    <div class="header-container">
        <a href="/"><img class="logo" src="{{ URL::to('/') }}/img/logo.png" alt="logo"></a>

        <ul class="menu-list">
            <li id="miestai">Miestai</li>
            <li id="paslaugos">Paslaugos</li>
            <li id="apiemus"><a href="{{ action('FrontendController@aboutus') }}">Apie mus</a></li>
            <li id="kontaktai"><a href="{{ action('FrontendController@kontaktai') }}">Kontaktai</a></li>
        </ul>

        <div class="header-contacts-button">
            <p>+370 6 7420316</p>
            <p>info@groziokeliai.lt</p>
            <a href="{{ action('FrontendController@company') }}">
                <div class="header-button">Registruotis</div>
            </a>
        </div>

    </div>
</header>

<!-- PASLAUGU MENU -->
<div id="b" class="hover-menu paslaugos-menu">
    <div class="hover-container">
        @foreach(Helper::categories() as $category)
            <div class="hover-button">
                <div class="hover-button-header">
                    {{ $category->name_plural }}
                </div>
                <div class="hover-button-image">
                    <img class="salonas-icon" src="{{ URL::to('/') }}/uploads/{{ $category->image }}" alt="grozio salonai icon">
                </div>
                <div class="hover-button-text">
                    <p>{{ $category->getOrganizations()->where(['type' => 'imone', 'approved' => 1])->count() }} įmonės</p>
                    <p>{{ $category->getOrganizations()->where(['type' => 'asmuo', 'approved' => 1])->count() }} fiziniai asmenys</p>
                </div>
                <ul class="city-list">
                    <li>MIESTAS</li>
                    <a href="/imones/vilnius/vilnius-miestas/{{ $category->slug }}"><li>Vilnius</li></a>
                    <a href="/imones/vilnius/kaunas-miestas/{{ $category->slug }}"><li>Kaunas</li></a>
                    <a href="/imones/vilnius/klaipeda-miestas/{{ $category->slug }}"><li>Klaipėda</li></a>
                    <a href="/imones/vilnius/siauliai-miestas/{{ $category->slug }}"><li>Šiauliai</li></a>
                    <a href="/imones/vilnius/panevezys-miestas/{{ $category->slug }}"><li>Panevežys</li></a>
                </ul>
            </div>
        @endforeach
    </div>
</div>


<!-- MIESTU MENU -->

<div id="c" class="hover-menu miestai-menu">
    <div class="hover-container">
        @foreach(Helper::regions() as $region)
            <div class="hover-button">
                <a href="{{ action('FrontendController@region', ['region' => $region->slug]) }}">
                <div class="hover-button-header">
                    {{ $region->name }}
                </div>
                <div class="hover-button-image">
                    <img src="{{ URL::to('/') }}/img/header-icons/miestai/{{ $region->slug }}.png" alt="{{ $region->slug }} icon">
                </div>
                <div class="hover-button-text">
                    <p>{{ $region->getCities()->join('organizations', 'cities.id', '=', 'organizations.city_id')->where(['organizations.type' => 'imone', 'organizations.approved' => 1])->count() }} įmonės</p>
                    <p>{{ $region->getCities()->join('organizations', 'cities.id', '=', 'organizations.city_id')->where(['organizations.type' => 'asmuo', 'organizations.approved' => 1])->count() }} fiziniai asmenys</p>
                </div>
                </a>
                <ul class="city-list">
                    <li>MIESTELIAI</li>
                    <li class="miesteliu-trigger" data-name="{{ $region->id }}">Ieškoti pagal<br> miestelį</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>

<!-- APIE MUS MENU -->
<div id="e" class="hover-menu apie-mus-menu">
    <div class="hover-container">
        <div class="apie-mus-menu-container">
            <h3>APIE MUS</h3>
            <p>"Grožio paieškos" - tai naujas projektas Lietuvoje, sukurtas 2016 metais. Šiuo projektu
                siekiame palengvinti Jusu su grožio proceduromis susijusias paieškas.
                Musu tikslas - taupyti Jusu laika ir suteikti greita ir patogia Jus dominancia informacija.
                Puslapyje rasite: grožio salonu, sporto klubu, spa centru, tatuiruociu salonu, kosmetologijos bei odontologijos
                kabinetu informacija bei teikiamas paslaugas. </p>
            <a href="{{ action('FrontendController@aboutus') }}">
                <p class="skaityti-daugiau">Skaityti daugiau</p>
            </a>
        </div>
    </div>
</div>
<!-- KONTAKTAI MENU -->

<div id="d" class="hover-menu kontaktai-menu">
    <div class="hover-container">
        <div class="hover-button">
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/kontaktai/adresas.png" alt="adresas">
            </div>
            <div class="hover-button-text">
                <p class="kontaktai-button-header">ADRESAS</p>
                <p>{{ Helper::getContent('adresas') }}</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/kontaktai/elpastas.png" alt="adresas">
            </div>
            <div class="hover-button-text">
                <p class="kontaktai-button-header">EL. PAŠTAS</p>
                <p>{{ Helper::getContent('email') }}</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/kontaktai/telefonas.png" alt="adresas">
            </div>
            <div class="hover-button-text">
                <p class="kontaktai-button-header">TELEFONAS</p>
                <p>{{ Helper::getContent('phone') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Miesteliu sarasas -->

@foreach(Helper::regions() as $region)
    <div class="paslaugu-sarasas miesteliu-sarasas sarasas-id-{{ $region->id }}">
        <div class="header-of-headers">
            <h3>MIESTELIAI</h3>
            <span>X</span>
        </div>
        <div class="sarasas-wrapper">
            <div class="nano sarasas-container">
                <ul class="nano-content">
                    @foreach(
                        $region->select('organizations.place')->join('cities', 'regions.id', '=', 'cities.region_id')
                            ->join('organizations', 'cities.id', '=', 'organizations.city_id')
                            ->where('organizations.approved', '=', 1)
                            ->groupBy('organizations.place')->get() as $miestelis
                    )
                        <li>{{ $miestelis->place }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endforeach