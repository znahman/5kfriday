@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/runlogs/create" class="btn btn-primary">Create Run Log</a>
                    <a href="/graph" class="btn btn-primary">Chart Results!</a>
                    <h3>Your Run Logs</h3>
                    @if(count($runlogs) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th>Time (s)</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($runlogs as $runlog)
                                <tr>
                                        <td>{{$runlog->title}}</td>
                                        <td>{{$runlog->run_time}}</td>
                                        <td><a href="/runlogs/{{$runlog->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['RunLogController@destroy', $runlog->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
