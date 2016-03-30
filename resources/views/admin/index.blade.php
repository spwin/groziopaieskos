@extends('admin')
@section('content')
    @include('admin.navigation')
    @foreach($cities as $city)
        {{ $city->name }} <br/>
    @endforeach
@endsection