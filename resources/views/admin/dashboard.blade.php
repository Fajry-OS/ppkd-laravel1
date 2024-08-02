@extends('dashboard')
@section('content')
    {{ Auth::user()->level->nama_level }}
@endsection
