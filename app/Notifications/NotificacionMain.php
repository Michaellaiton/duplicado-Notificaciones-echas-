<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        // Aquí define los canales de notificación que deseas usar:
        // Por ejemplo, para correo electrónico y base de datos:
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hola ' . $notifiable->name . '!')
            ->line('Tienes un nuevo pedido con el ID ' . $this->order->order_id)
            ->action('Ver pedido', url('/orders/' . $this->order->order_id))
            ->line('Gracias por usar nuestra aplicación!');
    }

    public function toArray($notifiable)
    {
        // Aquí puedes definir el mensaje para almacenar en la base de datos:
        return [
            // 'message' => 'Tienes un nuevo pedido con el ID ' . $this->order->order_id,
            // 'order_id' => $this->order->order_id,
            'order_date'=>  $this->order->order_data,
            'user_id'=> $this->order->user_id,
            'id'=> $this->order->id,
             'name'=> $this->order->user->name,
            // 'total'=> $this->order->total

        ];
    }
}
