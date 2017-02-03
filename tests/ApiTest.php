<?php

require __DIR__ . '/../vendor/autoload.php';

use Shimomo\Nicovideo\Api;

/**
 * @author shimomo
 */
class ApiTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->api = new Api();
    }

    /**
     * @return void
     */
    public function testSearch1()
    {
        $data = $this->api->search([
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

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testSimpleSearch1()
    {
        $data = $this->api->simpleSearch('video', '初音ミク');

        $this->assertTrue(is_array($data));
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testException1()
    {
        $this->api->search([
            'q' => '初音ミク',
            'targets' => 'title',
            'fields' => 'contentId,title,viewCounter',
            'filters[viewCounter][gte]' => '10000',
            '_sort' => '-viewCounter',
            '_offset' => 0,
            '_limit' => 3,
            '_context' => 'apiguide',
        ]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testException2()
    {
        $this->api->search([
            'service' => 'video',
            'targets' => 'title',
            'fields' => 'contentId,title,viewCounter',
            'filters[viewCounter][gte]' => '10000',
            '_sort' => '-viewCounter',
            '_offset' => 0,
            '_limit' => 3,
            '_context' => 'apiguide',
        ]);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testException3()
    {
        $this->api->search([
            'service' => 'video',
            'q' => '初音ミク',
            'fields' => 'contentId,title,viewCounter',
            'filters[viewCounter][gte]' => '10000',
            '_sort' => '-viewCounter',
            '_offset' => 0,
            '_limit' => 3,
            '_context' => 'apiguide',
        ]);
    }
}
