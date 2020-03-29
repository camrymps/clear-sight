<?php

namespace Camrymps\ClearSight\Traits;

use Illuminate\Database\Eloquent\Model;
use Camrymps\ClearSight\View;

trait HasSight
{
    /**
     * Performs a view on a specific model, by a user at a specifc IP address.
     *
     * @param Model $model
     * @param string $ip_address
     */
    public function view(Model $model, string $ip_address)
    {
        if (!$this->has_viewed($model, $ip_address)) {
            $view = new View;

            $view->ip_address = $ip_address;

            return $model->views()->save($view);
        }
    }

    /**
     * Checks if the user at a specific IP address has viewed a specific model.
     *
     * @param Model $model
     * @param string $ip_address
     */
    public function has_viewed(Model $model, string $ip_address)
    {
        return $model
            ->views()
            ->where('ip_address', $ip_address)
            ->exists();
    }

    /**
     * Get a list of models viewed by the user at a specific IP address.
     *
     * @param string $ip_address
     */
    public function viewed(string $ip_address)
    {
        return \DB::table('views')
            ->where('ip_address', $ip_address);
    }
}
