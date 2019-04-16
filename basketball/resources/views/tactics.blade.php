@extends('layouts.app')

@section('content')
    <div class="container" id="tactics-page">
        <tactics :tactic-types="{{ json_encode($tacticTypes) }}" :team="{{ json_encode($team) }}" :opponent="{{ json_encode($opponent) }}"></tactics>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/tactics.js') }}" defer></script>
@endsection