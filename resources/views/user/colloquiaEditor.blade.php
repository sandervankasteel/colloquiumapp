@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $colloquium->title }} bewerken</div>
                    <div class="panel-body">
                        <form action="/planner/colloquium/update" method="post">
                            <p>
                                <input type="text" class="form-control" name="title" placeholder="Colloquium titel"
                                       value="{{ $colloquium->title }}"/></p>
                            <p>
                                <textarea class="form-control" name="description"
                                          placeholder="Colloquium beschrijving" rows="10"
                                          style="max-width: 100%;">{{ $colloquium->description }}</textarea>
                            </p>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p>Spreker</p>
                                    <p>
                                        <select class="form-control" name="user_id">
                                            @foreach ($users as $user)
                                                @if ($user->id == $colloquium->user_id)
                                                    <option value="{{ $user->id }}" selected>
                                                @else
                                                    <option value="{{ $user->id }}">
                                                        @endif
                                                        {{ $user->last_name }}
                                                        , {{ $user->first_name }} {{ $user->insertion }}
                                                    </option>
                                                    @endforeach
                                        </select>
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <p>Kamer</p>
                                    <p>
                                        <select class="form-control" name="room_id">
                                            @foreach ($rooms as $room)
                                                @if ($room->id == $colloquium->room_id)
                                                    <option value="{{ $room->id }}" selected>
                                                @else
                                                    <option value="{{ $room->id }}">
                                                        @endif
                                                        {{ $room->name }}
                                                    </option>
                                                    @endforeach
                                        </select>
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <p>Type</p>
                                    <p>
                                        <select class="form-control" name="type_id">
                                            @foreach ($types as $type)
                                                @if ($type->id == $colloquium->type_id)
                                                    <option value="{{ $type->id }}" selected>
                                                @else
                                                    <option value="{{ $type->id }}">
                                                        @endif
                                                        {{ $type->name }}
                                                    </option>
                                                    @endforeach
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>Startdatum</p>
                                    <p>
                                        <input type="datetime" class="form-control" name="start_date"
                                               value="{{ $colloquium->start_date }}"/>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Einddatum</p>
                                    <p>
                                        <input type="datetime" class="form-control" name="end_date"
                                               value="{{ $colloquium->end_date }}"/>
                                    </p>
                                </div>
                            </div>
                            <p>Taal</p>
                            <p>
                                <select class="form-control" name="language_id">
                                    @foreach ($languages as $lang)
                                        @if ($lang->id == $colloquium->language_id)
                                            <option value="{{ $lang->id }}" selected>
                                        @else
                                            <option value="{{ $lang->id }}">
                                                @endif
                                                {{ $lang->name }}
                                            </option>
                                            @endforeach
                                </select>
                            </p>
                            <button class="btn btn-primary pull-right">Opslaan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection