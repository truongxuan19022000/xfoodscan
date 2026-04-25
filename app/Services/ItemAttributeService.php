<?php

namespace App\Services;


use Exception;
use App\Models\ItemAttribute;
use App\Models\ItemVariation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PaginateRequest;
use App\Libraries\QueryExceptionLibrary;
use App\Http\Requests\ItemAttributeRequest;
use App\Services\ItemService;

class ItemAttributeService
{
    public $itemAttribute;
    protected $itemAttributeFilter = [
        'name',
        'status'
    ];

    /**
     * @throws Exception
     */
    public function list(PaginateRequest $request)
    {
        try {
            $requests    = $request->all();
            $method      = $request->get('paginate', 0) == 1 ? 'paginate' : 'get';
            $methodValue = $request->get('paginate', 0) == 1 ? $request->get('per_page', 10) : '*';
            $orderColumn = $request->get('order_column') ?? 'id';
            $orderType   = $request->get('order_type') ?? 'desc';

            return ItemAttribute::where(function ($query) use ($requests) {
                foreach ($requests as $key => $request) {
                    if (in_array($key, $this->itemAttributeFilter)) {
                        $query->where($key, 'like', '%' . $request . '%');
                    }
                }
            })->orderBy($orderColumn, $orderType)->$method(
                $methodValue
            );
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            throw new Exception(QueryExceptionLibrary::message($exception), 422);
        }
    }

    /**
     * @throws Exception
     */
    public function store(ItemAttributeRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->itemAttribute = ItemAttribute::create($request->validated());
            });
            return $this->itemAttribute;
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            DB::rollBack();
            throw new Exception(QueryExceptionLibrary::message($exception), 422);
        }
    }

    /**
     * @throws Exception
     */
    public function update(ItemAttributeRequest $request, ItemAttribute $itemAttribute): ItemAttribute
    {
        try {
            DB::transaction(function () use ($request, $itemAttribute) {
                $itemAttribute->update($request->validated());
            });
            // Clear cache for all items using this attribute
            $itemIds = ItemVariation::where('item_attribute_id', $itemAttribute->id)->pluck('item_id')->unique();
            foreach ($itemIds as $itemId) {
                ItemService::clearItemCaches($itemId);
            }
            return $itemAttribute;
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            DB::rollBack();
            throw new Exception(QueryExceptionLibrary::message($exception), 422);
        }
    }

    /**
     * @throws Exception
     */
    public function destroy(ItemAttribute $itemAttribute)
    {
        try {
            // Find affected items before deleting
            $itemIds = ItemVariation::where('item_attribute_id', $itemAttribute->id)->pluck('item_id')->unique();
            DB::transaction(function () use ($itemAttribute) {
                $itemAttribute->delete();
            });
            // Clear cache for all affected items
            foreach ($itemIds as $itemId) {
                ItemService::clearItemCaches($itemId);
            }
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            DB::rollBack();
            throw new Exception(QueryExceptionLibrary::message($exception), 422);
        }
    }

    /**
     * @throws Exception
     */
    public function show(ItemAttribute $itemAttribute): ItemAttribute
    {
        try {
            return $itemAttribute;
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            throw new Exception(QueryExceptionLibrary::message($exception), 422);
        }
    }
}
