<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser {

  public function successResponse($data, $code = Response::HTTP_OK)
  {
    return response()->json(['data' => $data, 'Withdraw' => 1], $code);
  }

  public function validResponse($data, $code = Response::HTTP_OK)
  {
  return response()->json(['data' => $data], $code);
  }

  public function errorResponse($message, $code)
  {

    return response()->json(['error' => $message, 'Withdraw' => 1, 'code' => $code], $code);
   
  }

  public function errorMessage($message, $code)
{
   return response($message, $code)->header('Content-Type','application/json');
}
}