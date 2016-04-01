@extends('frontend')
@section('content')
    @include('frontend.navigation')
    @include('flash::message')
    <div class="main-container">

        <div class="main-header">
            <p>Registracija</p>
            <a href="{{ action('FrontendController@company') }}">
                <div class="registracija-button"><p>Juridiniai asmenys</p></div>
            </a>
            <a href="{{ action('FrontendController@person') }}">
                <div class="registracija-button current"><p>Individuali veikla</p></div>
            </a>
        </div>

        <div class="form-container">

            {!! Form::open([
                'action' => ['FrontendController@store', 'person'],
                'class' => 'registracija-form',
                'role' => 'form',
                'files' => true,
                'method' => ''
                ]) !!}
                <p>Vartotojas</p>

                <div class="first-form-line">
                    <div class="inputs">
                        {!! Form::label('title', 'Įmonės pavadinimas ') !!}
                        {!! Form::text('title', null, ['required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('email', 'El. paštas ') !!}
                        {!! Form::input('email', 'email', null, ['required' => 'required']) !!}
                    </div>
                    <div>
                        <div class="overlay-layer">Logo</div>
                        {!! Form::file('image', ['class' => 'upload_btn']) !!}
                    </div>
                </div>

                <div class="registracija-veikla">

                    <p>Veikla</p>
                    <div class="sidebar-icons">
                        @foreach($categories as $category)
                            <div class="sidebar-icon category-facilities" data-id="{{ $category->id }}">
                                <div class="icon-image">
                                    <img src="{{ URL::to('/') }}/uploads/{{ $category->image }}" alt="grozio salonai">
                                </div>
                                <p>{{ $category->name_single }}</p>
                            </div>
                        @endforeach
                        {!! Form::hidden('category', null) !!}
                    </div>

                </div>

                <div class="second-form-line">

                    <div class="inputs">
                        {!! Form::label('region', 'Apskritis') !!}
                        {!! Form::select('region', $regions, null, ['required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('city', 'Rajonas') !!}
                        {!! Form::select('city', $cities, null, ['required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('place', 'Miestas') !!}
                        {!! Form::text('place', null, ['id' => 'q', 'required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('address', 'Adresas') !!}
                        {!! Form::text('address', null, ['required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('imones_kodas', 'Įmonės kodas') !!}
                        {!! Form::text('imones_kodas', null, ['required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('pvm_kodas', 'PVM kodas') !!}
                        {!! Form::text('pvm_kodas', null, ['required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('phone', 'Telefonas') !!}
                        {!! Form::text('phone', null, ['required' => 'required']) !!}
                    </div>
                    <div class="inputs">
                        {!! Form::label('website', 'Internetinis puslapis') !!}
                        {!! Form::text('website', null, ['required' => 'required']) !!}
                    </div>
                    <div class="darbo-laikas">
                        <p>Darbo Laikas:</p>

                        <div class="diena">
                            <p>
                                <input id="pirmadcheck" name="open_time[monday][open]" type="checkbox">
                                <label for="pirmadcheck"><span></span></label>
                                <label for="pirmadienisslider">Pirmadienis:</label>
                                <input type="text" name="open_time[monday][time]" id="pirmadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider1" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="antradcheck" name="open_time[tuesday][open]" type="checkbox">
                                <label for="antradcheck"><span></span></label>
                                <label for="antradienisslider">Antradienis:</label>
                                <input type="text" name="open_time[tuesday][time]" id="antradienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider2" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="treciadcheck" name="open_time[wednesday][open]" type="checkbox">
                                <label for="treciadcheck"><span></span></label>
                                <label for="treciadienisslider">Trečiadienis:</label>
                                <input type="text" name="open_time[wednesday][time]" id="treciadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider3" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="ketvirtadcheck" name="open_time[thursday][open]" type="checkbox">
                                <label for="ketvirtadcheck"><span></span></label>
                                <label for="ketvirtadienisslider">Ketvirtadienis:</label>
                                <input type="text" name="open_time[thursday][time]" id="ketvirtadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider4" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="penktadcheck" name="open_time[friday][open]" type="checkbox">
                                <label for="penktadcheck"><span></span></label>
                                <label for="penktadienisslider">Penktadienis:</label>
                                <input type="text" name="open_time[friday][time]" id="penktadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider5" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="sestadcheck" name="open_time[saturday][open]" type="checkbox">
                                <label for="sestadcheck"><span></span></label>
                                <label for="sestadienisslider">Šeštadienis:</label>
                                <input type="text" name="open_time[saturday][time]" id="sestadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider6" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="sekmadcheck" name="open_time[sunday][open]" type="checkbox">
                                <label for="sekmadcheck"><span></span></label>
                                <label for="sekmadienisslider">Sekmadienis:</label>
                                <input type="text" name="open_time[sunday][time]" id="sekmadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider7" class="sliders"></div>
                        </div>
                    </div>
                    <!-- Darbo laikas end -->

                    <div class="inputs">
                        <p>Apie įmonę</p>
                        <textarea name="description" rows="10" cols="70"></textarea>
                    </div>

                </div>


                <input type="submit" value="Siųsti užklausą">

                @foreach($categories as $category)
                    <div class="paslaugu-sarasas facilities-{{ $category->id }}">
                        <div class="header-of-headers">
                            <h3>{{ strtoupper($category->name_plural) }}</h3>
                            <span>Uždaryti</span>
                        </div>
                        <div class="sarasas-wrapper">
                            <div class="sarasas-container">
                                @foreach($category->getFacilities()->get() as $facility)
                                <input id="{{ $category->id }}_{{ $facility->id }}" type="checkbox" name="facilities[{{ $category->id }}][{{ $facility->id }}]">
                                <label for="{{ $category->id }}_{{ $facility->id }}"><span></span>{{ $facility->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="patvirtinti">PATVIRTINTI</div>
                    </div>
                @endforeach

            {!! Form::close() !!}

        </div>

    </div>
    <script type="text/javascript">
        $(function()
        {
            $( "#q" ).autocomplete({
                source: "{{ URL::to('/') }}/search/autocomplete",
                minLength: 3,
                select: function(event, ui) {
                    $('#q').val(ui.item.value);
                }
            });
        });
    </script>
@endsection