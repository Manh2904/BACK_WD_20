<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest{
  /**
   * Show error request
   *
   * @param $listError
   * @return mixed
   */
  public function error($listError)
  {
    $errors = null;
    foreach ($listError as $key => $value) {
        $errors .= is_array($value) ? implode(',', $value) . "<br>": $value ;
    }
    throw new HttpResponseException(response()->json(['error' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY));
  }
}
?>
