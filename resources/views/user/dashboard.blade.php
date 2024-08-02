@extends('dashboard')
@section('content')
    tes 
    {{ Auth::user()->level->nama_level }}
@endsection
