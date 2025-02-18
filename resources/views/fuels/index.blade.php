@extends('layout')

@section('content')
<h1>Üzemanyagok</h1>

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <ul>
        {{-- @include('basic-table-header', ['route' => 'makers.create']) --}}
        <li class="row add">
            <a href="{{route('fuels.create')}}">Új üzemanyag típus</a>
        </li>
        @foreach($fuels as $fuel)
            <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                <div class="col col-id">{{ $fuel->id }}</div>
                <div class="col">{{$fuel->name}}</div>
                <div class="col">
                    <form action="{{ route('fuels.destroy', $fuel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button" type="submit" name="btn-del-fuel">Töröl</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection