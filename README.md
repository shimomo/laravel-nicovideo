# Laravel Nicovideo

[![Build Status](https://circleci.com/gh/shimomo/laravel-nicovideo.svg?style=shield&circle-token=3559169f059fb9748a97d6ed2567a123c0683e87)](https://circleci.com/gh/shimomo/laravel-nicovideo)
[![Coverage Status](https://coveralls.io/repos/github/shimomo/laravel-nicovideo/badge.svg)](https://coveralls.io/github/shimomo/laravel-nicovideo)
[![Latest Stable Version](https://poser.pugx.org/shimomo/laravel-nicovideo/version)](https://packagist.org/packages/shimomo/laravel-nicovideo)
[![Total Downloads](https://poser.pugx.org/shimomo/laravel-nicovideo/downloads)](https://packagist.org/packages/shimomo/laravel-nicovideo)
[![MIT License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)

## Installation
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

use Nicovideo;
use App\Http\Controllers\Controller;

/**
 * @author shimomo
 */
class ExampleController extends Controller
{
    /**
     * @return int
     */
    public function search()
    {
        $searchResult = Nicovideo::search([
            'service'                   => 'video',
            'q'                         => '初音ミク',
            'targets'                   => 'title',
            'fields'                    => 'contentId,title,viewCounter',
            'filters[viewCounter][gte]' => '10000',
            '_sort'                     => '-viewCounter',
            '_offset'                   => 0,
            '_limit'                    => 3,
            '_context'                  => 'apiguide',
        ]);

        $simpleSearchResult = Nicovideo::simpleSearch('video', '初音ミク');
        $videoSearchResult  = Nicovideo::videoSearch('初音ミク', 'keywords', 'desc', 'view');
        $liveSearchResult   = Nicovideo::liveSearch('初音ミク', 'keywords', 'desc', 'view');
        $illustSearchResult = Nicovideo::illustSearch('初音ミク', 'keywords', 'desc', 'view');

        return $searchResult['meta']['status'];
    }
}
```

## Official
Please look at the [official document](http://search.nicovideo.jp/docs/api/search.html) for details.

## License
Laravel Nicovideo is open-sourced software licensed under the [MIT license](LICENSE).
