@extends('layouts.app')

@section('title')
    Affichage Liste des articles
@endsection

@section('content')
    @livewire('article-index')

    {{--    @if($show)--}}
    {{--        @livewire('article-show')--}}
    {{--    @else--}}
    {{--        @livewire('article-index')--}}
    {{--    @endif--}}

@endsection
