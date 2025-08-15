<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CustomizedOrder extends Model
{
    use HasFactory;

    protected $table = 'customized_orders';
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'customer_name',
        'address',
        'district',
        'description',
        'phone_number',
        'size',
        'reference_image',
        'status',
        'no_of_cakes',
        'delivery_time',
        'delivery_date',
        'wish',
        'note',
        'veg_nonveg',
        'category_id',
        'cake_id',
    ];

    /**
     * Automatically generate UUID when creating a new record.
     */
      protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }

           
        });
    }

    /**
     * Relationship: CustomizedOrder belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relationship: CustomizedOrder belongs to Cake
     */
    public function cake()
    {
        return $this->belongsTo(Cakes::class, 'cake_id');
    }
}
