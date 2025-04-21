<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $products;
    public $referenceNumber;
    public $totalPayment;

    public function __construct($user, $products, $referenceNumber, $totalPayment)
    {
        $this->user = $user;
        $this->products = $products;
        $this->referenceNumber = $referenceNumber;
        $this->totalPayment = $totalPayment;
    }

    public function build()
    {
        return $this->subject('Order Confirmation - Reference: ' . $this->referenceNumber)
            ->view('emails.order_success');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'FurrHUB Order Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_success',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
