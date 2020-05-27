@extends('layout')

@section('titel','home')
@section('body')
    {{-- start --}}
    @if ($message = Session::get('success'))
        {{-- <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div> --}}
    @endif
    <!-- end -->
    @if (!Session::get('success'))
    <h1 style="color: azure">welcome to home</h1>
    @else
    <h2>plese logout first</h2>
    @endif
@endsection
