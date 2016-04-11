@extends('admin')
@section('content')
    @include('admin.navigation')
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    <h2>Edit organization</h2>
    {!! Form::model($organization, [
                'action' => ['OrganizationsController@update', $organization->id],
                'class' => 'pure-form pure-form-aligned',
                'role' => 'form',
                'files' => true,
                'method' => 'PATCH'
                ]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Pavadinimas:', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'El. paštas:', ['class' => 'control-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category', 'Kategorija:', ['class' => 'control-label']) !!}
        {!! Form::select('category', $categories, $organization->category_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        @foreach($categories_db as $category)
            <div class="facilities facilities-{{ $category->id }} hidden">
                @foreach($category->getFacilities()->get() as $facility)
                        {!! Form::checkbox('facility['.$category->id.']['.$facility->id.']', 'on', $organization->getFacilities()->where(['id' => $facility->id])->first() ? true : false, ['id' => 'facility-'.$facility->id]) !!}
                        {!! Form::label('facility-'.$facility->id, $facility->name) !!}
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <div class="overlay-layer">Logo</div>
        <img width="80" src="{{ URL::to('/') }}/uploads/logos/{{ $organization->logo }}" />
        {!! Form::file('image', ['class' => 'upload_btn']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('region', 'Apskritis', ['class' => 'control-label']) !!}
        {!! Form::select('region', $regions, $organization->getCity()->first()->region_id, ['required' => 'required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city', 'Rajonas', ['class' => 'control-label']) !!}
        {!! Form::select('city', $cities, $organization->city_id, ['required' => 'required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('place', 'Miestas', ['class' => 'control-label']) !!}
        {!! Form::text('place', null, ['id' => 'q', 'required' => 'required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group inputs-adresas">
        {!! Form::label('address', 'Adresas', ['class' => 'control-label']) !!}
        {!! Form::text('address', null, ['required' => 'required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ind_veikl_nr', 'Individualios veiklos Nr.', ['class' => 'control-label']) !!}
        {!! Form::text('ind_veikl_nr', $organization->getOrganizationData()->first()->ind_veikl_nr, ['required' => 'required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Telefonas', ['class' => 'control-label']) !!}
        {!! Form::text('phone', null, ['required' => 'required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('website', 'Internetinis puslapis', ['class' => 'control-label']) !!}
        {!! Form::text('website', $organization->getOrganizationData()->first()->website, ['required' => 'required', 'class' => 'form-control']) !!}
    </div>

    <h3>Darbo laikas</h3>
    <div class="form-group">
        <h4>Monday</h4>
        {!! Form::checkbox('week[monday][opened]', 'on', $organization->getOpeningTimes()->first()->getMonday()->first()->opened ? true : false, ['id' => 'monday_opened']) !!}
        {!! Form::label('monday_opened', 'Opened') !!}
        {!! Form::label('From') !!}
        {!! Form::text('week[monday][from]', $organization->getOpeningTimes()->first()->getMonday()->first()->from) !!}
        {!! Form::label('To') !!}
        {!! Form::text('week[monday][to]', $organization->getOpeningTimes()->first()->getMonday()->first()->to) !!}

        <h4>Tuesday</h4>
        {!! Form::checkbox('week[tuesday][opened]', 'on', $organization->getOpeningTimes()->first()->getTuesday()->first()->opened ? true : false, ['id' => 'tuesday_opened']) !!}
        {!! Form::label('tuesday_opened', 'Opened') !!}
        {!! Form::label('From') !!}
        {!! Form::text('week[tuesday][from]', $organization->getOpeningTimes()->first()->getTuesday()->first()->from) !!}
        {!! Form::label('To') !!}
        {!! Form::text('week[tuesday][to]', $organization->getOpeningTimes()->first()->getTuesday()->first()->to) !!}

        <h4>Wednesday</h4>
        {!! Form::checkbox('week[wednesday][opened]', 'on', $organization->getOpeningTimes()->first()->getWednesday()->first()->opened ? true : false, ['id' => 'wednesday_opened']) !!}
        {!! Form::label('wednesday_opened', 'Opened') !!}
        {!! Form::label('From') !!}
        {!! Form::text('week[wednesday][from]', $organization->getOpeningTimes()->first()->getWednesday()->first()->from) !!}
        {!! Form::label('To') !!}
        {!! Form::text('week[wednesday][to]', $organization->getOpeningTimes()->first()->getWednesday()->first()->to) !!}

        <h4>Thursday</h4>
        {!! Form::checkbox('week[thursday][opened]', 'on', $organization->getOpeningTimes()->first()->getThursday()->first()->opened ? true : false, ['id' => 'thursday_opened']) !!}
        {!! Form::label('thursday_opened', 'Opened') !!}
        {!! Form::label('From') !!}
        {!! Form::text('week[thursday][from]', $organization->getOpeningTimes()->first()->getThursday()->first()->from) !!}
        {!! Form::label('To') !!}
        {!! Form::text('week[thursday][to]', $organization->getOpeningTimes()->first()->getThursday()->first()->to) !!}

        <h4>Friday</h4>
        {!! Form::checkbox('week[friday][opened]', 'on', $organization->getOpeningTimes()->first()->getFriday()->first()->opened ? true : false, ['id' => 'friday_opened']) !!}
        {!! Form::label('friday_opened', 'Opened') !!}
        {!! Form::label('From') !!}
        {!! Form::text('week[friday][from]', $organization->getOpeningTimes()->first()->getFriday()->first()->from) !!}
        {!! Form::label('To') !!}
        {!! Form::text('week[friday][to]', $organization->getOpeningTimes()->first()->getFriday()->first()->to) !!}

        <h4>Saturday</h4>
        {!! Form::checkbox('week[saturday][opened]', 'on', $organization->getOpeningTimes()->first()->getSaturday()->first()->opened ? true : false, ['id' => 'saturday_opened']) !!}
        {!! Form::label('saturday_opened', 'Opened') !!}
        {!! Form::label('From') !!}
        {!! Form::text('week[saturday][from]', $organization->getOpeningTimes()->first()->getSaturday()->first()->from) !!}
        {!! Form::label('To') !!}
        {!! Form::text('week[saturday][to]', $organization->getOpeningTimes()->first()->getSaturday()->first()->to) !!}

        <h4>Sunday</h4>
        {!! Form::checkbox('week[sunday][opened]', 'on', $organization->getOpeningTimes()->first()->getSunday()->first()->opened ? true : false, ['id' => 'sunday_opened']) !!}
        {!! Form::label('sunday_opened', 'Opened') !!}
        {!! Form::label('From') !!}
        {!! Form::text('week[sunday][from]', $organization->getOpeningTimes()->first()->getSunday()->first()->from) !!}
        {!! Form::label('To') !!}
        {!! Form::text('week[sunday][to]', $organization->getOpeningTimes()->first()->getSunday()->first()->to) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Aprašymas:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::hidden('type', $organization->type) !!}

    {!! Form::submit('Išsaugoti', ['class' => 'btn btn-success btn-medium']) !!}

    {!! Form::close() !!}
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).on('ready', function(){
        function checkCategory(){
            var cate_id = $('select[name="category"]').val();
            $('.facilities').addClass('hidden');
            $('.facilities-'+cate_id).removeClass('hidden');
        }
        checkCategory();
        $('#category').on('change', function(){
            checkCategory();
        });

        var junctions = <?php echo json_encode($junctions); ?>;

        function checkMikrorajonas(input){
            var city_id = input.val();
            if(junctions.hasOwnProperty(city_id)){
                $('.junctions-input').remove();
                var output = '<div class="inputs junctions-input"><label for="junction">Mikrorajonas</label><select name="junction" id="junction">';
                $.each(junctions[city_id], function(index, value){
                    output += '<option value="'+index+'">'+value+'</option>';
                });
                output += '</select></div>';
                $('.inputs-block').prepend(output);
            } else {
                $('.junctions-input').remove();
            }
        }

        function checkRajonas(input){
            var region_id = input.val();
            $.ajax({
                url: "{{ action('FrontendController@populateRegions') }}",
                type: "get",
                data:{ region_id : region_id },
                success: function(response) {
                    var output = '';
                    $.each(response, function(index, value){
                        output += '<option value="'+value.id+'">'+value.value+'</option>';
                    });
                    $('select[name="city"]').html(output);
                    checkMikrorajonas($('select[name="city"]'));
                },
                error: function(xhr) {
                    console.log('error');
                }
            });
        }

        $('select[name="region"]').on('change', function(){
            checkRajonas($(this));
        });

        $('select[name="city"]').on('change', function(){
            checkMikrorajonas($(this));
        });

        checkMikrorajonas($('select[name="city"]'));


        $( "#q" ).autocomplete({
            source: "{{ URL::to('/') }}/search/autocomplete",
            minLength: 3,
            select: function(event, ui) {
                $('#q').val(ui.item.value);
            }
        });
    });
</script>
@endpush