@extends('layout.header')

@section('content')
    <h2> Movies </h2>
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-6">

{{--        {{dd($films)}}--}}

        @foreach ($films as $film)
            <div class="col mb-3">
                <div class="card">
                    <img src="{{$film["Poster"]}}" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('search_film', ['id' => $film["imdbID"] ]) }}">
                                {{$film["Title"]}}
                            </a>
                        </h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$film["Year"]}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
