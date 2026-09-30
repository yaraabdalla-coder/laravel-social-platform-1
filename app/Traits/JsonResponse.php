<?php
namespace App\Traits;

trait JsonResponse
{
    private $responses=[    
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    204 => 'No Content',

    301 => 'Moved Permanently',
    302 => 'Found',
    304 => 'Not Modified',

    400 => 'Bad Request',
    401 => 'Unauthorized',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    408 => 'Request Timeout',
    409 => 'Conflict',
    422 => 'Unprocessable Content',
    429 => 'Too Many Requests',

    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
];


    public function jsonResponse($status,$code,$message='',$data=[])
    {
        $status= $code>=200  && $code<=299 ? 'succses':'fail';
       
        $Response=[
        'status'=>$status,
        'status-message'=> isset($this->responses[$code]) ?  $this->responses[$code]:'',
        'code'=>$code,
        'message'=>$message,
        'data'=>$data,
        ] ;
        return response()->json($Response,$code);
    }
    }
