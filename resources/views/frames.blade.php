@extends('layouts.app')

@section('content')

<div id="" class=" pt-2">

    <ul class="breadcrumb">
        <li class="mx-auto d-block">
            <a href="{{ route('frames.index')}}" class="text-decoration-none"><h4 class="text-dark d-inline"> Frames / </h4></a>
            <a href="{{ route('faces.index')}}" class="text-decoration-none"><h4 class=" text-dark d-inline"> Faces </h4> </a>
        </li>
    </ul>
	<hr class="soft mt-0"/>

    <div class="flyout p-2 " style=" background-color: #fff;  min-height: 384px;" >

        <!-------------- Start Block View  ------------------------->
        <div class="row">

        @foreach ($frames as $frame)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-2">

            <!-- frame card -->
            <a href="{{ route('frames.show',['frame'=>$frame->id])}}" class="text-decoration-none text-dark">

            <div class="m-auto" style="height:auto; width: 100%; box-shadow: 1px 1px 5px 1px rgb(0 0 0 / 10%);">

                <div class="container p-0 m-auto w-100 h-100">

                    <div class="pb-1 pt-3 pr-3 pl-3 w-100 m-auto row" >
                        <img src="/storage/events/frames/{{$frame->frame_name}}" style="height:220px; width: 220px;" class="m-auto d-block" alt="No Available Image">
                    </div>

                    <div class="w-100 p-2 text-center mx-auto row">
                        <a class="text-decoration-none pb-1 text-dark col-12" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ; " href="{{ route('frames.show',['frame'=>$frame->id])}}">{{\Illuminate\Support\Str::limit($frame->frame_name, 20, $end='...')}}</a>
                        <a class="text-decoration-none text-secondary col-12" ><h6 class="small" >{{$frame->happened_at}}</h6></a>
                    </div>


                    <div class="h-auto pb-3 pr-3 pl-3">
                        {!!Form::open(['action'=> ['adminFrameController@destroy', $frame->id],'method' => 'POST'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete', ['class'=> 'btn btn-danger mx-auto d-block'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach

</div>
        <!-------------- End Block View  ------------------------->
			<br class="clr"/>

</div>
</div>

@endsection
