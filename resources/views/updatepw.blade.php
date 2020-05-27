
@extends('layout')

@section('titel','Update-Pw')
@section('body')

<div class="container">
    {{-- start --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- end -->

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
              <form class="user" action="updatepwc" method="POST">
                  @csrf

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                   placeholder="Email Address" name="email">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="conpass">
                  </div>
                </div>

                <button class="btn btn-primary btn-user btn-block" type="submit"> Reset Password</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


@endsection
