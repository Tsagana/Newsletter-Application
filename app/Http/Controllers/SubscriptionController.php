<?php

namespace App\Http\Controllers;
use App\Subscription;
use App\Subscriber;

use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;


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

    public function create(SubscriberRequest $request)
    {
        //Check if email is valid according to rules
        $validated = $request->validated();

        if ($validated) {
            //Create new subscriber
            $subscriber = Subscriber::create($request->all());

            //Generate token
            $token = $subscriber->generateToken();

            //Send confirmation email
            /*Mail::send('confirm',array('token'=>$token), function($message){});*/

            //Create new subscription with 'created' status
            $subscription = Subscription::create(['subscriber_id' => $subscriber->id, 'status' => 'created']);

            return response()->json($subscription, 201);
        } else {
            return response()->json($validated, 400);
        }

    }

    public function confirm(Request $request)
    {
        //Update subscription by token, set status confirmed
        $subscriber = Subscriber::where('token', '=', $request->token)->firstOrFail();
        $subscription = Subscription::where(['subscriber_id' => $subscriber->id])->first()->update(['status' => 'confirmed']);

        return response()->json($subscription, 200);
    }

    public function delete(Subscription $subscription)
    {
        $subscription->delete();

        return response()->json(null, 204);
    }
}
