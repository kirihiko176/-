<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class password extends Model
{
    use HasFactory;

    protected $table = 'account';

    protected $primaryKey = ['account_id','serial_number'];
    
    public $incrementing =false;

    public $timestamps =false;
}
