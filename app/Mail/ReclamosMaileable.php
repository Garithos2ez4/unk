<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PDF;

class ReclamosMaileable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
     
    public $detalles;
    public $empresa;
    public $fromAddress;
    
    public function __construct($detalles,$empresa,$fromAddress)
    {
        $this->detalles = $detalles;
        $this->empresa = $empresa;
        $this->fromAddress = $fromAddress;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->fromAddress, 'Atencion Unik Store'),
            subject: 'Notificacion de Reclamo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.reclamo',
            with: ['detalles' => $this->detalles,
                    'empresa' => $this->empresa],
        );
    }
    
    public function build()
    {
        $pdf = PDF::loadView('pdf.reclamo_pdf', ['detalles' => $this->detalles, 'empresa' => $this->empresa]);

        return $this->view('email.reclamo')
                    ->attachData($pdf->output(), 'Constancia_reclamo.pdf', [
                        'mime' => 'application/pdf',
                    ]);
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
