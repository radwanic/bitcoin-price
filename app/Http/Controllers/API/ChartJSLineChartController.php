<?php

namespace App\Http\Controllers\API;

use App\Adaptors\CoindeskChartJS;
use App\Charts\ChartJS;
use App\Http\Controllers\Controller;
use App\Services\Coindesk;
use Illuminate\Validation\ValidationException;

class ChartJSLineChartController extends Controller
{
   public function __invoke(CoindeskChartJS $coindeskChartJS, Coindesk $coindesk, ChartJS $chartJS)
   {
       $requestData = validator(request()->all(), [
           'from' => ['nullable', 'required_with:to', 'date_format:Y-m-d'],
           'to' => ['nullable', 'required_with:from', 'date_format:Y-m-d', 'after:from']
       ])->validate();

       if(isset($requestData['from']) && isset($requestData['to'])) {
           $coindesk->range(@$requestData['from'], @$requestData['to']);
       }

       $chartJS->setAttribute('type', 'line');

       try {
           return response($coindeskChartJS->format($coindesk, $chartJS)->toArray());
       }
       catch (\Exception $exception) {
           throw ValidationException::withMessages([$exception->getMessage()]);
       }
   }
}
