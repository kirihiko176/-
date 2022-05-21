<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;

    protected $table = 'account';

    protected $primaryKey = 'account_id';
    
    public $incrementing =false;

    public $timestamps =false;
}
