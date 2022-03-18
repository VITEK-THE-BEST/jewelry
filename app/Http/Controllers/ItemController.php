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
            'material_id' => 'required|integer',
            'type_id' => 'required|integer',
            'gem_id' => 'required|integer',
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
            'material_id' => 'sometimes|integer',
            'type_id' => 'sometimes|integer',
            'gem_id' => 'sometimes|integer',
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
        $item->users()->detach(auth()->user());
        $item->delete();
        return response()->json([]);
    }

}
