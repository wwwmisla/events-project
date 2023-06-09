@extends('layouts.main')  

@section('title', 'MW Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um Evento</h1>
        <form action="/" method="GET">
            <input type="text" name="search" id="search" class="form-control shadow-none" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card">
                        <img src="/img/events/{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}">
                    <div class="card-body">
                        <p class="card-date">
                            {{ date('d/m/Y', strtotime($event->date)) }}   
                        </p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participantes">Participantes: {{ count($event->users) }}</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-outline-ligth shadow-none">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($events) == 0 && $search)
            <div class="search-error">
                <p>Não foi possível encontrar nenhum evento com <strong> {{ $search }} </strong>!</p>
                <a href="/" class="btn btn-outline-light">Ver eventos disponíveis</a>
            </div>
            @elseif(count($events) == 0)
                <p>Não há eventos disponíveis.</p>
            @endif
        </div>
    </div>

@endsection