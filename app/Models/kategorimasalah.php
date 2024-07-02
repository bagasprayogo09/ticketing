<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorimasalah extends Model
{
    use HasFactory;
    protected $table = 'kategorimasalah'; // Sesuaikan dengan nama tabel yang sebenarnya
    // Define the attributes that are mass assignable
    protected $fillable = ['nama', 'divisions_id', 'status'];

    // Define the relationship with the Division model
    public function divisions()
    {
        return $this->belongsTo(Divisions::class, 'divisions_id');
    }
}
