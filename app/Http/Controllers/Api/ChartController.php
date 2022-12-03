<?php

namespace App\Http\Controllers\Api;

use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function __invoke()
    {
        $result = Doctor::with('specializations', 'messages', 'stars', 'reviews', 'plans')->get();
        $success = true;

        return response()->json(compact('result', 'success'));
    }
}
