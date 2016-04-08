{!! Form::open([
                'action' => ['FrontendController@results', $region, $city],
                'class' => 'filter-form',
                'role' => 'form',
                'method' => 'GET'
                ]) !!}
<div class="mikrorajonu-sidebar">

    <div class="main-header">
        <p>Vilnius<span class="line-break">Grožio salonai</span></p>
    </div>

    <div class="sidebar-icons">

        <div class="sidebar-icon">
            <div class="icon-image">
                <img src="{{ URL::to('/') }}/uploads/{{ $category->image }}" alt="grozio salonai">
            </div>
            <p>{{ $category->name_plural }}</p>
        </div>

        <div class="pasirinkti-ziureti-paslaugas">

            <div class="transparent-button grozio-salonai-button category-facilities" data-id="{{ $category->id }}"><p>{{ $category->name_plural }} - paslaugos</p></div>
            <div class="transparent-button"><p>Žiūrėti visas paslaugas</p></div>

        </div>

    </div>

    {!! Form::hidden('category', $category->id) !!}
    {!! Form::hidden('type', 'junction') !!}
    {!! Form::hidden('place_name', null) !!}

    <div class="search-clues">
        <h3>{{ $city_db->name }}</h3>
        <h4 id="category-search">{{ $category->name_plural }}</h4>
        <div id="facilities-search"></div>
        <a href="#"><input type="submit" value="Ieškoti"></a>
    </div>

</div>

@if($category->getFacilitiesCategories()->count() > 0)
    <div class="paslaugu-sarasas facilities-{{ $category->id }}">
        <h3>{{ strtoupper($category->name_plural) }}</h3>
        <div class="sarasas-wrapper">
            @foreach($category->getFacilitiesCategories()->get() as $fc)
                <div class="sarasas-container">
                    <div class="image-header">
                        <img src="{{ URL::to('/') }}/uploads/{{ $fc->image }}">
                        <h3>{{ $fc->name }}</h3>
                        @foreach($fc->getFacilities()->get() as $facility)
                            <div class="facilities-container">
                                <input id="{{ $category->id }}_{{ $facility->id }}" type="checkbox" name="facilities[{{ $category->id }}][{{ $facility->id }}]">
                                <label for="{{ $category->id }}_{{ $facility->id }}"><span></span>{{ $facility->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="patvirtinti">PATVIRTINTI</div>
    </div>
@else
    <div class="paslaugu-sarasas facilities-{{ $category->id }}">
        <div class="header-of-headers">
            <h3>{{ strtoupper($category->name_plural) }}</h3>
            <span>Uždaryti</span>
        </div>
        <div class="sarasas-wrapper">
            <div class="sarasas-container">
                @foreach($category->getFacilities()->get() as $facility)
                    <div class="facilities-container">
                        <input id="{{ $category->id }}_{{ $facility->id }}" type="checkbox" name="facilities[{{ $category->id }}][{{ $facility->id }}]">
                        <label for="{{ $category->id }}_{{ $facility->id }}"><span></span>{{ $facility->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="patvirtinti">PATVIRTINTI</div>
    </div>
@endif


{!! Form::close() !!}