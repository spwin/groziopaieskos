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

            <div class="transparent-button grozio-salonai-button"><p>{{ $category->name_plural }} - paslaugos</p></div>
            <div class="transparent-button"><p>Žiūrėti visas paslaugas</p></div>

        </div>

    </div>

    <div class="search-clues">
        <h3>NAUJININKAI</h3>
        <h4>Grožio salonai</h4>
        <p>Plaukų kirpimas</p>
        <p>Plaukų dažymas</p>
        <a href="http://groziopaieskos.lt/test/rezultatai"><input type="submit" value="Ieškoti"></a>
    </div>

</div>


{!! Form::close() !!}