@extends('layouts.app')
@section('header')
    {{ isset($list) ? 'Edit Prospect List "' . $list->name . '"' : 'Create Prospect List' }}
@endsection
@section('content')
    @if (isset($list))
        <livewire:edit-prospect :list="$list->id"/>
    @else
        <livewire:edit-prospect/>
    @endif
@endsection
