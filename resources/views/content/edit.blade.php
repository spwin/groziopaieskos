@extends('admin')
@section('content')
    @include('admin.navigation')
    <div class="col-sm-12">
        <a href="{{ action ('CategoriesController@index') }}" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
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
                {!! Form::model($content, [
                'action' => ['ContentController@update', $content->id],
                'class' => 'pure-form pure-form-aligned',
                'role' => 'form',
                'method' => 'PATCH'
                ]) !!}
                <div class="form-group">
                    {!! Form::label('key', 'Shortcode:', ['class' => 'control-label']) !!}
                    {!! Form::text('key', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', 'COntent:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                {!! Form::submit('Pridėti', ['class' => 'btn btn-success btn-medium']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection