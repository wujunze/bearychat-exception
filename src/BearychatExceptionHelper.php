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
            $exception->getMessage(),
            $exception->getCode(),
            $exception->getFile(),
            $exception->getLine(),
            $exception->getTraceAsString()
        );
    }

}