@extends('layout')

@section('content')
<h1>Gyártók</h1>

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
            <a href="{{route('makers.create')}}">Új gyártó</a>
        </li>
        @foreach($makers as $maker)
            <li class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                <div class="col col-id">{{ $maker->id }}</div>
                <div class="col">{{$maker->name}}</div>
                <div class="col col-logo">
                    @if ($maker->logo != null)
                        <img class="logo-img" src="{{asset("logos/$maker->logo.png")}}" alt="logo nem szerepel az adatbázisban, vagy helytelen név">
                    @else
                        <p>nincs megadott logo</p>
                    @endif

                </div>
                <div class="col">
                    <button><a href="{{ route('makers.edit', $maker->id) }}">Módosít</a></button>
                </div>
                <div class="col">
                    <form action="{{ route('makers.destroy', $maker->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button" type="submit" name="btn-del-maker">Töröl</button>
                    </form>
                </div>
{{--                <div class="right">
                   <div class="col">
                        <a href="{{ route('makers.show', $maker->id) }}"><button><i class="fa fa-binoculars" title="Mutat"></i></button></a></div>
                        <form method="post" action="{{ route('models.filter') }}">
                            @csrf
                            <input type="hidden" name="maker_id" value="{{ $maker->id }}">
                            <button type="submit"><i class="fa fa-binoculars" title="Mutat"></i></button>
                        </form>
                    </div>

                    @if(auth()->check())
                        

                    @endif
                </div> --}}

            </li>
        @endforeach
    </ul>
{{--    @isset($abc)
        <div class="paginator">
            {{ $makers
                ->appends([
                    'sort_by' => request('sort_by'),
                    'sort_dir' => request('sort_dir'),
                ])
                ->links()

            }}
        </div>
    @endisset --}}
</div>
@endsection
