<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;
     protected $fillable = [
        'items_id', 'name', 'old_quantity', 'new_quantity'
    ];

     public function scopeForToday($query){
        return $query->whereDate('created_at', today());
    }

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
