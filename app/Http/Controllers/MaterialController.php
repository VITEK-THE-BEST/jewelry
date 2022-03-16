<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

/**
 * @authenticated
 * @group Материалы
 */
class MaterialController extends Controller
{
    /**
     * добавить материал
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        Material::query()->create($validate);
        return response()->json([]);
    }

    /**
     * Все материалы
     *
     * получить все материалы из БД
     */
    public function show()
    {
        $material = Material::query()->all();
        return response()->json($material);
    }

    /**
     * Обновить данные материала
     *
     * что отправишь то и обновится
     * @urlParam Material id
     */
    public function update(Request $request, Material $material)
    {
        $validate = $request->validate([
            'name' => 'sometimes',
            'image' => 'sometimes',
        ]);

        $material->update($validate);
        return response()->json([]);
    }

    /**
     * Удалить материал
     *
     * удаление материала из БД
     *
     * @urlParam Material id
     */
    public function delete(Material $material)
    {
        $material->delete();
        return response()->json([]);
    }
}
