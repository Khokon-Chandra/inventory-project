<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        '_key',
        'name',
        'description',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class,Category::class,);
    }

    /**
     * scope filter for searching product type
     */

    public function scopeFilter ( $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query
                ->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('description', 'LIKE', '%'.$search.'%');
        });

        // $query->when($filters['roles'] ?? false, function ($query, $roles) {
        //    $query
        //        ->whereHas('roles', function ($query) use ($roles) {
        //            $query->whereIn('slug', $roles);
        //        });
        // });
    }
}