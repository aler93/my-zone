<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Support\Exceptions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function list(): JsonResponse
    {
        try {
            return $this->json(Category::with("parent")->get());
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            if( strlen($request->input("name")) <= 0 ) {
                Exceptions::unprocessableEntity("Category must have a name");
            }
            if( Category::whereName($request->input("name"))->first() ) {
                Exceptions::conflict("Category '{$request->input("name")}' already exists");
            }

            $cat = new Category($request->only(["name", "id_parent"]));
            $cat->save();

            return $this->json($cat, 201);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function update(int $id, Request $request): JsonResponse
    {
        try {
            if( strlen($request->input("name")) <= 0 ) {
                Exceptions::unprocessableEntity("Category must have a name");
            }

            $check = Category::where("name", "=", $request->input("name"))->where("id", "!=", $id)->first();
            if( $check ) {
                Exceptions::conflict("Category '{$request->input("name")}' already exists");
            }

            Category::whereId($id)->update($request->only(["name", "id_parent"]));

            return $this->json([], 204);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            Category::whereId($id)->forceDelete();

            return $this->json([], 204);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
