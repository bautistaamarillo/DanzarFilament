<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'date',
        'invoice_number',
        
    ];
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Tutor::class,"item_payments");
    }
}
