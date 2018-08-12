@extends('layouts.app')

@section('content')
    <h1>Create Run Log</h1>
    {!! Form::open(['action' => 'RunLogController@store','method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Run Title')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title your Run!'])}}
        </div>
        <div class="form-group">
                {{Form::label('body','Run Description')}}
                {{Form::textarea('body','',['id' => 'article-ckeditor', 'class' => 'form-control','placeholder' => 'Describe your Run!'])}}
        </div>
        <div class="form-group">
                {{Form::label('run_time','Run Time')}}
                {{Form::number('run_time','',['class' => 'form-control','placeholder' => 'How fast was your run? (in seconds)'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection