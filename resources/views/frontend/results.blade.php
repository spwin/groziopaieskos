@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container">

        {!! $type == 'search' ? '<h2>Paieška pagal "'.$query.'"</h2>' : '' !!}

        <div class="left-column">

            <div class="rusiavimas">
                <p>Rūšiavimas:</p>
                <div class="filter-button">ilgiausiai dirbančios</div>
                <div class="filter-button">turinčios daugiausia procedūrų</div>
            </div>


            <script>
                function initMap() {
                    var map
                    map = new google.maps.Map(document.getElementById('gmap'), {
                        zoom: 9,
                        center: {lat: 54.705019, lng: 25.311632}

                    });
                    var latLng;

                    $('.adresas-mapsui').each(function(geocoder, n){
                        var geocoder = new google.maps.Geocoder();
                        var address = this.innerHTML;
                        var salono_kategorija = $(this).closest('.left-side').find('.name-details h4').html();
                        var salono_pavadinimas = $(this).closest('.left-side').find('.name-details h3').html();
                        var result = $(this).closest('.vienas-rezultatas');
                        var rezultato_id = $(this).closest('.vienas-rezultatas').attr('id');
                        var id_for_scroll = '#' + rezultato_id + ' ';


                        geocoder.geocode({'address': address}, function(results, status) {

                            if (status === google.maps.GeocoderStatus.OK) {
                                var lat = results[0].geometry.location.lat();
                                var lng = results[0].geometry.location.lng();
                                var marker = new google.maps.Marker({
                                    position: {lat: lat, lng: lng},
                                    animation: google.maps.Animation.DROP,
                                    map: map
                                });
                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p style="color:black;">' + salono_kategorija + ' '+ salono_pavadinimas +'</p>'
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                                    $('.gm-style-iw').parent().hide();
                                    infowindow.open(marker.get('map'), marker);
                                    $('.vienas-rezultatas').css('opacity', '0.6');
                                    $(result).css('opacity', '1');
                                });
                                latLng = marker.getPosition();
                                map.setCenter(latLng);
                            }
                        });

                    });

                }

            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCbwdBUvpHx6SqmjGtDIdDA0sj3PU3nKY&callback=initMap"
                    async defer></script>
            <div id="gmap" class="gmap"></div>

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
                    <div class="vienas-rezultatas" id="{{ $organization->id  }}">
                        <div class="apie-imone">
                            <div class="imone-container">
                                <div class="left-side">
                                    <div class="top-left-side">
                                        <div class="logo-cont">
                                            <img src="{{ URL::to('/') }}/uploads/logos/{{ $organization->logo }}">
                                        </div>
                                        <div class="name-details">
                                            {!! $organization->getOpeningTimes()->first()->getToday()->first()->opened ? '<p>DIRBA</p>' : '<p style="color: red;">NEDIRBA</p>' !!}
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
                                            <li>Vieta: <span class="adresas-mapsui">{{ $organization->getCity()->first()->name }}, {{ $organization->place }}, {{ $organization->address }}</span></li>
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