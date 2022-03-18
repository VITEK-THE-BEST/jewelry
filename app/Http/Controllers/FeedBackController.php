<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

/**
 * @authenticated
 * @group Отзывы
 *
 * отзывы пользователей
 */
class FeedBackController extends Controller
{
    /**
     * оставить отзыв пользователя
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'feedback' => 'required',
            'score' => 'required|integer',
        ]);

        $validate['user_id'] = auth()->id();

        Feedback::query()->create($validate);
        return response()->json([]);
    }

    /**
     * Отзывы авторизированного пользователя
     */
    public function showAuth()
    {
        $feedbacks = Feedback::query()->where('user_id', auth()->id())->get();
        return response()->json($feedbacks);
    }

    /**
     * Все Отзывы пользователей
     */
    public function showAll()
    {
        $feedbacks = Feedback::query()
            ->with('user')
            ->get();
        return response()->json($feedbacks);
    }

    /**
     * Обновить данные отзыва
     *
     * то что закинул, то и обновится
     * @urlParam Feedback id
     */
    public function update(Request $request, Feedback $feedback)
    {
        $validate = $request->validate([
            'feedback' => 'sometimes',
            'score' => 'sometimes',
        ]);

        $feedback->update($validate);
        return response()->json([]);
    }

    /**
     * Удалить отзыв
     *
     * @urlParam Feedback id
     */
    public function delete(Feedback $feedback)
    {
        $feedback->delete();
        return response()->json([]);
    }
}
