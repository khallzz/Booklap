<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'field_id',
        'order_code',
        'status',
        'amount',
        'is_promo',
        'start_time',
        'end_time',
        'payment_receipt',
        'order_date'
    ];

    protected function casts(): array
    {
        return [
            'is_promo' => 'bool', // 1 / 0
        ];
    }

    public static function generateOrderCode(): string
    {
        $order_code = 'BL' . time() . strtoupper(Str::random(3));
        return $order_code;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
