@extends('layouts.search')

@section('tabs')
  <li class="active">
    <a href="{{URL::to('upcoming/packages')}}" title="Últimos paquetes registrados">
      <span class="round-tabs one">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span> 
    </a>
  </li>

  <li>
    <a href="{{URL::to('upcoming/trips')}}" title="Últimos viajes registrados">
      <span class="round-tabs two">
        <i class="glyphicon glyphicon-plane"></i>
      </span>
    </a>
  </li>
@stop

@section('tab-content')

<div class="tab-pane fade in active" id="home">
  <div class="col-md-12">
    <h1>Últimos paquetes registrados</h1><br>
    <ul class="event-list">
      @foreach($packs as $pack)
        <li id="{{$pack->id}}" class="package">
          <time datetime="{{$pack->sending_date}}">
            <span class="day">{{$pack->sending_date->day}}</span>
            <span class="month">{{$pack->sending_date->formatLocalized('%b')}}</span>
          </time>
          @if($pack->picture)
            <img src="{{ asset($pack->picture) }}" />
          @else
            <img src="{{ asset('img/default_img.png') }}" />
          @endif

          <div class="info">
            <h2 class="title">{{ $pack->title }}</h2>
            <p class="desc">
              <span placeid="city-{{ $pack->from_city }}"></span>, 
              <span placeid="state-{{ $pack->from_city }}"></span>, 
              <span placeid="country-{{ $pack->from_city }}"></span> > 
              <span placeid="city-{{ $pack->to_city }}"></span>, 
              <span placeid="state-{{ $pack->to_city }}"></span>, 
              <span placeid="country-{{ $pack->to_city }}"></span>
              <input type="hidden" placeid="placeid" value="{{ $pack->from_city }}">
              <input type="hidden" placeid="placeid" value="{{ $pack->to_city }}">
            </p>
            <p class="desc">Peso: {{ $pack->weight }} kg, Tamaño: {{ $pack->size }}</p>
             
            <ul>
              <a href="../package/details/{{ $pack->id }}"><li style="width:100%;">Ver detalles</li></a>
            </ul>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<div class="clearfix"></div>

{{ $packs->links() }}
@endsection
