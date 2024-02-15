<?php

namespace App\Models;
use App\Notifications\OrderNotification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'shipping_status',
        'payment_status',
        'user_id',
        'order_date',
        'taxt',
        // 'order_id',
        // 'type',
        // 'data',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function notifyUser(OrderNotification $notification)
    {
        $this->user->notify($notification);
    }

    public static function store(){
        $order = self::create([
            'shipping_status'=> 'PENDING',
            'payment_status'=>'PAID',
            'user_id'=>auth()->user()->id,
            'order_date' => \Carbon\Carbon::now(),
            // 'taxt' => $tax[0],
        ]);
            self::make_order_notification($order);
    }


    public function make_order_notification($order){
        User::role(['role_superAdmin','role_admin','role_usuRegu'])->exception($order->user_id)
        ->each(function(User $user)use ($order){
            $user->notify(new OrderNotification($order));
        });

    }
}
