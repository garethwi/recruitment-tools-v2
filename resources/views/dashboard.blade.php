@extends('layouts.app')
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-12 py-12">
                @if (session()->has('message'))
                    <div x-data="{ open: true }">
                        <div x-show="open"
                             @click="open = false"
                             class="bg-green-400 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif
                <livewire:prospects />
            </div>
        </div>
    </div>
@endsection
