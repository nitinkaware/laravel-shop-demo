<?php

namespace App\Jobs;

use App\Address;
use App\Http\Requests\AddressRequest;

class UpdateAddress extends CreateAddress {

    private $address;

    /**
     * Create a new job instance.
     *
     * @param Address $address
     * @param $pinCode
     * @param $locality
     * @param $name
     * @param $textAddress
     * @param $mobile
     * @param $isDefault
     */
    public function __construct(Address $address, $pinCode, $locality, $name, $textAddress, $mobile, $isDefault)
    {
        $this->address = $address;

        parent::__construct($pinCode, $locality, $name, $textAddress, $mobile, $isDefault);
    }

    public static function fromRequest(AddressRequest $request)
    {
        return new static(
            $request->address(),
            $request->pinCode(),
            $request->locality(),
            $request->name(),
            $request->textAddress(),
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
        $responseJson = $this->getStateCity();

        $this->markAsDefaultIfNeeded();

        return tap($this->address)->update([
            'pin_code'   => $this->pinCode,
            'town'       => $this->locality,
            'distinct'   => $responseJson['city'] ?? '',
            'state'      => $responseJson['stateName'] ?? '',
            'state_code' => $responseJson['state'] ?? '',
            'name'       => $this->name,
            'address'    => $this->textAddress,
            'mobile'     => $this->mobile,
            'is_default' => $this->isDefault,
        ]);
    }
}
