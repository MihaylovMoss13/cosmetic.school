<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Library\ApiHelpers;

use App\Models\Category;

use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use ApiHelpers; // <---- Использование трейта apiHelpers

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Category::find('categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->isAdmin($request->user()) || $this->isManager($request->user())) {
            $validator = Validator::make(
                $request->all(),
                [
                    'title'     => ['required'],
                    'slug'      => ['required']
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->messages(),
                ], 422);
            }

            $category = Category::create([
                'title' => $request->title,
                'slug'  => $request->slug
            ]);
            
            return $this->onSuccess($category, 'Категория успешно добавлена', 201);
        }
        return $this->onError(401, 'У вас нет прав для создания категории');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();
        if ($this->isAdmin($user) || $this->isManager($user)) {
            $category = Category::find($id);
            $category->title = $request->title;
            $category->slug  = $request->slug;
            $category->save();

            return [
                "message" => "Категория успешно изменена"
            ];
        }
        return $this->onError(401, 'У вас нет прав для изменения клиента');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($this->isAdmin($request->user())) {
            Category::destroy($id);

            return ["message" => "Категория успешно удалена"];
        }
        return $this->onError(401, 'У вас нет прав для удаления категорий');
    }
}
