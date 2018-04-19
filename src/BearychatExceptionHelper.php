<?php


namespace Cblink\BearychatException;


class BearychatExceptionHelper
{

    /**
     * @param \Exception $exception
     */
    public static function notify($exception)
    {
        BearychatJob::dispatch(
            \request()->fullUrl(),
            get_class($exception),
            $exception->getMessage(),
            $exception->getCode(),
            $exception->getFile(),
            $exception->getLine(),
            $exception->getTraceAsString()
        );
    }

}