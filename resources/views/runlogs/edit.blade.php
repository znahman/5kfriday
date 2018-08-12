@extends('layouts.app')

@section('content')
    <h1>Edit Run Log</h1>
    {!! Form::open(['action' => ['RunLogController@update',$runlog->id],'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Run Title')}}
            {{Form::text('title', $runlog->title,['class' => 'form-control','placeholder' => 'Title your Run!'])}}
        </div>
        <div class="form-group">
                {{Form::label('body','Run Description')}}
                {{Form::textarea('body', $runlog->body,['id' => 'article-ckeditor', 'class' => 'form-control','placeholder' => 'Describe your Run!'])}}
        </div>
        <div class="form-group">
                {{Form::label('run_time','Run Time')}}
                {{Form::number('run_time', $runlog->run_time,['class' => 'form-control','placeholder' => 'How fast was your run? (in seconds)'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection