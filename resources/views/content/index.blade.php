@extends('admin')
@section('content')
    @include('admin.navigation')
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    <h2>Turinys</h2>
    <p><a href="{{ action('ContentController@create') }}"><i class="fa fa-plus-circle fa-fw"></i>Pridėti įrašą</a></p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Key</th>
            <th>Content</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contents as $content)
            <tr>
                <td>{{ $content->id }}</td>
                <td>{{ $content->key }}</td>
                <td>{{ $content->content }}</td>
                <td>
                    <a href="{{ action('ContentController@edit', $content->id) }}" class="btn btn-xs btn-success">Keisti</a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'action' => ['ContentController@destroy', $content->id],
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