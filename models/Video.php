<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {
    protected $table = 'video';
    protected $fillable = ['iframe', 'titulo'];
    public $timestamps = true;
}