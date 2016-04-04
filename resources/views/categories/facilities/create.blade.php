@extends('admin')
@section('content')
    @include('admin.navigation')
    <div class="col-sm-12">
        <a href="{{ action ('FacilitiesController@index', $category->id) }}" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
        <h2>Nauja paslauga ({{ $category->name_plural }})</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                {!! Form::open([
                'action' => ['FacilitiesController@store', $category->id],
                'class' => 'pure-form pure-form-aligned',
                'role' => 'form',
                'method' => ''
                ]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Paslaugos pavadinimas:', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('facility_category_id', 'Priklauso subkategorijai:', ['class' => 'control-label']) !!}
                    {!! Form::select('facility_category_id', $facilities_categories, null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Pridėti', ['class' => 'btn btn-success btn-medium']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection