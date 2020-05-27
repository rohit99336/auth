@extends('layout')

@section('titel','profile')
@section('body')

<div class="container">
    {{-- start --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- end -->

    @if (Session::get('success'))
        <h2>welocome to pfrofile</h2>
        <h3>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>

        {{-- <form action="logout" method="post">
            @csrf
            <input type="submit" class="btn btn-info" value="logout">
        </form> --}}
    @endif

    </div>
</div>
@endsection
