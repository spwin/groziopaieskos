{!! Form::open([
                'action' => ['FrontendController@results', $region, $city],
                'class' => 'filter-form',
                'role' => 'form',
                'method' => 'GET'
                ]) !!}
<div class="mikrorajonu-sidebar">

    <div class="main-header">
        <p>{{ $city_db->name }}<span class="line-break">Pasirinkite rajoną ir paslaugą</span></p>
    </div>

    <div class="sidebar-icons">
        @foreach($categories as $category)
            <div class="sidebar-icon category-facilities category-{{ $category->id }}" data-id="{{ $category->id }}">
                <div class="icon-image">
                    <img src="{{ URL::to('/') }}/img/header-icons/{{ $category->image }}" alt="{{ $category->slug }}">
                </div>
                <p class="category-name">{{ $category->name_plural }}</p>
            </div>
        @endforeach
        {!! Form::hidden('category', null) !!}
    </div>

    {!! Form::hidden('type', 'city') !!}
    {!! Form::hidden('place_name', $city_db->slug) !!}

    <div class="search-clues">
        <h3>{{ $city_db->name }}</h3>
        <h4 id="category-search"></h4>
        <div class="nano">
            <div id="facilities-search" class="nano-content"></div>
        </div>
        <div class="horizontal-line"></div>
        <p class="litred kategorijos-error">Pasirinkite paieškos kategoriją </p>
    <input type="submit" value="Ieškoti">
    </div>

</div>

@foreach($categories as $category)
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
@endforeach

{!! Form::close() !!}