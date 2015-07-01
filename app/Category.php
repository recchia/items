<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo('App\Category');
    }

    public function childs()
    {
        return $this->hasMany('App\Category');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item');
    }
}
