@extends('layouts/master')

@section('contenido')

<h4>Detalle del usuario {{$user->username}}</h4>
<p>El id del usuario es {{$user->id}}</p>

@stop