@extends('layouts.app')

@section('content')
    <div class="form-container d-flex flex-column align-items-center">
        <h2>{{ $content['h2'] }}</h2>
        @form($content['form'])
    </div>
@endsection
