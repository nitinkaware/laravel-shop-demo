<?php

namespace App\Jobs;

use Zttp\PendingZttpRequest;

final class FetchStateCityByPin {

    private $pinCode;

    private $apiLink = 'https://www.myntra.com/myntapi/pincode/';

    public function __construct($pinCode)
    {
        $this->pinCode = $pinCode;
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        return (new PendingZttpRequest())
            ->get($this->apiLink . '/' . $this->pinCode)
            ->json();
    }
}
