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
        $id = Master::getIdFromCode($code);
        $master = Master::with(['rank', 'degrees.rank', 'rankHistories.previousRank', 'rankHistories.newRank', 'company'])
            ->where('id', $id)
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

    public function getMasterByCode($code)
    {
        $id = Master::getIdFromCode($code);
        $master = Master::with(['rank', 'degrees.rank', 'rankHistories.previousRank', 'rankHistories.newRank', 'company'])
            ->where('id', $id)
            ->first();

        if (!$master) {
            return response()->json(['error' => 'Master not found'], 404);
        }

        return response()->json($master);
    }
}
