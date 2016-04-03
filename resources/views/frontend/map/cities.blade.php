@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container">
        @include('frontend.map.cities.'.$city, [$city_db, $categories])
    </div>
@endsection