@extends('layouts.app')

@section('content')
    <a href="/runlogs" class="btn btn-primary">Back to Run Logs</a>
    <h1>{{$runlog->title}}</h1>
    <div>
        {!!$runlog->body!!}
    </div>
    <small>Completed on {{$runlog->created_at}} by {{$runlog->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $runlog->user_id)
            <a href="/runlogs/{{$runlog->id}}/edit" class="btn btn-secondary">Edit</a>

            {!!Form::open(['action' => ['RunLogController@destroy', $runlog->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection