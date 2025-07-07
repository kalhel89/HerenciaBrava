<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toro;

class RankingController extends Controller
{
     public function index()
    {
        $toros = Toro::orderByDesc('ranking')->get();
        return view('ranking.index', compact('toros'));
    }
}
