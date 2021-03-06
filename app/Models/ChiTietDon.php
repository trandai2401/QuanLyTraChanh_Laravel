<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDon extends Model
{
    use HasFactory;
    public function topping()
    {
        return $this->hasMany(ToppingThem::class, 'chiTietDon_id', 'id');
    }
}
