@extends('admin')
@section('content')
    @include('admin.navigation')
    <div class="col-sm-12">
        <a href="{{ action ('CategoriesController@index') }}" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
        <h2>Nauja kategorija</h2>
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
                'action' => 'CategoriesController@store',
                'class' => 'pure-form pure-form-aligned',
                'role' => 'form',
                'files' => true,
                'method' => ''
                ]) !!}
                <div class="form-group">
                    {!! Form::label('name_single', 'Kategorijos pavainimas (vienaskaita):', ['class' => 'control-label']) !!}
                    {!! Form::text('name_single', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name_plural', 'Kategorijos pavainimas (daugiskaita):', ['class' => 'control-label']) !!}
                    {!! Form::text('name_plural', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'URL:', ['class' => 'control-label']) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <p class="help-block">Šis laukelis privalo būti unikalus.</p>
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Kategorijos paveiksliukas:', ['class' => 'control-label']) !!}
                    {!! Form::file('image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('order', 'Eiliškumas:', ['class' => 'control-label']) !!}
                    {!! Form::input('number', 'order', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                {!! Form::submit('Pridėti', ['class' => 'btn btn-success btn-medium']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection