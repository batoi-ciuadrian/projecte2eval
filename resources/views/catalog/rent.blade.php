@extends('layouts.master')
@section('content')
<div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th><h3>Película</h3></th>
                    <th style="text-align: center"><h4>Fecha Alquiler</h4></th>
                    <th style="text-align: center"><h4>Fecha Devolución</h4></th>
                    <th style="text-align: center"><h4>Usuario</h4></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $alquileres as $alquiler )
                    <tr>
                        <td><img src="{{$alquiler->pelicula->poster}}" style="height:200px"/></td>
                        <td style="text-align: center">{{ $alquiler->dateRent }}</td>
                        <td style="text-align: center">@if ($alquiler->dateReturn != null) {{ $alquiler->dateRent }}
                                                        @else Alquilada desde @php Jenssegers\Date\Date::setLocale('es'); $date = new Jenssegers\Date\Date($alquiler->dateRent); @endphp
                                                        {{ $date->ago() }}
                                                        @endif</td>
                        <td style="text-align: center">{{ $alquiler->usuario->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@stop