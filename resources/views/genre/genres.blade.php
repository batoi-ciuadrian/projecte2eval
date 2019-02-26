@extends('layouts.master')
@section('content')
<div class="row">
        <table class="table table-stripped">
            <thead>
                <tr class="table-info">
                    <th><h2>Nom</h2></th>
                    <th style="text-align: center"><h2>Editar</h2></th>
                    <th style="text-align: center"><h2>Eliminar</h2></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $genres as $genre )
                    <tr>
                        <td><h3>{{$genre->title}}</h3></td>
                        <td style="text-align: center"><a href="\genre\edit\{{$genre->id}}" class="btn btn-warning">Editar</a></td>
                        <td style="text-align: center"><a href='\genre\delete\{{$genre->id}}' class="btn btn-danger">Eliminar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@stop
