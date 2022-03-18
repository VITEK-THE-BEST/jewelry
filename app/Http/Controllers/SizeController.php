<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;


/**
 * @authenticated
 * @group Размер изделия
 */
class SizeController extends Controller
{
    /**
     * Добавить размер
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'size' => 'required',
        ]);

        Size::query()->create($validate);
        return response()->json([]);
    }

    /**
     * Все размеры
     */
    public function show()
    {
        $sizes = Size::all();
        return response()->json($sizes);
    }

    /**
     * Обновить данные размера
     *
     * что отправишь то и обновится
     * @urlParam Size id
     */
    public function update(Request $request,Size $size)
    {
        $validate = $request->validate([
            'size' => 'sometimes',
        ]);

        $size->update($validate);
        return response()->json([]);
    }

    /**
     * Удалить размер
     *
     * @urlParam Type id
     */
    public function delete(Size $size)
    {
        $size->delete();
        return response()->json([]);
    }
}
