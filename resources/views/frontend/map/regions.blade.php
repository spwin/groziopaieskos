@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container region-page">
        <div class="apskritis-header">{{ $region_db->name }} apskr.</div>
        <ul class="mikrorajonai">

            @foreach($region_db->getCities()->get() as $city)
                <li data-name="{{ $city->slug }}">{{ $city->name }}</li>
            @endforeach
        </ul>
        <div class="main-map">
            <img id="myimg" src="{{ URL::to('/') }}/img/regions/{{ $region_db->slug }}-map.png" usemap="#mymap">
            <map name="mymap" id="region">
                @include('frontend.map.regions.'.$region, [$region_db, $categories])
            </map>
        </div>

        <div class="main-header">
            <p>Pasirinkite miestą<span class="line-break"> apskritį arba teritoriją</span></p>
        </div>

        <div class="main-header main-paieska">
            <p>arba<span class="line-break"> pasinaudokite paieška</span></p>
            {!! Form::open([
                'action' => 'FrontendController@search',
                'class' => 'pure-form pure-form-aligned',
                'role' => 'form',
                'method' => 'GET'
                ]) !!}

            {!! Form::input('search', 'query', null) !!}

            {!! Form::submit('Ieškoti') !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection