<?php

namespace App\Http\Controllers;

use App\Models\Payment;
Use App\Models\User;
use App\Notifications\sendpaymentEmail;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = Payment:: all();
        return $payment;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $payment = new Payment;
        $payment->order_id = $request->order_id;
        $payment->payment_type = $request->payment_type;
        $payment->amount = $request->amount;
        $payment->user_id = $request->user_id;
        $payment->payment_status = $request->payment_status;
        $payment->save();

        //update order status
        $order = Orders::where('id', $request->order_id)->first();
        $order->order_status = 'Preparing';
        $order->save();

        //send mail:
        $user = User::find($request->user_id);
        $user->notify(new SendPaymentEmail($user, $payment));

        return $payment;
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $order = Order::find($request->id);
        $payment->payment_type = $request->payment_type;
        $payment->amount = $request->amount;
        $payment->user_id = $request->user_id;
        $payment->payment_status = $request->payment_status;
        $payment->order_id = $request->order_id;


        $payment->save();

        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
