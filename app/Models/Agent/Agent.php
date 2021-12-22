<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        '_key',
        'type',
        'name',
        'fathers_name',
        'address',
        'mobile',
        'rate_of_interest',
        'discount_per_bag',
    ];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search']??false,function($query,$search){
            $query
            ->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('fathers_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('address', 'LIKE', '%'.$search.'%');
        });
    }

}
