<?php

declare(strict_types=1);

namespace OBMS\ModuleSDK\Products\Traits;

use Illuminate\Support\Collection;

/**
 * Trait HasCapabilities.
 *
 * This trait defines the method to get capabilities.
 *
 * @author Marcel Menk <marcel.menk@ipvx.io>
 */
trait HasCapabilities
{
    /**
     * Get capabilities of an existing product instance.
     *
     * @param int $id
     *
     * @return bool
     */
    public function capabilities(): Collection
    {
        $capabilities  = ['capabilities.reflect'];
        $handlerTraits = collect(class_uses(self::class) ?: []);

        if ($handlerTraits->contains('OBMS\ModuleSDK\Products\Traits\HasService')) {
            $capabilities[] = 'service';

            $serviceTraits = collect(class_uses($this->model()) ?: []);

            if ($serviceTraits->contains('OBMS\ModuleSDK\Products\Traits\CanStart')) {
                $capabilities[] = 'service.status';
                $capabilities[] = 'service.start';
                $capabilities[] = 'service.stop';
                $capabilities[] = 'service.restart';
            }

            if ($serviceTraits->contains('OBMS\ModuleSDK\Products\Traits\HasStatistics')) {
                $capabilities[] = 'service.statistics';
            }
        }

        return collect($capabilities);
    }
}
