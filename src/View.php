<?php

namespace Camrymps\ClearSight;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    /**
     * Get all of the models that own reactions.
     */
    public function viewable()
    {
        return $this->morphTo();
    }
}
