# Laravel-Nicovideo

## Install
Add to ```composer.json```.
```
"shimomo/laravel-nicovideo": "^1.0.0"
```

Execute the command.
```
$ composer update
```

Add to ```config/app.conf```.
```
'providers' => [
    // ...
    Shimomo\Nicovideo\ApiServiceProvider::class,
]
```

Add to ```config/app.conf```.
```
'aliases' => [
    // ...
    'Nicovideo' => Shimomo\Nicovideo\ApiFacade::class,
]
```
