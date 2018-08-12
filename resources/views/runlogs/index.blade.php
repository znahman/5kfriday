@extends('layouts.app')

@section('content')
    <h1>Run Logs</h1>
    @if(count($runlogs) > 0)
        <table class ="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Time</th>
                    <th scope="col">Completed On</th>
                    <th scope="col">User</th>
                </tr>
            </thead>
            <tbody>
                @foreach($runlogs as $runlog)
                    <tr>
                        <td><a href="/runlogs/{{$runlog->id}}">{{$runlog->title}}</a></td>
                        <td>{{$runlog->run_time}}</td>
                        <td>{{$runlog->created_at}}</td>
                        <td>{{$runlog->user->name}}</td>
                    </tr>  
                @endforeach
            </tbody>
        </table>
    @else
        <p>No run logs found!</p>
    @endif
@endsection