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


        <div class="right-column">
            <div class="rezultatai-header">
                <div class="main-header">
                    <p>Rezultatai<span class="line-break">Rasta rezultatų: {{ count($organizations) }}</span></p>
                </div>
            </div>

            <div class="nano rezultatu-sarasas">
                <div class="nano-content">
                    @foreach($organizations as $organization)
                    <div class="vienas-rezultatas">
                        <div class="apie-imone">
                            <div class="imone-container">
                                <div class="left-side">
                                    <div class="top-left-side">
                                        <div class="logo-cont">
                                            <img src="{{ URL::to('/') }}/uploads/logos/{{ $organization->logo }}">
                                        </div>
                                        <div class="name-details">
                                            <p>DIRBA</p>
                                            <a href="{{ action('FrontendController@about', ['id' => $organization->id, 'slug' => Helper::url($organization->title)]) }}">
                                                <h3>{{ $organization->title }}</h3>
                                            </a>
                                            <h4>{{ $organization->getCategory()->first()->name_single }}</h4>
                                            <img src="{{ URL::to('/') }}/uploads/{{ $organization->getCategory()->first()->image }}">
                                        </div>
                                        <div class="imone-checkboxes">
                                            @foreach($organization->getFacilities()->get() as $facility)
                                                <input checked="checked" id="facility_{{ $facility->id }}" type="checkbox" name="vehicle">
                                                <label for="facility_{{ $facility->id }}"><span></span>{{ $facility->name }}</label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="bottom-left-side">
                                        <ul>
                                            <li>Telefonas: {{ $organization->phone }}</li>
                                            <li>Darbo laikas: {{ $organization->getOpeningTimes()->first()->getToday()->first()->from }} - {{ $organization->getOpeningTimes()->first()->getToday()->first()->to }}</li>
                                            <li>Darbo dienos:
                                                <span style="display: inline-block; width: 15px; height: 15px; border-radius: 10px; background-color: {{ $organization->getOpeningTimes()->first()->getMonday()->first()->opened ? 'green' : 'red' }}"></span>
                                                <span style="display: inline-block; width: 15px; height: 15px; border-radius: 10px; background-color: {{ $organization->getOpeningTimes()->first()->getTuesday()->first()->opened ? 'green' : 'red' }}"></span>
                                                <span style="display: inline-block; width: 15px; height: 15px; border-radius: 10px; background-color: {{ $organization->getOpeningTimes()->first()->getWednesday()->first()->opened ? 'green' : 'red' }}"></span>
                                                <span style="display: inline-block; width: 15px; height: 15px; border-radius: 10px; background-color: {{ $organization->getOpeningTimes()->first()->getThursday()->first()->opened ? 'green' : 'red' }}"></span>
                                                <span style="display: inline-block; width: 15px; height: 15px; border-radius: 10px; background-color: {{ $organization->getOpeningTimes()->first()->getFriday()->first()->opened ? 'green' : 'red' }}"></span>
                                                <span style="display: inline-block; width: 15px; height: 15px; border-radius: 10px; background-color: {{ $organization->getOpeningTimes()->first()->getSaturday()->first()->opened ? 'green' : 'red' }}"></span>
                                                <span style="display: inline-block; width: 15px; height: 15px; border-radius: 10px; background-color: {{ $organization->getOpeningTimes()->first()->getSunday()->first()->opened ? 'green' : 'red' }}"></span>
                                            </li>
                                            <li>Vieta: {{ $organization->getCity()->first()->name }} - {{ $organization->place }} - {{ $organization->address }}</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection