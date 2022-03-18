<?php

namespace App\Http\Controllers;

use App\Models\Gem;
use Illuminate\Http\Request;


/**
 * @authenticated
 * @group Камни
 */
class GemController extends Controller
{
    /**
     * добавить камень
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        Gem::query()->create($validate);
        return response()->json([]);
    }

    /**
     * Все камни
     *
     * получить все камни из БД
     */
    public function show()
    {
        $gems = Gem::all();
        return response()->json($gems);
    }

    /**
     * Обновить данные камня
     *
     * что отправишь то и обновится
     * @urlParam Gem id
     */
    public function update(Request $request, Gem $gem)
    {
        $validate = $request->validate([
            'name' => 'sometimes',
            'image' => 'sometimes',
        ]);

        $gem->update($validate);
        return response()->json([]);
    }

    /**
     * Удалить камень
     *
     * удаление камня из БД
     *
     * @urlParam Gem id
     */
    public function delete(Gem $gem)
    {
        $gem->delete();
        return response()->json([]);
    }
}
