<header>
    <div class="header-container">
        <a href="/"><img class="logo" src="{{ URL::to('/') }}/img/logo.png" alt="logo"></a>

        <ul class="menu-list">
            <li id="miestai">Miestai</li>
            <li id="paslaugos">Paslaugos</li>
            <li>Apie mus</li>
            <li>Kontaktai</li>
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
                    <p>{{ $category->getOrganizations()->where(['type' => 'imone'])->count() }} įmonės</p>
                    <p>{{ $category->getOrganizations()->where(['type' => 'asmuo'])->count() }} fiziniai asmenys</p>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- MIESTU MENU -->

<div id="c" class="hover-menu miestai-menu">
    <div class="hover-container">
        <div class="hover-button">
            <div class="hover-button-header">
                Vilnius
            </div>
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/vilnius.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Kaunas
            </div>
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/kaunas.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Šiauliai
            </div>
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/siauliai.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Klaipėda
            </div>
            <div class="hover-button-image klaipeda-icon">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/klaipeda.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Panevežys
            </div>
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/panevezys.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Utena
            </div>
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/utena.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Alytus
            </div>
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/alytus.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Telšliai
            </div>
            <div class="hover-button-image telsiai-icon">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/telsiai.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Marijampolė
            </div>
            <div class="hover-button-image marijampole-icon">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/marijampole.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-header">
                Tauragė
            </div>
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/miestai/taurage.png" alt="grozio salonai icon">
            </div>
            <div class="hover-button-text">
                <p>553 įmonės</p>
                <p>109 fiziniai asmenys</p>
            </div>
        </div>
    </div>
</div>

<!-- APIE MUS MENU -->
<div id="e" class="hover-menu kontaktai-menu">
    <div class="hover-container">

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
                <p>Namas 7, rajonas, miestas<br>Lietuva, LT154872</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/kontaktai/elpastas.png" alt="adresas">
            </div>
            <div class="hover-button-text">
                <p class="kontaktai-button-header">EL. PAŠTAS</p>
                <p>info@groziopaieskos.lt</p>
            </div>
        </div>
        <div class="hover-button">
            <div class="hover-button-image">
                <img src="{{ URL::to('/') }}/img/header-icons/kontaktai/telefonas.png" alt="adresas">
            </div>
            <div class="hover-button-text">
                <p class="kontaktai-button-header">TELEFONAS</p>
                <p>+370 6 7420316</p>
            </div>
        </div>
    </div>
</div>