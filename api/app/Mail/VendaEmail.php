<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VendaEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $vendas;

    /**
     * Create a new message instance.
     * @param array $venda
     * @return void
     */
    public function __construct($venda)
    {
        $this->vendas = $venda;
    }

     /**
* Build the message.
*
* @return $this
*/
    public function build()
    {
        return $this->from('cidadaotemporal@gmail.com')
                    ->view('mail.venda')
                    ->text('mail.venda_plain')
                    ->with(
                      [
                            'vendas' => $this->vendas,
                            'testVarTwo' => '2',
                      ]);
    }

}
