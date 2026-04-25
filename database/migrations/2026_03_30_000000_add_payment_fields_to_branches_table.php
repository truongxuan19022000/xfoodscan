<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->string('branch_code')->nullable()->after('name');
            $table->string('shop_name')->nullable()->after('branch_code');
            $table->string('bank_account_no')->nullable()->after('shop_name');
            $table->string('bank_acq_id')->nullable()->after('bank_account_no');
            $table->string('bank_transfer_info')->nullable()->after('bank_acq_id');
            $table->string('vietqr_client_id')->nullable()->after('bank_transfer_info');
            $table->string('vietqr_api_key')->nullable()->after('vietqr_client_id');
        });
    }

    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn([
                'branch_code',
                'shop_name',
                'bank_account_no',
                'bank_acq_id',
                'bank_transfer_info',
                'vietqr_client_id',
                'vietqr_api_key',
            ]);
        });
    }
};
