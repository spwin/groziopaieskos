@extends('admin')
@section('content')
    @include('admin.navigation')
    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
    <h2>{{ $title }}</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Logo</th>
            <th>Title</th>
            <th>Type</th>
            <th>Category</th>
            <th>WEB</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($organizations as $key => $organization)
            <tr class="{{ $organization->approved ? 'bg-success' : 'bg-danger' }}">
                <td>{{ ++$key }}</td>
                <td><img width="50" src="{{ URL::to('/') }}/uploads/logos/{{ $organization->logo }}" /></td>
                <td>{{ $organization->title }}</td>
                <td>{{ $organization->type == 'imone' ? 'Įmonė' : 'Individuali veikla' }}</td>
                <td>{{ $organization->getCategory()->first()->name_plural }}</td>
                <td>{{ $organization->getOrganizationData()->first()->website }}</td>
                <td>{{ $organization->email }}</td>
                {!! Form::open([
                    'method' => 'POST',
                    'action' => ['OrganizationsController@approve', $organization->id],
                    'class' => 'inline-block'
                    ]) !!}
                <td>
                    {!! Form::text('place', $organization->place, ['class' => 'autocomplete-field']) !!}
                </td>
                <td>
                    @if($organization->approved)
                        {!! Form::hidden('approved', 0) !!}
                        <button type="submit" href="{{ action('OrganizationsController@approve', ['id' => $organization->id]) }}" class="btn btn-xs btn-warning">Slepti</button>
                    @else
                        {!! Form::hidden('approved', 1) !!}
                        <button type="submit" href="{{ action('OrganizationsController@approve', ['id' => $organization->id]) }}" class="btn btn-xs btn-success">Patvirtinti</button>
                    @endif
                </td>
                {!! Form::close() !!}
                <td>
                    <a href="{{ action('OrganizationsController@edit', $organization->id) }}" class="btn btn-xs btn-primary">Keisti</a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'action' => ['OrganizationsController@destroy', $organization->id],
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
@push('scripts')
<script type="text/javascript">
    $(document).on('ready', function(){
        $( ".autocomplete-field").each(function(){
            $(this).autocomplete({
                source: "{{ URL::to('/') }}/search/autocomplete",
                minLength: 3,
                select: function(event, ui) {
                    $(this).val(ui.item.value);
                }
        });
        });
    });
</script>
@endpush