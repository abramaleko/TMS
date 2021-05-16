<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    use HasFactory;

    protected $table='bids';
    

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
    
    public function tenant()
    {
        return $this->belongsTo(User::class);
    }
    
}
