<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable=['bill_name', 'bill_amount', 'bill_description'];
    protected $primaryKey = 'bill_id';
}
