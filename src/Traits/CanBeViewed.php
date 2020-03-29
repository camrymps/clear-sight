<?php

namespace Camrymps\ClearSight\Traits;

use Illuminate\Database\Eloquent\Model;
use Camrymps\ClearSight\View;

trait CanBeViewed
{
    /**
     * Get all of the views linked to this model.
     */
    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }
}
