<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'address',
        'dni',
        'phone_number',
        'observations',
        'birthdate',
        
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class,"item_students");
    }
    public function student(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
