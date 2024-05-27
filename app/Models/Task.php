<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'user_id',
        'title',
        'task_description',
        'status',
        'due_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'task_id', 'task_id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'priority_id');
    }
}

