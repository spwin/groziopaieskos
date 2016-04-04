@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container">
        <div class="left-column">

            <div class="gmap">

                <iframe
                        width="100%"
                        height="500"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCCbwdBUvpHx6SqmjGtDIdDA0sj3PU3nKY&q={{ $city_db->name }}" allowfullscreen>
                </iframe>

            </div>

        </div>

        @include('frontend._filter_city')

    </div>
@endsection