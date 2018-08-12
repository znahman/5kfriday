<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\RunLog;
use App\User;

class RunLogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runlogs = RunLog::all();
        return view('runlogs.index')->with('runlogs',$runlogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('runlogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'run_time' => 'required'
        ]);

        // Create Run Log
        $runlog = new RunLog;
        $runlog->title = $request->input('title');
        $runlog->body = $request->input('body');
        $runlog->run_time = $request->input('run_time');
        $runlog->user_id = auth()->user()->id;
        $runlog->save();

        return redirect('/runlogs')->with('success','Run Log Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $runlog = RunLog::find($id);
        return view('runlogs.show')->with('runlog', $runlog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $runlog = RunLog::find($id);

        // Check for correct user
        if(auth()->user()->id !=$runlog->user_id){
            return redirect('/runlogs')->with('error', 'Unauthorized Page');
        }

        return view('runlogs.edit')->with('runlog', $runlog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'run_time' => 'required'
        ]);

        // Create Run Log
        $runlog = RunLog::find($id);
        $runlog->title = $request->input('title');
        $runlog->body = $request->input('body');
        $runlog->run_time = $request->input('run_time');
        $runlog->save();

        return redirect('/runlogs')->with('success','Run Log Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $runlog = RunLog::find($id);

        // Check for correct user
        if(auth()->user()->id !=$runlog->user_id){
            return redirect('/runlogs')->with('error', 'Unauthorized Page');
        }
        
        $runlog->delete();

        return redirect('/runlogs')->with('success','Run Log Removed');
    }

    public function getRunChart(){
        $lava = new Lavacharts;

        $runs = $lava->DataTable();
        $user_id = auth()->user()->id;
        
        $db_data = RunLog::select("created_at as 0", "run_time as 1")->where('user_id', $user_id)->get()->toArray();
        
        $runs->addDateColumn('Date')
            ->addNumberColumn('Run Times')
            ->addRows($db_data);

        $lava->LineChart('Runs', $runs, [
            'title' => '5k Friday Runs Log',
            'hAxis' => [
                'title' => 'Date'
            ],
            'vAxis' => [
                'title' => 'Run Time (s)'
            ]
        ]);
        return view('graph', ['lava' => $lava]);
        
    }
}
