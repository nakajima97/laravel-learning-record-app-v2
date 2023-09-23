<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function archive()
    {
        $this->is_archive = true;
        $this->save();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Record>
     */
    public function Records()
    {
        return $this->hasMany(Record::class);
    }
}
