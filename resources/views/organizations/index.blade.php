@extends('admin')
@section('content')
    @include('admin.navigation')
    {{ dump($organizations) }}
@endsection