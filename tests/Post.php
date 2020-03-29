<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;

use Camrymps\ClearSight\View;
use Camrymps\ClearSight\Traits\CanBeViewed;

class Post extends Model
{
    use CanBeViewed;

    protected $fillable = ['title'];
}
