@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')

    <div class="main-container kontaktai-page">

        <div class="hover-menu kontaktai-menu">
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

    </div>

@endsection