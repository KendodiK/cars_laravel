@extends('layout')

@section('content')

@error('name')
<div class=" alert alert-warning">{{$message}}</div>
@enderror

<h1>Új üzemanyag</h1>

<form action="{{route('fuels.store')}}" method="POST">
    @csrf
    <fieldset>
        <label for="name">üzemanyag típus</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection