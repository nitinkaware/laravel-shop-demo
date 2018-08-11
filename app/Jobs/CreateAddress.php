<?php

namespace App\Jobs;

use App\Http\Requests\AddressRequest;
use Zttp\PendingZttpRequest;

final class CreateAddress {

    private $myntraApiLink = 'https://www.myntra.com/myntapi/pincode/';

    private $pinCode;

    private $locality;

    private $name;

    private $address;

    private $mobile;

    private $isDefault;

    /**
     * Create a new job instance.
     *
     * @param $pinCode
     * @param $locality
     * @param $name
     * @param $address
     * @param $mobile
     * @param $isDefault
     */
    public function __construct($pinCode, $locality, $name, $address, $mobile, $isDefault)
    {
        $this->pinCode = $pinCode;
        $this->locality = $locality;
        $this->name = $name;
        $this->address = $address;
        $this->mobile = $mobile;
        $this->isDefault = $isDefault;
    }

    public static function fromRequest(AddressRequest $request)
    {
        return new static(
            $request->pinCode(),
            $request->locality(),
            $request->name(),
            $request->address(),
            $request->mobile(),
            $request->isDefault()
        );
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        $responseJson = (new PendingZttpRequest())
            ->get($this->myntraApiLink . '/' . $this->pinCode)
            ->json();


        return auth()->user()->addresses()->create([
            'pin_code'   => $this->pinCode,
            'town'       => $responseJson['city'] ?? '',
            'distinct'   => $responseJson['city'] ?? '',
            'state'      => $responseJson['stateName'] ?? '',
            'state_code' => $responseJson['state'] ?? '',
            'name'       => $this->name,
            'address'    => $this->address,
            'mobile'     => $this->address,
            'is_default' => $this->isDefault,
        ]);
    }
}
