<?php

namespace Shimomo\Nicovideo;

use Illuminate\Support\Facades\Facade;

/**
 * @author shimomo
 */
class ApiFacade extends Facade
{
    /**
     * コンポーネントの登録名を取得
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nicovideo';
    }
}
