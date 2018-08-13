<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\FetchStateCityByPin;

class PinCodesController extends Controller {

    public function index($pinCode)
    {
        return $this->dispatchNow(new FetchStateCityByPin($pinCode));
    }
}
