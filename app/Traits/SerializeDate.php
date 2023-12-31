<?php

namespace App\Traits;

use DateTimeInterface;

trait SerializeDate
{
    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toDatetimeString();
    }
}
