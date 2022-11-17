<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'product_id','quantity','total_price'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function product2(){
        return $this->belongsTo(Product::class, 'product_id_2');
    }

    public function product3(){
        return $this->belongsTo(Product::class, 'product_id_3');
    }

    public function product4(){
        return $this->belongsTo(Product::class, 'product_id_4');
    }

    public function product5(){
        return $this->belongsTo(Product::class, 'product_id_5');
    }

    public function product6(){
        return $this->belongsTo(Product::class, 'product_id_6');
    }

    public function product7(){
        return $this->belongsTo(Product::class, 'product_id_7');
    }

    public function product8(){
        return $this->belongsTo(Product::class, 'product_id_8');
    }

    public function product9(){
        return $this->belongsTo(Product::class, 'product_id_9');
    }

    public function product10(){
        return $this->belongsTo(Product::class, 'product_id_10');
    }

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
}
