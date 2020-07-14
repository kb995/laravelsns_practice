@extends('app')

@section('title', 'TOP')

@section('content')
  @include('nav')
  <div class="container">
    @foreach($articles as $article)
        @include('articles.card')
    @endforeach
  </div>
@endsection