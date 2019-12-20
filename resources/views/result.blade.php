@extends('layout.header')

@section('content')
    <div class="container">
        <h2 class="text-center">{{$film->title}} ({{$film->year}}) </h2>
        <div class="row">
            <div class="col-4 item-photo">
                <img src="{{$film->poster}}" />
            </div>
            <div class="col-8">
                    <p><b>Title :</b> {{$film->title}}</p>
                    <p><b>Genre :</b></p>
                    <ul>
                        @foreach (json_decode($film->genre, true) as $genre)
                            <li>{{$genre}}</li>
                        @endforeach
                    </ul>
                    <p><b>Year :</b> {{$film->year}}</p>
                    <p><b>Plot :</b> {{$film->plot}}</p>
                    <p><b>Actors :</b></p>
                    <ul>
                        @foreach (json_decode($film->actors, true) as $actor)
                            <li>{{$actor}}</li>
                        @endforeach
                    </ul>
                <p><b>Director :</b> {{$film->director}}</p>
                <p><b>Runtime :</b> {{$film->runtime}}</p>
            </div>
        </div>
    </div>
@endsection
