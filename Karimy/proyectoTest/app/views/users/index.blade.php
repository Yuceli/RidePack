@extends('layouts/master')
@section('contenido')
<h1>Todos los usuarios 

@foreach ($suppliers as $supplier)
<ul>
<li>

{{$supplier->suppliername}}
</li>
</ul>

@endforeach
</h1>
@stop