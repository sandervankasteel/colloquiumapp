@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success'))
                    @include('admin.partials.success')
                @elseif(Session::has('error'))
                    @include('admin.partials.error')
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>All locations</b>
                        <div class="pull-right">
                            <a href="/admin/location/create" class="btn btn-success">Toevoegen</a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Stad</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($locations as $location)
                                <tr>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->city()->first()->name }}</td>
                                    <td><a href="/admin/location/edit/{{ $location->id }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Bewerken</a></td>
                                    <td><a href="/admin/location/delete/{{ $location->id }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Verwijderen</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
