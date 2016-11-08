@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{{ $location->name }} bewerken</b></div>

                    <div class="panel-body">
                        <form method="post" action="/admin/location/update">
                            <input type="hidden" value="{{ $location->id }}" name="id">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Naam</label>
                                    <input type="text" class="form-control" value="{{ $location->name }}" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control" name="location">
                                        @foreach($cities as $city)
                                            @if($city->id === $location->city_id)
                                                <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                            @else
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Wijzigingen opslaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
