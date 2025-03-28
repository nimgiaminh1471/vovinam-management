<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display the specified master.
     *
     * @param  string  $code
     * @return \Illuminate\View\View
     */
    public function show($code)
    {
        $master = Master::with(['rank', 'degrees.rank', 'rankHistories.previousRank', 'rankHistories.newRank'])
            
            ->firstOrFail();

        return view('masters.show', compact('master'));
    }

    /**
     * Display a listing of masters.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $masters = Master::with('rank')->latest()->paginate(10);
        
        return view('masters.index', compact('masters'));
    }
}
