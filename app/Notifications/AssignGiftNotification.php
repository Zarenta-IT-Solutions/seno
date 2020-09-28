<?php

namespace App\Notifications;

use App\Models\AssignGift;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignGiftNotification extends Notification
{
    use Queueable;

    protected $assign;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(AssignGift $assign)
    {
        $this->assign = $assign;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Stock Assign')
            ->line('Hello '.$notifiable->name)
            ->line('New Stock Assign In Your Account')
            ->action('Accept', route('stockist.products.show',$this->assign->id));

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [ 'New Stock Assign in Yor Account' ];
    }
}
