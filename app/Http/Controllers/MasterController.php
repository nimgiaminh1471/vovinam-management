<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display the specified master.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $master = Master::with(['rank', 'degrees.rank', 'rankHistories.previousRank', 'rankHistories.newRank'])
            ->findOrFail($id);

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
