@extends('layouts.search')

@section('tabs')
  <li>
    <a href="{{URL::to('upcoming-packages')}}" title="Últimos paquetes registrados">
      <span class="round-tabs one">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span> 
    </a>
  </li>

  <li>
    <a href="{{URL::to('upcoming-trips')}}" title="Últimos viajes registrados">
      <span class="round-tabs two">
        <i class="glyphicon glyphicon-plane"></i>
      </span>
    </a>
  </li>

  <li class="active">
    <a href="#" title="Resultados de la búsqueda">
      <span class="round-tabs three">
        <i class="glyphicon glyphicon-search"></i>
      </span>
    </a>
  </li>
@stop

@section('tab-content')

<div class="tab-pane fade in active" id="search">
  <div class="col-md-12">
    
    @if($packs) 
      <h1>Resultados de la búsqueda: {{$packs->getTotal()}}</h1><br>
      <ul class="event-list">
        @foreach($packs as $pack)
          <li id="{{$pack->id}}" class="package">
            <time datetime="{{$pack->sending_date}}">
              <span class="day">{{$pack->sending_date->day}}</span>
              <span class="month">{{$pack->sending_date->formatLocalized('%b')}}</span>
            </time>
            @if($pack->user->picture)
              <img src="{{ $pack->user->picture }}" />
            @else
              <img src="https://s3.amazonaws.com/FringeBucket/default-user.png" />
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
                <a href="package_details/{{ $pack->id }}"><li style="width:100%;"><span class="fa fa-user-plus"></span></li></a>
              </ul>
            </div>
          </li>
        @endforeach
      </ul>

    @elseif ($trips)
      <h1>Resultados de la búsqueda: {{$trips->getTotal()}}</h1><br>
      <ul class="event-list">
        @foreach($trips as $trip)
          <li id="{{$trip->id}}">
            <time datetime="{{$trip->departure_date}}">
              <span class="day">{{$trip->departure_date->day}}</span>
              <span class="month">{{$trip->departure_date->formatLocalized('%b')}}</span>
            </time>
            @if($trip->user->picture)
              <img src="{{ $trip->user->picture }}" />
            @else
              <img src="https://s3.amazonaws.com/FringeBucket/default-user.png" />
            @endif

            <div class="info">
              <h2 class="title">
                <span placeid="city-{{ $trip->departure_city }}"></span>, 
                <span placeid="state-{{ $trip->departure_city }}"></span>, 
                <span placeid="country-{{ $trip->departure_city }}"></span> > 
                <span placeid="city-{{ $trip->arrival_city }}"></span>, 
                <span placeid="state-{{ $trip->arrival_city }}"></span>, 
                <span placeid="country-{{ $trip->arrival_city }}"></span>
                <input type="hidden" placeid="placeid" value="{{ $trip->departure_city }}">
                <input type="hidden" placeid="placeid" value="{{ $trip->arrival_city }}">
              </h2>
              <p class="desc">Modo de viaje: {{ $trip->transport }}</p>
              <p class="desc">Espacio disponible: {{ $trip->max_weight }} kg, Tamaño: {{ $trip->max_size }}</p>
               
              <ul>
                <a href="trip_details"><li style="width:100%;"><span class="fa fa-suitcase"></span></li></a>
              </ul>
            </div>
          </li>
        @endforeach
      </ul>

    @endif

  </div>
</div>

<div class="clearfix"></div>
@if($packs)
  {{ $packs->links() }}
@elseif ($trips)
  {{ $trips->links() }}
@endif

@stop
