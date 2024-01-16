<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_order'
    ];

    protected $casts = [
        'category_order' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, CategoryOrder>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
