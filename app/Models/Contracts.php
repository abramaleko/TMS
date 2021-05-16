<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;

    protected $table='contracts';

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'landlord_id');
    }


}
