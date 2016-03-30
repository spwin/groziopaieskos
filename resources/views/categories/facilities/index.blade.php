@extends('admin')
@section('content')
    @include('admin.navigation')
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    <a href="{{ action ('CategoriesController@index') }}" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
    <h2>Paslaugos ({{ $category->name_plural }})</h2>
    <p><a href="{{ action('FacilitiesController@create', ['category' => $category->id]) }}"><i class="fa fa-plus-circle fa-fw"></i>Pridėti paslaugą</a></p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($facilities as $facility)
            <tr>
                <td>{{ $facility->id }}</td>
                <td>{{ $facility->name }}</td>
                <td>
                    <a href="{{ action('FacilitiesController@edit', $facility->id) }}" class="btn btn-xs btn-success">Keisti</a>
                    {!! Form::open([
                    'method' => '',
                    'action' => ['FacilitiesController@destroy', $facility->id],
                    'class' => 'inline-block',
                    'onclick'=> 'return confirm("Are you sure?")'
                    ]) !!}
                    {!! Form::submit('Pašalinti', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection