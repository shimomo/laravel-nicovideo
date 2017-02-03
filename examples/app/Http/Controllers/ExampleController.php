<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * @author shimomo
 */
class ExampleController extends Controller
{
    /**
     * @return void
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

        var_dump($result);
        exit;
    }
}
