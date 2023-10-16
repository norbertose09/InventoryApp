<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function scopeFilter($query, array $filters) {
        //filter

        //search
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%'. request('search'). '%')
            
            ->orwhere('created_at', 'like', '%'. request('search'). '%');
            // ->orwhere('tags', 'like', '%'. request('search'). '%');
        }
    }
}
