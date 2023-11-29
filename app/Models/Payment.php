<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'date',
        'number',
        'amount',
        
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class,"item_payments");
    }
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
