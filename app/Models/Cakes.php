<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cakes extends Model
{
    use HasFactory;

    protected $table = 'cakes';

    protected $fillable = [
        'name',
        'description',
        'code',
        'category_id',
        'availability',
        'veg_nonveg',
        'is_activated',
    ];

    protected $casts = [
        'is_activated' => 'boolean',
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing()
    {
        return false;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }

            $model->is_activated = $model->is_activated ?? false;

            if (empty($model->code)) {
                $prefix = 'R/';
                $vegType = strtoupper($model->veg_nonveg) === 'NON-VEG' ? 'NV' : 'V';

                $lastCode = self::where('veg_nonveg', $model->veg_nonveg)
                    ->whereNotNull('code')
                    ->orderByDesc('created_at')
                    ->value('code');

                $lastNumber = 0;
                if ($lastCode && preg_match('/^R\/' . $vegType . '\/(\d+)$/', $lastCode, $matches)) {
                    $lastNumber = (int)$matches[1];
                }

                $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
                $model->code = $prefix . $vegType . '/' . $newNumber;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
