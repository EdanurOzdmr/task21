<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const DOING = 0;
    const TODO = 1;
    const DONE = 2;

    protected $fillable = ['user_id', 'title', 'description', 'status'];


    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function sortByStatus()
    {
        return Task::orderBy('title')->get()->sortBy('status');
    }
}
