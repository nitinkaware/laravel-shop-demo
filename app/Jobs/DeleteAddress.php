<?php

namespace App\Jobs;

use App\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteAddress implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Address
     */
    private $address;

    /**
     * Create a new job instance.
     *
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $this->updateDefaultAddress();

        return $this->address->delete();
    }

    private function updateDefaultAddress()
    {
        $userId = $this->address->user_id;

        /** @var Address $address */
        $address = Address::whereUserId($userId)->first();

        if ($address) {
            $address->update(['is_default' => true]);
        }
    }
}
