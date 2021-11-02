<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartamentRateRequest;
use App\Http\Requests\ApartamentRequest;
use App\Models\Apartament;
use App\Models\ApartamentRating;
use App\Repositories\ApartamentRepository;
use App\Support\Exceptions;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApartamentController extends Controller
{
    private ApartamentRepository $repository;
    private array                $filters = ["name", "price", "description", "id_category"];

    public function __construct()
    {
        $this->repository = new ApartamentRepository();
    }

    public function list(Request $request): JsonResponse
    {
        try {
            $filters = $request->all();

            array_walk($filters, function($v, $k) {
                if( in_array($k, ["orderby", "perpage", "convert_currency"]) ) {
                    return;
                }
                if( !in_array($k, $this->filters) ) {
                    Exceptions::badRequest("Filter '$k' is not allowed");
                }
            });
            $convertCurrency = $request->input("convert_currency");

            unset($filters["orderby"]);
            unset($filters["perpage"]);
            unset($filters["convert_currency"]);

            $orderBy = $request->input("orderby") ?? [];
            $perPage = (int) $request->input("perpage") ?? 50;

            return $this->json($this->repository->list($filters, $orderBy, $perPage, $convertCurrency));
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

    public function rate(ApartamentRateRequest $request)
    {
        try {
            $ar = ApartamentRating::where("id_user", "=", $request->user->id)
                                  ->where("id_apartament", "=", $request->input("id_apartament"))
                                  ->first();

            if( !is_null($ar) ) {
                // Allow user to update the rating?
                Exceptions::conflict("You already rated this apartament");
            }

            $data = [
                "id_user"       => $request->user->id,
                "id_apartament" => $request->input("id_apartament"),
                "rating"        => $request->input("rating")
            ];
            $new  = new ApartamentRating($data);
            $new->save();

            $avg = $this->repository->updateRating($request->input("id_apartament"));

            return $this->json(["average" => $avg]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
