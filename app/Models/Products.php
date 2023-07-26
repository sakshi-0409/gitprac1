<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function setPnameAttribute($value){
        $this->attributes['p_name'] = ucwords($value);
    }
    public function setDesAttribute($value){
        $this->attributes['des'] = ucwords($value);
    }
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
