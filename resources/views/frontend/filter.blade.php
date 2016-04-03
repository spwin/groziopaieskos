@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container">
        <div class="left-column">

            <div class="rusiavimas">
                <p>Rūšiavimas:</p>
                <div class="filter-button">ilgiausiai dirbančios</div>
                <div class="filter-button">turinčios daugiausia procedūrų</div>
            </div>

            <div class="gmap">

                <iframe
                        width="100%"
                        height="500"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCCbwdBUvpHx6SqmjGtDIdDA0sj3PU3nKY&q=Space+Needle,Seattle+WA" allowfullscreen>
                </iframe>

            </div>

        </div>

        <div class="mikrorajonu-sidebar">

            <div class="main-header">
                <p>{{ $city_db->name }}<span class="line-break">Pasirinkite rajoną ir paslaugą</span></p>
            </div>

            <div class="sidebar-icons">
                @foreach($categories as $category)
                    <div class="sidebar-icon category-facilities" data-id="{{ $category->id }}">
                        <div class="icon-image">
                            <img src="{{ URL::to('/') }}/img/header-icons/{{ $category->image }}" alt="{{ $category->slug }}">
                        </div>
                        <p>{{ $category->name_plural }}</p>
                    </div>
                @endforeach
            </div>

            <div class="search-clues">
                <h3>NAUJININKAI</h3>
                <h4>Grožio salonai</h4>
                <p>Plaukų kirpimas</p>
                <p>Plaukų dažymas</p>
                <a href="http://groziopaieskos.lt/test/rezultatai"><input type="submit" value="Ieškoti"></a>
            </div>

        </div>

        @foreach($categories as $category)
            <div class="paslaugu-sarasas facilities-{{ $category->id }}">
                <div class="header-of-headers">
                    <h3>{{ strtoupper($category->name_plural) }}</h3>
                    <span>Uždaryti</span>
                </div>
                <div class="sarasas-wrapper">
                    <div class="sarasas-container">
                        @foreach($category->getFacilities()->get() as $facility)
                            <input id="{{ $category->id }}_{{ $facility->id }}" type="checkbox" name="facilities[{{ $category->id }}][{{ $facility->id }}]">
                            <label for="{{ $category->id }}_{{ $facility->id }}"><span></span>{{ $facility->name }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="patvirtinti">PATVIRTINTI</div>
            </div>
        @endforeach
    </div>
@endsection