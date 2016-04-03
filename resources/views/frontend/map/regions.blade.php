@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container">
        <div class="main-map">
            <img id="myimg" src="{{ URL::to('/') }}/img/regions/{{ $region_db->slug }}-map.png" usemap="#mymap">
            <map name="mymap" id="{{ $region_db->slug }}">
                @include('frontend.map.regions.'.$region, [$region_db, $categories])
            </map>
        </div>

        <div class="main-header">
            <p>Pasirinkite miestą<span class="line-break"> apskritį arba teritoriją</span></p>
        </div>

        <div class="main-header main-paieska">
            <p>arba<span class="line-break"> pasinaudokite paieška</span></p>
            <input type="search">
            <a href="http://groziopaieskos.lt/test/pagal-mikrorajonus"><input type="submit" value="Ieškoti"></a>
        </div>
    </div>
@endsection