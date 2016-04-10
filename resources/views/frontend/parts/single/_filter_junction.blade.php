{!! Form::open([
                'action' => ['FrontendController@results', $region, $city],
                'class' => 'filter-form',
                'role' => 'form',
                'method' => 'GET'
                ]) !!}
<div class="mikrorajonu-sidebar single-filter">

    <div class="main-header">
        <p>{{ $city_db->name }}<span class="line-break">{{ $category->name_plural }}</span></p>
    </div>

    <div class="sidebar-icons">

        <div class="sidebar-icon">
            <div class="icon-image background-color-selected">
                <img src="{{ URL::to('/') }}/uploads/{{ $category->image }}" alt="grozio salonai">
            </div>
            <p>{{ $category->name_plural }}</p>
        </div>

        <div class="pasirinkti-ziureti-paslaugas">

            <div class="transparent-button grozio-salonai-button category-facilities" data-id="{{ $category->id }}"><p>{{ $category->name_plural }} - paslaugos</p></div>
            <a href="{{ action('FrontendController@city', ['region' => $city_db->getRegion()->first()->slug, 'city' => $city_db->slug]) }}">
                <div class="transparent-button"><p>Žiūrėti visas paslaugas</p></div>
            </a>

        </div>

    </div>

    {!! Form::hidden('category', $category->id) !!}
    {!! Form::hidden('type', 'junction') !!}
    {!! Form::hidden('place_name', 'no') !!}

    <div class="search-clues">
        <h3>{{ $city_db->name }}</h3>
        <h4 id="junction-search"></h4>
        <h4 id="category-search">{{ $category->name_plural }}</h4>
        <div class="nano">
            <div id="facilities-search" class="nano-content"></div>
        </div>
        <div class="horizontal-line"></div>
        <p class="litred paslaugos-error">Pasirinkite teikiamas paslaugas </p>
        <p class="litred mikrorajono-error">Pasirinkite mikrorajoną </p>
        <a href="#"><input class="form-trigger" type="submit" value="Ieškoti"></a>
    </div>

</div>

@if($category->getFacilitiesCategories()->count() > 0)
    <div class="paslaugu-sarasas facilities-{{ $category->id }}">
        <div class="header-of-headers">
            <h3>{{ strtoupper($category->name_plural) }}</h3>
            <span>X</span>
        </div>
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
            <span>X</span>
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