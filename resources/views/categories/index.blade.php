@extends('admin')
@section('content')
    @include('admin.navigation')
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    <h2>Kategorijos</h2>
    <p><a href="{{ action('CategoriesController@create') }}"><i class="fa fa-plus-circle fa-fw"></i>Pridėti kategoriją</a></p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td><img width="50" src="{{ URL::to('/') }}/uploads/{{ $category->image }}" /></td>
                <td>{{ $category->name_plural }}</td>
                <td>{{ $category->order }}</td>
                <td>
                    <a href="{{ action('FacilitiesController@index', $category->id) }}" class="btn btn-xs btn-primary">Paslaugos</a>
                    <a href="{{ action('CategoriesController@edit', $category->id) }}" class="btn btn-xs btn-success">Keisti</a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'action' => ['CategoriesController@destroy', $category->id],
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