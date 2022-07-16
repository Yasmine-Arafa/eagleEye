@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 mx">
                <div class="card-header text-center"><strong>{{ __('Admin Login') }}</strong></div>

                <div class="card-body">

                    {{-- <form method="POST" action="{{ route('login') }}">
                        @csrf --}}
                        {!! Form::open(['action' => 'authController@adminauth','method'=> 'POST']) !!}

                        <div class="form-group row">

                            {{Form::label('username','Username',['class' => 'col-md-4 col-form-label text-md-right' ])}}
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> --}}


                            <div class="col-md-6">
                                {{Form::text('username','',['class'=> 'form-control'])}}

                                {{-- <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus> --}}


                                {{-- @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{Form::label('password','Password',['class' => 'col-md-4 col-form-label text-md-right' ])}}

                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-6">
                                {{Form::password('password',['class'=> 'form-control'])}}

                                {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}

                                @isset($error)
                                <div class=" mx-auto">
                                    <small class="text-center text-danger">
                                        <strong>{{ $error }}</strong>
                                    </small>
                                </div>
                                @endisset

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {{Form::submit('Login',['class'=> 'btn btn-primary'])}}
                                {!!Form::close()!!}

                                {{-- <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button> --}}

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


        {{-- <h1 class="text-center mt-5">Welcome to Eagle Eye</h1>
        <img class="d-block mx-auto" width="500" height="500" src="/storage/eagle-eye.png" alt="Eagle-Eye" > --}}
