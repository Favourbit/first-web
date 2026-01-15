<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TransactionNotification extends Notification
{
    use Queueable;

    protected $transaction;

    // Pass the transaction data into the notification
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    // Tell Laravel to save this to the 'notifications' database table
    public function via($notifiable)
    {
        return ['database'];
    }

    // This is the data that will be sent to your Vue frontend
    public function toArray($notifiable)
    {
        $typeLabel = $this->transaction->type === 'income' ? 'Deposit' : 'Purchase';
        
        return [
            'message' => "New {$typeLabel}: " . number_format($this->transaction->amount) . " FCFA for {$this->transaction->description}",
            'transaction_id' => $this->transaction->id,
            'type' => $this->transaction->type,
            'amount' => $this->transaction->amount,
            'time' => now()->diffForHumans(),
        ];
    }
}