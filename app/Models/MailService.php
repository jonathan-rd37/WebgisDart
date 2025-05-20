<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailService extends Model
{
    use HasFactory;

    protected $table = 'mail_services';
    protected $fillable = ['name'];
}
