@extends('custom-layouts.admin-layout')

@section('title', 'Cv')

@section('mainContent')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div>
    @php
        echo $cv->title;
    @endphp
</div>
@endsection
