# bearychat-exception
laravel exception notify through bearychat

## Install

`composer require cblink/bearychat-exception`

Add the service provider to the `providers` array in `config/app.php`:

`ElfSundae\BearyChat\Laravel\ServiceProvider::class,`

publish the config file:

`php artisan vendor:publish --tag=bearychat`

## Usage

```

use Cblink\BearychatException\BearychatExceptionHelper;

class Handler extends ExceptionHandler
{
  // ...
  
    public function report(Exception $exception)
    {
        BearychatExceptionHelper::notify($exception);
        parent::report($exception);
    }

}

```

more usage see in https://github.com/ElfSundae/laravel-bearychat