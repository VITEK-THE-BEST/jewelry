<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

/**
 * @authenticated
 * @group предмет
 */
class ItemController extends Controller
{
    /**
     * заказать товар
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'material_id' => 'required|iteger',
            'type_id' => 'required|iteger',
            'gem_id' => 'required|iteger',
        ]);

        $item = Item::query()->create($validate);
        $item->users()->attach(auth()->user());
        return response()->json([]);
    }

    /**
     * показать все заказы пользователя
     */
    public function show()
    {
        $items = auth()->user()->items()->get();
        return response()->json($items);
    }

    /**
     * Обновить данные заказа
     *
     * что отправишь то и обновится
     * @urlParam Item id
     */
    public function update(Request $request, Item $item)
    {
        $validate = $request->validate([
            'material_id' => 'sometimes|iteger',
            'type_id' => 'sometimes|iteger',
            'gem_id' => 'sometimes|iteger',
        ]);

        $item->update($validate);
        return response()->json([]);
    }

    /**
     * Удалить заказ
     *
     * @urlParam Gem id
     */
    public function delete(Item $item)
    {
        $item->delete();
        return response()->json([]);
    }

}
