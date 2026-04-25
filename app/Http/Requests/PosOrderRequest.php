<?php

namespace App\Http\Requests;

use App\Enums\Activity;
use App\Enums\OrderType;
use App\Rules\ValidJsonOrder;
use Dipokhalder\Settings\Facades\Settings;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\PosPaymentMethod;

class PosOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'token'               => ['required', 'numeric'],
            'customer_id'         => ['required', 'numeric'],
            'branch_id'           => ['required', 'numeric'],
            'subtotal'            => ['required', 'numeric'],
            'discount'            => ['nullable', 'numeric'],
            'dining_table_id' => request('order_type') === OrderType::DINING_TABLE ? [
                'required',
                'numeric'
            ] : ['nullable'],
            'total'               => ['required', 'numeric'],
            'order_type'          => ['required', 'numeric'],
            'is_advance_order'    => ['required', 'numeric'],
            'delivery_time'       => ['nullable'],
            'source'              => ['required', 'numeric'],
            'items'               => ['required', 'json', new ValidJsonOrder],
            'pos_payment_method'  => ['required', 'numeric'],
            'pos_payment_note'    => request('pos_payment_method') === PosPaymentMethod::CARD || request('pos_payment_method') === PosPaymentMethod::MOBILE_BANKING || request('pos_payment_method') === PosPaymentMethod::OTHER ? (request('pos_payment_method') === PosPaymentMethod::CARD ? ['required', 'numeric', 'min_digits:4', 'max_digits:4'] : ['required', 'string']) : ['nullable', 'string'],
            'pos_received_amount' => request('pos_payment_method') === PosPaymentMethod::CASH ? ['required', 'numeric'] : ['nullable', 'numeric'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (request('order_type') == OrderType::DELIVERY && Settings::group('order_setup')->get("order_setup_delivery") == Activity::DISABLE) {
                $validator->errors()->add('order_type', trans('all.message.order_type_disabled'));
            } else if (request('order_type') == OrderType::TAKEAWAY && Settings::group('order_setup')->get("order_setup_takeaway") == Activity::DISABLE) {
                $validator->errors()->add('order_type', trans('all.message.order_type_disabled'));
            } else if (blank(request('order_type'))) {
                $validator->errors()->add('order_type', trans('all.message.order_type_disabled'));
            }
            if (request('pos_payment_method') == PosPaymentMethod::CASH && ((float)request('total') > (float)request('pos_received_amount'))) {
                $validator->errors()->add('pos_received_amount', trans('all.message.received_amount_invalid'));
            }
        });
    }

    public function messages()
    {
        return [
            'pos_payment_note.required'    => request('pos_payment_method') == PosPaymentMethod::CARD ? trans('all.message.pos_payment_note_card') : (request('pos_payment_method') == PosPaymentMethod::MOBILE_BANKING ? trans('all.message.pos_payment_note_mobile') : trans('all.message.pos_payment_note_other')),
            'pos_payment_note.min_digits'  => trans('all.message.pos_payment_note_min'),
            'pos_payment_note.max_digits'  => trans('all.message.pos_payment_note_max'),
            'pos_received_amount.required' => trans('all.message.pos_received_amount_required'),
            'dining_table_id.required'     => trans('all.message.dining_table_id_required')
        ];
    }
}
