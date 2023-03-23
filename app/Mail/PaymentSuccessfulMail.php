<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessfulMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Your payment was successful';

    public function __construct(public ?Product $product = null)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Successful',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment-successful',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
