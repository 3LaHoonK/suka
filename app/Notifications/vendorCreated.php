<?php

namespace App\Notifications;

use App\Models\vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class vendorCreated extends Notification
{
    use Queueable;

    public $vendor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vendor)
    {
        $this -> vendor = $vendor ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)



    {
        $subject=sprintf('%s:لقد تم انشاء متجركم بنجاح الرجاء التوصل معنا خلال الارقام الاتية   <br> 01008275881 <br> 01018106566 %s!'
            ,config('app.name'),'Mr.Abdurhman');
        $greeting =sprintf('hello %s!',$notifiable->name);
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
