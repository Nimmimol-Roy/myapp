<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RequestLogController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function logdata()
    {
        $logs = DB::table('request_logs')->orderBy('created_at', 'desc')->paginate(20);
        return view('logs.index', compact('logs'));
    }

    public function clear()
    {
        DB::table('request_logs')->truncate();  
        return redirect()->route('logs.index')->with('success', 'All logs cleared.');
    }
}
?>