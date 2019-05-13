<?php

namespace App\Http\Controllers;
use App\Subscription;
use App\Subscriber;

use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;


class SubscriptionController extends Controller
{
    public function index()
    {
        return Subscription::all();
    }
 
    public function show(Request $subscription)
    {
        return $subscription;
    }

    public function create(SubscriptionRequest $request)
    {
        //Check if email is valid according to rules
        $validated = $request->validated();

        if ($validated) {
            //Generate token
            $token = $subscriber->generateToken();

            //Create new subscriber
            $subscriber = Subscriber::create($request->all());

            //Send confirmation email

            //Create new subscription with 'created' status
            //$subscription = Subscription::create($request->all());
            return response()->json($subscriber, 201);
        } else {
            return response()->json($validated, 400);
        }

    }

    public function confirm(Request $request, Subscription $subscription)
    {
        //Update subscription by token, set status confirmed
        $subscription->update($request->all());

        return response()->json($subscription, 200);
    }

    public function delete(Subscription $subscription)
    {
        $subscription->delete();

        return response()->json(null, 204);
    }
}
