@extends('layouts.app')

@section('content')
    <div class="table-container d-flex flex-column align-items-center">
        <h2>{{ $content['h2'] }}</h2>
        @table($content['table'])
    </div>
@endsection
