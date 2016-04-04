@extends('admin')
@section('content')
    @include('admin.navigation')
    <div class="col-sm-12">
        <a href="{{ action ('FacilitiesCategoriesController@index') }}" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
        <h2>Kategorijos redagavimas</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                {!! Form::model($category, [
                'action' => ['FacilitiesCategoriesController@update', $category->id],
                'class' => 'pure-form pure-form-aligned',
                'role' => 'form',
                'files' => true,
                'method' => 'PATCH'
                ]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Kategorijos pavainimas:', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Priklauso kategorijai:', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Kategorijos paveiksliukas:', ['class' => 'control-label']) !!}
                    <img class="block mb-20px" src="{{ URL::to('/') }}/uploads/{{ $category->image }}" width="50"/>
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