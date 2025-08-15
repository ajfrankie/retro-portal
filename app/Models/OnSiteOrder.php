<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OnSiteOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'cake_id',
        'category_id',
        'total_amount',
        'veg_nonveg',
        'phone_number',
        'status',
        'no_of_cakes',
        'delivery_time',
        'delivery_date',
        'description',
        'customized_text ',
    ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'is_activated' => 'boolean',
    // ];

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array
     */
    public function uniqueIds()
    {
        return ['id'];
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }

            // Set default values
            // $model->is_activated = $model->is_activated ?? false;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

     public function cake()
    {
        return $this->belongsTo(Cakes::class, 'cake_id');
    }
}
