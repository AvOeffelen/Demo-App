<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\WorkshopCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @return JsonResponse
     *
     */
    public function getArticleCategories(): JsonResponse
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    /**
     * @return JsonResponse
     */
    public function getWorkshopCategories(): JsonResponse
    {
        $categories = WorkshopCategory::all();

        return response()->json($categories);
    }

    /**
     * @param Request $request
     * @param Category $category
     *
     * @return JsonResponse
     */
    public function updateCategory(Request $request,Category $category): JsonResponse
    {
        $request->validate([
           'name' => 'required|min:2|max:35',
           'display_name' => 'required|min:2|max:35',
        ]);

        $category->name = $request->get('name');
        $category->display_name = $request->get('display_name');
        $category->save();

        return response()->json($category);
    }

    /**
     * @param Request $request
     * @param WorkshopCategory $category
     *
     * @return JsonResponse
     */
    public function updateWorkshopCategory(Request $request,WorkshopCategory $category): JsonResponse
    {
        $request->validate([
            'name' => 'required|min:2|max:35',
            'display_name' => 'required|min:2|max:35',
        ]);

        $category->name = $request->get('name');
        $category->display_name = $request->get('display_name');
        $category->save();

        return response()->json($category);
    }
}
