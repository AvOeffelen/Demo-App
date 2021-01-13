<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\WorkshopCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('category.index');
    }

    /**
     * @return Response
     */
    public function showCreate(): Response
    {
        return response()->view('category.create');
    }

    /**
     * @param Category $category
     *
     * @return Response
     */
    public function showUpdate(Category $category): Response
    {
        return response()->view('category.article.update',['category' => $category]);
    }


    /**
     * @param WorkshopCategory $category
     *
     * @return Response
     */
    public function showWorkshopUpdate(WorkshopCategory $category): Response
    {
        return response()->view('category.workshop.update',['category' => $category]);
    }
}
