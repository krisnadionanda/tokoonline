<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'total',
        'status',
        'notes',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    // Relasi ke tabel order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    // Generate nomor order otomatis
    public static function generateOrderNumber()
    {
        $prefix = 'ORD';
        $date   = now()->format('Ymd');

        $lastOrder = self::whereDate('created_at', today())
            ->orderByDesc('id')
            ->first();

        if ($lastOrder && $lastOrder->order_number) {
            $lastNumber = (int) substr($lastOrder->order_number, -4);
            $newNumber  = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . $date . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}
