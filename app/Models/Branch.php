<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = "branches";
    protected $fillable = ['name', 'branch_code', 'shop_name', 'bank_account_no', 'bank_acq_id', 'bank_transfer_info', 'vietqr_client_id', 'vietqr_api_key', 'email', 'phone', 'latitude', 'longitude', 'city', 'state', 'zip_code', 'address', 'status'];
    protected $casts = [
        'id'                  => 'integer',
        'name'                => 'string',
        'branch_code'         => 'string',
        'shop_name'           => 'string',
        'bank_account_no'     => 'string',
        'bank_acq_id'         => 'string',
        'bank_transfer_info'  => 'string',
        'vietqr_client_id'    => 'string',
        'vietqr_api_key'      => 'string',
        'email'               => 'string',
        'phone'               => 'string',
        'latitude'            => 'string',
        'longitude'           => 'string',
        'city'                => 'string',
        'state'               => 'string',
        'zip_code'            => 'string',
        'address'             => 'string',
        'status'              => 'integer',
    ];
}
