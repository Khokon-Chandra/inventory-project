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

    protected static $relations_to_cascade = ['categories'];

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
    }




    public static function boot ()
    {
        parent::boot();

        self::deleting(function (ProductType $parent) {
            foreach ($parent->categories as $child){
                $child->delete();
            }
        });
    }



}
