@extends('layouts.app')
@section('header')
    {{ 'Show/Enrich Prospect List "' . $list->name . '"' }}
@endsection
@section('content')
    <livewire:show-prospect-list :list="$list->id"/>
@endsection
