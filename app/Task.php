<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];


    /**
     * Each task belongs to one user.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Each task can belong to a project.
     *
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
