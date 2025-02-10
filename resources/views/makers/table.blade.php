@extends('layout')

@section('content')
    <h1>Gyártók</h1>
    <div>
        <table>
            <thead>
                <tr><th>#</th><th>Megnevezés</th><th>Logo</th></tr>
            </thead>
            <tbody>
                @foreach ($makers as $maker)
                    <tr class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd'}}">
                        <td>{{$maker->id}}</td>
                        <td>{{$maker->name}}</td>
                        <td><img src="{{$maker->logo}}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection