@extends('layout')

@section('content')

@error('name')
<div class=" alert alert-warning">{{$message}}</div>
@enderror

<h1>Új gyártó</h1>

<form action="{{route('makers.store')}}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Gyártó neve</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="logo">Logo file név</label>
        <input type="text" name="logo" id="logo">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection