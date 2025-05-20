<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aid extends Model
{
    use HasFactory;

    protected $table = 'aids';
    protected $fillable = [
        'disaster_id',
        'item_name',
        'quantity',
        'sender_name',
        'phone_number',
        'tracking_number',
        'mail_service_id'
    ];

    public function mailService()
    {
        return $this->belongsTo(\App\Models\MailService::class, 'mail_service_id');
    }
}
