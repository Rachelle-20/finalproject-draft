<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $primaryKey = 'priority_id';

    protected $fillable = [
        'level',
        'description',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'priority_id', 'priority_id');
    }
}
