<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'costprice', 'sellingprice', 'quantity', 'totcp', 'totsp'
    ];

 public function scopeForToday($query){
        return $query->whereDate('created_at', today());
    }

    public function scopeForCurrentWeek($query){
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
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

protected static function boot()
{
    parent::boot();

    static::updated(function ($item) {
        if ($item->isDirty('quantity')) {
            AuditLog::create([
                'items_id' => $item->id,
                'name' => $item->name,
                'old_quantity' => $item->getOriginal('quantity'),
                'new_quantity' => $item->quantity,
            ]);
        }
    });
}
}
