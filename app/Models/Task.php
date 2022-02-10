<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const TODO = 'TODO';
    const DOING = 'DOING';
    const DONE = 'DONE';

    protected $fillable = ['user_id', 'title', 'description', 'status'];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function sortByStatus()
    {
        $doing = [];
        $todo = [];
        $done = [];
        $tasks = Task::all();
        foreach ($tasks as $data) {
            if ($data->status === Task::DOING) {
                $doing[] = $data;
            } elseif ($data->status === Task::TODO) {
                $todo[] = $data;
            } elseif ($data->status === Task::DONE) {
                $done[] = $data;
            }
        }
        return collect(array_merge(self::taskSort($doing), self::taskSort($todo), self::taskSort($done)));
    }

    public static function taskSort($array)

    {
        $length = count($array);
        $nextSwap = null;
        $temp = null;

        for ($i = 0; $i < $length - 1; $i++) {
            $nextSwap = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($array[$j]['title'] < $array[$nextSwap]['title']) {
                    $nextSwap = $j;
                }
            }
            $temp = $array[$i]['title'];
            $array[$i]['title'] = $array[$nextSwap]['title'];
            $array[$nextSwap]['title'] = $temp;
        }
        return $array;
    }
}
