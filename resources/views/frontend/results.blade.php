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

            <!--
            <iframe
                    width="100%"
                    height="500"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCCbwdBUvpHx6SqmjGtDIdDA0sj3PU3nKY&q=Space+Needle,Seattle+WA" allowfullscreen>
            </iframe>
            -->
            <div id="gmap" class="gmap"></div>
            <script>
                function initMap() {
                    var map
                    map = new google.maps.Map(document.getElementById('gmap'), {
                        zoom: 8,
                        center: {lat: 13.74, lng: 100.50}
                    });

/*
                    var addresses = new Array();
                    $('.adresas-mapsui').each(function(geocoder, n){
                        var geocoder = new google.maps.Geocoder();
                        var address = this.innerHTML;
                        console.log(address);
                        geocoder.geocode({'address': address}, function(results, status) {
                            resultsMap.setCenter(results[0].geometry.location);
                            if (status === google.maps.GeocoderStatus.OK) {

                                console.log('done');
                            }

                        });
                        addresses[n] = results[0].geometry.location;
                    });
                console.log(addresses);

                    */
            //create array to store a set of location
            var collection = new Array();

            //a set of locations stored in array
            collection[0] = new google.maps.LatLng(13.742167701649997, 100.50721049308777);
            collection[1] = new google.maps.LatLng(13.74428, 100.5404525);
            collection[2] = new google.maps.LatLng(13.744108, 100.543098);

            var pointMarker = new Array();//store marker in array

            //create number of markers based on collection.length
            function setPoint(){
            for(var i=0; i<collection.length; i++){

                pointMarker[i] = new google.maps.Marker({
                position: collection[i],
                map: map,
                animation: google.maps.Animation.BOUNCE,
                title: "collection"+ i
            });

                    google.maps.event.addListener(pointMarker[i], 'click', function(){
                            alert('as esu grozio salonas');
                        //   window.open("blog/page01.html","_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, copyhistory=yes");
                    });
                }
            }
                    setPoint();
                }

            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCbwdBUvpHx6SqmjGtDIdDA0sj3PU3nKY&callback=initMap"
                    async defer></script>
<!--
             <script>
                function initMap() {
                    var map
                    map = new google.maps.Map(document.getElementById('gmap'), {
                        zoom: 8,
                        center: {lat: 54.68, lng: 25.28}
                    });
                    var geocoder = new google.maps.Geocoder();

                        geocodeAddress(geocoder, map);


                }
                function geocodeAddress(geocoder, resultsMap) {
                    var address = document.getElementById('adresiuko-id').innerHTML;
                    geocoder.geocode({'address': address}, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            resultsMap.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: resultsMap,
                                position: results[0].geometry.location
                            });
                        }
                    });
                }
            </script>
 -->
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
                                            <li>Vieta:<span class="adresas-mapsui">{{ $organization->getCity()->first()->name }} - {{ $organization->place }} - {{ $organization->address }}</span></li>
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