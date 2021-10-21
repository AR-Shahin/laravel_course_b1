<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function responseOk($data = [], $mgs = 'Data Retrieve Successfully!', $code = 200)
    {
        return response()->json([
            'success' => true,
            'code' => $code,
            'message' => $mgs,
            'data' => $data
        ]);
    }
    public function responseErr($mgs = 'Something went Wrong!', $code = 404)
    {
        return response()->json([
            'success' => false,
            'code' => $code,
            'message' => $mgs,
        ]);
    }
}
