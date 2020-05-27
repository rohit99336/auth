
@extends('layout')

@section('titel','registration')
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

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                {{-- start form --}}
                @if (!Session::get('success'))
                    <form class="user" action="regc" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="First Name" name="firstname" vlaue="{{old('firstname')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                placeholder="Last Name" name="lastname" vlaue="{{old('lastname')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Contry" name="contry" vlaue="{{old('contry')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                placeholder="state" name="state" vlaue="{{old('state')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="block" name="block" vlaue="{{old('block')}}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                placeholder="Pincode" name="pin" vlaue="{{old('pin')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address" name="email" vlaue="{{old('email')}}">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                            </div>
                            <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="conpass">
                            </div>
                        </div>

                        <button class="btn btn-primary btn-user btn-block" type="submit"> Register Account</button>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgetpw">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="logon">Already have an account? Login!</a>
                        </div>

                        @else
                        <h2>plese logout first</h2>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
