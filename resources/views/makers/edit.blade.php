@extends('layout')

@section('content')

@error('name')
<div class=" alert alert-warning">{{$message}}</div>
@enderror

<h1>Gyártó módosítása</h1>

<form action="{{route('makers.update',  $maker->id)}}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Gyártó név</label>
        <input type="text" name="name" id="name" value="{{old('name', $maker->name)}}">
    </fieldset>
    <fieldset>
        <label for="logo">Logo file név</label>
        <input type="text" name="logo" id="logo" value="{{old('logo', $maker->logo)}}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection