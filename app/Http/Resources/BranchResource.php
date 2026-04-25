<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id"                 => $this->id,
            "name"               => $this->name,
            "branch_code"        => $this->branch_code ?? '',
            "shop_name"          => $this->shop_name ?? '',
            "bank_account_no"    => $this->bank_account_no ?? '',
            "bank_acq_id"        => $this->bank_acq_id ?? '',
            "bank_transfer_info" => $this->bank_transfer_info ?? '',
            "vietqr_client_id"   => $this->vietqr_client_id ?? '',
            "vietqr_api_key"     => $this->vietqr_api_key ?? '',
            "email"              => $this->email === null ? '' : $this->email,
            "phone"              => $this->phone === null ? '' : $this->phone,
            "latitude"           => $this->latitude === null ? '' : $this->latitude,
            "longitude"          => $this->longitude === null ? '' : $this->longitude,
            "city"               => $this->city,
            "state"              => $this->state,
            "zip_code"           => $this->zip_code,
            "address"            => $this->address,
            "status"             => $this->status
        ];
    }
}
