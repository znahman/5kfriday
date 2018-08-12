@extends('layouts.app')

@section('content')
    <h1>Your Results:</h1>
    <div id="runs-div" style="height:400px;width:1000px;border:1px solid black"></div>
    <?= $lava->render('LineChart', 'Runs', 'runs-div') ?>
@endsection
