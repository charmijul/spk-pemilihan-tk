<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Datatk extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function scopeFilter($query, array $filters)
    {
        // dd(request('category'),request('search'));
        //$query->when($filters['search'] ?? false, function($query, $search) {
        // return $query->where('name', 'like', '%' . $search . '%');
        //});
        if (isset($filters['category']) ? $filters['category'] : false) {
            if (isset($filters['search']) ? $filters['search'] : false) {
                return $query->where(request('category'), 'like', '%' . request('search') . '%');
            }
        }
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    
}
