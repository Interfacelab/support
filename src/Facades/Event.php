<?php

namespace ILAB_Illuminate\Support\Facades;

use ILAB_Illuminate\Database\Eloquent\Model;
use ILAB_Illuminate\Support\Testing\Fakes\EventFake;

/**
 * @see \ILAB_Illuminate\Events\Dispatcher
 */
class Event extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @param  array|string  $eventsToFake
     * @return void
     */
    public static function fake($eventsToFake = [])
    {
        static::swap($fake = new EventFake(static::getFacadeRoot(), $eventsToFake));

        Model::setEventDispatcher($fake);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'events';
    }
}
