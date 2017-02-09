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
     * @return void
     */
    public function testVideoSearch1()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'view');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch2()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'view');

        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch3()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'view');

        $this->assertSame(100, count($data['data']));
    }

    /**
     * @return void
     */
    public function testVideoSearch4()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch5()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc');

        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch6()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc');

        $this->assertSame(100, count($data['data']));
    }

    /**
     * @return void
     */
    public function testVideoSearch7()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch8()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords');

        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch9()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords');

        $this->assertSame(100, count($data['data']));
    }

    /**
     * @return void
     */
    public function testVideoSearch10()
    {
        $data = $this->api->videoSearch('初音ミク');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch11()
    {
        $data = $this->api->videoSearch('初音ミク');

        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch12()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords');

        $this->assertSame(100, count($data['data']));
    }

    /**
     * @return void
     */
    public function testVideoSearch13()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'mylist');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch14()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'comment');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch15()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'start');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch16()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'asc', 'view');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testVideoSearch17()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'desc', 'view');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testLiveSearch1()
    {
        $data = $this->api->liveSearch('クルーズ', 'keywords', 'desc', 'score');

        $this->assertTrue(is_array($data));
    }

    /**
     * @return void
     */
    public function testLiveSearch2()
    {
        $data = $this->api->liveSearch('クルーズ', 'keywords', 'desc', 'score');

        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch3()
    {
        $data = $this->api->liveSearch('クルーズ', 'keywords', 'desc', 'score');

        $this->assertSame(100, count($data['data']));
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

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testException4()
    {
        $this->api->search([
            'service' => 'video',
            'q' => '初音ミク',
            'targets' => 'title',
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
    public function testException5()
    {
        $this->api->search([
            'service' => 'video',
            'q' => '初音ミク',
            'targets' => 'title',
            'fields' => 'contentId,title,viewCounter',
            'filters[viewCounter][gte]' => '10000',
            '_offset' => 0,
            '_limit' => 3,
            '_context' => 'apiguide',
        ]);
    }
}
