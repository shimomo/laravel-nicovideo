# Laravel-Nicovideo

## Install
Install via Composer.
```
$ composer require shimomo/laravel-nicovideo
```

Add to ```config/app.conf```.
```php
<?php

return [

    // ...

    'providers' => [
        // ...
        Shimomo\Nicovideo\ApiServiceProvider::class,
    ],

    // ...

    'aliases' => [
        // ...
        'Nicovideo' => Shimomo\Nicovideo\ApiFacade::class,
    ],
];
```

## Usage
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * @author shimomo
 */
class ExampleController extends Controller
{
    /**
     * @return string
     */
    public function test()
    {
        $result = \Nicovideo::search([
            'service' => 'video',
            'q' => '初音ミク',
            'targets' => 'title',
            'fields' => 'contentId,title,viewCounter',
            'filters[viewCounter][gte]' => '10000',
            '_sort' => '-viewCounter',
            '_offset' => 0,
            '_limit' => 3,
            '_context' => 'apiguide',
        ]);

        // Do something for $result.

        return 'ok';
    }
}
```

## Official
Please see the [official document](http://search.nicovideo.jp/docs/api/search.html) for details.

## License
Laravel-Nicovideo is open-sourced software licensed under the [MIT license](LICENSE).
