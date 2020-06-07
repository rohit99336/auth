@extends('layout')

@section('titel','home')
@section('body')


        <h1 style="color: azure;" class="h1 center">welcome to home</h1>
            {{-- start --}}
            @if ($message = Session::get('action'))
                <div class="alert alert-danger col-6 ml-3 mt-5">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <!-- end -->

@endsection
