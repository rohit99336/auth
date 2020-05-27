@extends('layout')

@section('titel','forgetpw')
@section('body')

<div class="container">

    @if(Session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
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

    <div class="card o-hidden border-0 shadow-lg my-5 col-4 col-2 col-6" >
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
            <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4  mb-3">Forget password</h1>
                </div>
                {{-- start form --}}
                <form class="user" action="forgetc" method="POST">
                    @csrf

                    <div class="form-group  mb-3 ">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                        placeholder="Email Address" name="email">
                    </div>

                    <button class="btn btn-primary btn-user btn-block  mb-3" type="submit">Reset Password</button>

                    <hr>

                    <div class="text-center  mb-3">
                    <a class="small" href="logon">Already have an account? Login!</a>
                    </div>
                    {{-- end form --}}
                </form>
            </div>
        </div>
    </div>



@endsection
