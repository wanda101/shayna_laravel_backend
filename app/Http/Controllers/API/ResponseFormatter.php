<?php

namespace App\Http\Controllers\API;

class ResponseFormatter 
{
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'SUCCESS',
            'message' => null
        ],
        'data' => null
    ];

// kondisi jika sukses
public static function success($data = null, $message = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
    
// kondisi jika gagal
public static function error($data = null, $message = null, $code = 400)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

}
