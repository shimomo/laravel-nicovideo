<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Shimomo\Nicovideo\Api;

/**
 * @author shimomo
 */
class ApiTest extends TestCase
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
    public function testSearch()
    {
        $data = $this->api->search([
            'service'                   => 'video',
            'q'                         => '初音ミク',
            'targets'                   => 'title',
            'fields'                    => 'contentId,title,viewCounter',
            'filters[viewCounter][gte]' => '10000',
            '_sort'                     => '-viewCounter',
            '_offset'                   => 0,
            '_limit'                    => 3,
            '_context'                  => 'Laravel Nicovideo',
        ]);
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testSimpleSearch1()
    {
        $data = $this->api->simpleSearch('video', '初音ミク');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testSimpleSearch2()
    {
        $data = $this->api->simpleSearch('live', '初音ミク');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testSimpleSearch3()
    {
        $data = $this->api->simpleSearch('illust', '初音ミク');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch1()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch2()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch3()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch4()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch5()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch6()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'desc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch7()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'asc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch8()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'asc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch9()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'asc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch10()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'asc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch11()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'asc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch12()
    {
        $data = $this->api->videoSearch('初音ミク', 'keywords', 'asc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch13()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'desc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch14()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'desc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch15()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'desc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch16()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'desc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch17()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'desc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch18()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'desc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch19()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'asc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch20()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'asc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch21()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'asc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testVideoSearch22()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'asc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch23()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'asc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testVideoSearch24()
    {
        $data = $this->api->videoSearch('初音ミク', 'tags', 'asc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch1()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'desc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch2()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'desc', 'mylist');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch3()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'desc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch4()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'desc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch5()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'desc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch6()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'desc', 'score');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch7()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'asc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch8()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'asc', 'mylist');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch9()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'asc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch10()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'asc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch11()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'asc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch12()
    {
        $data = $this->api->liveSearch('初音ミク', 'keywords', 'asc', 'score');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch13()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'desc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch14()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'desc', 'mylist');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch15()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'desc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch16()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'desc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch17()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'desc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch18()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'desc', 'score');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch19()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'asc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch20()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'asc', 'mylist');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch21()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'asc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch22()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'asc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testLiveSearch23()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'asc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testLiveSearch24()
    {
        $data = $this->api->liveSearch('初音ミク', 'tags', 'asc', 'score');
        $this->assertSame(200, $data['meta']['status']);
    }














    /**
     * @return void
     */
    public function testIllustSearch1()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'desc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch2()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'desc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch3()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'desc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch4()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'desc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch5()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'desc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch6()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'desc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch7()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'asc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch8()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'asc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch9()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'asc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch10()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'asc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch11()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'asc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch12()
    {
        $data = $this->api->illustSearch('初音ミク', 'keywords', 'asc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch13()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'desc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch14()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'desc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch15()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'desc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch16()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'desc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch17()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'desc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch18()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'desc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch19()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'asc', 'view');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch20()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'asc', 'mylist');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch21()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'asc', 'comment');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @return void
     */
    public function testIllustSearch22()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'asc', 'start');
        $this->assertSame(200, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch23()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'asc', 'thumbnail');
        $this->assertSame(400, $data['meta']['status']);
    }

    /**
     * @expectedException InvalidArgumentException
     * @return void
     */
    public function testIllustSearch24()
    {
        $data = $this->api->illustSearch('初音ミク', 'tags', 'asc', 'score');
        $this->assertSame(400, $data['meta']['status']);
    }
}
