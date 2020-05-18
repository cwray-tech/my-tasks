<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];


    /**
     * Each project belongs to one user.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Each project has many tasks
     *
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
