@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 mx">

                <div class="card-header text-center"><strong>{{ __('Add new guard') }}</strong></div>

                <div class="card-body">

                {!! Form::open(['action' => 'userAuthController@add','method'=> 'POST']) !!}

                <div class="form-group">
                    {{Form::label('name','Guard Name')}}
                    {{Form::text('name','',['class'=> 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('username','Guard Username')}}
                    {{Form::text('username','',['class'=> 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('password','Guard Password')}}
                    {{Form::password('password',['class'=> 'form-control'])}}
                </div>

                <div class="mt-4 mb-2">
                    {{Form::submit('Submit',['class'=> 'btn btn-primary d-flex m-auto '])}}
                    {!!Form::close()!!}
                </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection
