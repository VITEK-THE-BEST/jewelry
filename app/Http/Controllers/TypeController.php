<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;

/**
 * @authenticated
 * @group Типы изделия
 */
class TypeController extends Controller
{
    /**
     * добавить тип
     */
    public function create(Request $request, Size $size)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $validate['size_id'] = $size->id;

        Type::query()->create($validate);
        return response()->json([]);
    }

    /**
     * Все типы
     */
    public function show()
    {
        $types = Type::query()->all();
        return response()->json($types);
    }

    /**
     * типы по размеру
     *
     * получить типы изделия по размеру
     */
    public function take(Size $size)
    {
        $types = Type::query()->where('size_id', $size->id)->get();
        return response()->json($types);
    }

    /**
     * Обновить данные типа
     *
     * что отправишь то и обновится
     * @urlParam Type id
     */
    public function update(Request $request, Type $type)
    {
        $validate = $request->validate([
            'name' => 'sometimes',
            'image' => 'sometimes',
        ]);

        $type->update($validate);
        return response()->json([]);
    }

    /**
     * Удалить камень
     *
     * удаление камня из БД
     *
     * @urlParam Type id
     */
    public function delete(Type $type)
    {
        $type->delete();
        return response()->json([]);
    }
}
