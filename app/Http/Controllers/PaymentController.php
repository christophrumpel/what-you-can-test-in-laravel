<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccessfulMail;
use App\Support\PaymentProvider;
use Illuminate\Contracts\Mail\Mailer;

class PaymentController extends Controller
{
    public function __invoke(PaymentProvider $paymentProvider, Mailer $mailer)
    {
        $paymentProvider->handle();

        $mailer->to(auth()->user())->send(new PaymentSuccessfulMail);
    }
}
