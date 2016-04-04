<ul class="mikrorajonai">
    @foreach($city_db->getJunctions()->get() as $junction)
        <li>{{ $junction->name }}</li>
    @endforeach
</ul>

<div class="{{ $city_db->slug }}-map">
    <img src="{{ URL::to('/') }}/img/cities/{{ $city_db->slug }}-map.png" alt="{{ $city_db->slug }} map">
</div>

@include('frontend.parts.'.$type.'._filter_junction')
