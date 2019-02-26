@extends('layouts.master')
@section('content')
	    <div class="row">
		<div class="col-sm-4">
                    <img src="{{$pelicula['poster']}}" alt="{{$pelicula['title']}}"/>
		</div>
		<div class="col-sm-8">
                    <h2>{{$pelicula->title}}</h2>
                    <h4>{{$pelicula->year}}</h4>
                    <h4>{{$pelicula->director}}</h4>
                    <p><strong>Género:</strong>
                        @if ($pelicula->Genero)  <a href="/catalog/genre/{{ $pelicula->Genero->id}}">{{ $pelicula->Genero->title}}</a> 
                        @else <a href="/catalog/genre/0">Desconocido</a> 
                        @endif
                    </p>
                    <p><strong>Resumen: </strong>{{$pelicula->synopsis}}</p>
                    <p><strong>Estado: </strong>Película @if ($pelicula->rented)  Actualmente alquilada desde: 
                        {{ $date->format('d/m/Y') }}
                        {{ $date->ago() }}
                        @else disponible @endif</p>
                    <p>
                       @if ($pelicula->rented)
                            @if (Auth::user()->rent_movies->contains($pelicula)) 
                                <a href='\catalog\return\{{$pelicula->id}}' class="btn btn-info">Devolver Película</a> 
                            @endif
                            
                       @else 
                       <a href='\catalog\rent\{{$pelicula->id}}' class="btn btn-success">Alquilar Película</a>
                       @endif 
                       @if (Auth::user()->role === 'admin')
                       <a href="\catalog\edit\{{$pelicula->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i>Editar Película</a>
                       <a href='\catalog\delete\{{$pelicula->id}}' class="btn btn-danger">Eliminar Película</a>
                       @endif
                       <a href="\catalog" class="btn btn-default">Volver al catálogo</a>
                    </p>
		</div> 
	</div>
@stop
