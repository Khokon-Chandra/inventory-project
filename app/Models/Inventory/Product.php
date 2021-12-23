<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Znck\Eloquent\Traits\BelongsToThrough;

class  Product extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $fillable = [
        '_key',
        'category_id',
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productType()
    {
        return $this->belongsToThrough(ProductType::class, Category::class);
    }


    /**
     * Product Search Filter  method
     * Query Scope method
     */

    public function scopeFilter($query, array $filters)
    {

        if (isset($filters['category']) && isset($filters['search'])) {
            $category = $filters['category'];
            $query
            ->where('name', 'LIKE', '%' . $filters['search'] . '%')
            ->orWhere('description', 'LIKE', '%' . $filters['search'] . '%')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('_key', $category);
                });

        } else {

            $query
                ->when($filters['product_type'] ?? false, function ($query, $productType) {
                    $query->whereHas('category', function ($query) use ($productType) {
                        $query->whereHas('productType', function ($query) use ($productType) {
                            $query->where('_key', $productType);
                        });
                    });
                })
                ->when($filters['category'] ?? false, function ($query, $category) {
                    $query
                        ->whereHas('category', function ($query) use ($category) {
                            $query->where('_key', $category);
                        });
                })
                ->when($filters['search'] ?? false, function ($query, $search) {
                    $query
                        ->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%');
                });
        }
    }
}
