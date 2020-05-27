@extends('layout')

@section('titel','login')
@section('body')

<div class="container">
    <!-- error bag msg -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- error bag msg end -->

    {{-- start --}}
    @if ($message = Session::get('reg'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- end -->

    @if (!Session::get('success'))
    <form action='login' method="POST" class="mt-5 col-12">
        @csrf

        <div class="form-group">
            <label for="">Emial</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Enter your Email" vlaue="{{old('email')}}">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="text" name="password" id="" class="form-control" placeholder="Enter password">
        </div>

        <button type="submit" class="btn btn-info">Submit</button>
    </form>
    @else
    <h2>plese logout first</h2>
    @endif
</div>
@endsection
