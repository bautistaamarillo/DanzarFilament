<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class,"item_students");
    }
    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Payment::class,"item_payments");
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
