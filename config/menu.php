<?php

return [
	'catalogo' => [ 'submenu' => [
            'lista' =>[ 'title'=> 'Catálogo', 'url' => '/catalog'],
            'nueva' => ['title' => 'Nueva Película', 'url' => '/catalog/create', 'roles' => 'admin'],
            'alquiladas' => ['title' => 'Películas alquiladas', 'url' => '/catalog/rented', 'roles' => 'admin'],
            'historial' => ['title' => 'Historial de alquiler', 'url' => '/catalog/history', 'roles' => 'admin']
        ]],
        'genero' => ['submenu' => [ 
            'genre' => ['title' => 'Mantenimiento Generos' , 'url' => '/genre'],
            'nuevo' => ['title' => 'Nuevo Genero', 'url' => '/genre/create']
            ], 'roles' => 'admin'],
        'mi cuenta' => ['submenu' => [ 
            'alquiladas' => ['title' => 'Mis películas alquiladas' , 'url' => '/account/rented'],
            'historial' => ['title' => 'Mi historial de alquiler', 'url' => '/account/history']
            ]],
	'logout' => ['title' => 'Cerrar Sesion' ,'url' => '/logout']
];