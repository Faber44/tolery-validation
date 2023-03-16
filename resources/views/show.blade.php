@extends('layouts.app')

@section('title')
    Affichage article
@endsection

@section('content')
{{--    @dd($articleId);--}}
    @livewire('article-show', ['articleId' => $articleId])
@endsection
