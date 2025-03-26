<?php

declare(strict_types=1);

namespace OBMS\ModuleSDK\Products\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait HasStatistics.
 *
 * This trait allows a model instance to implement statistics functionality.
 *
 * @author Marcel Menk <marcel.menk@ipvx.io>
 */
trait HasStatistics
{
    /**
     * Get the service status.
     */
    abstract public function statistics();
}
