<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartamentRequest;
use App\Models\Apartament;
use App\Repositories\ApartamentRepository;
use App\Support\Exceptions;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApartamentController extends Controller
{
    private ApartamentRepository $repository;
    private array $filters = ["name", "price", "description", "id_category"];

    public function __construct()
    {
        $this->repository = new ApartamentRepository();
    }

    public function list(Request $request): JsonResponse
    {
        try {
            $filters = $request->all();
            array_walk($filters, function($v, $k) {
                if( !in_array($k, $this->filters) ) {
                    Exceptions::badRequest("Filter '$k' is not allowed");
                }
            });

            return $this->json($this->repository->list($filters));
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            return $this->json(Apartament::whereId($id)
                                         ->with("category")
                                         ->with("properties")
                                         ->get());
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function store(ApartamentRequest $request): JsonResponse
    {
        try {
            $ap = $this->repository->store($request->all());

            return $this->json($ap, 201);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function update(int $id, ApartamentRequest $request): JsonResponse
    {
        try {
            $this->repository->update($id, $request->all());

            return $this->json([], 204);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            Apartament::whereId($id)->forceDelete();

            return $this->json([], 204);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
