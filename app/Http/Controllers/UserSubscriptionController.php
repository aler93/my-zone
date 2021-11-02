<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use App\Support\Exceptions;
use Illuminate\Http\Request;
use Exception;

class UserSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        try {
            if( is_null($request->input("price_alert")) ) {
                Exceptions::unprocessableEntity("No price defined");
            }
            if( is_null($request->input("id_apartament")) ) {
                Exceptions::notFound("Apartament not found");
            }

            $data = [
                "id_user"       => $request->user->id,
                "id_apartament" => $request->input("id_apartament"),
                "price_alert"   => $request->input("price_alert"),
            ];

            $us = new UserSubscription($data);
            $us->save();

            return $this->json("Subscription created", 201);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
