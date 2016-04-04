<ul class="mikrorajonai">
    @foreach($city_db->getJunctions()->get() as $junction)
        <li>{{ $junction->name }}</li>
    @endforeach
</ul>

<div class="vilnius-map">
    <img src="{{ URL::to('/') }}/img/cities/{{ $city_db->slug }}-map.png" alt="{{ $city_db->slug }} map">
</div>

@include('frontend._filter_junction')
