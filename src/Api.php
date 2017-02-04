<?php

namespace Shimomo\Nicovideo;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * @author shimomo
 */
class Api
{
    /**
     * APIのベースとなるURL
     *
     * @var string
     */
    protected $baseUrl = 'http://api.search.nicovideo.jp/api/v2/';

    /**
     * Guzzleのインスタンス
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * 必要なキーの配列
     *
     * @var array
     */
    protected $keys = ['service', 'q', 'targets', 'fields', '_sort'];

    /**
     * Guzzleのインスタンスを生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * コンテンツを検索
     *
     * @param  array $parameters
     * @return array
     * @throws InvalidArgumentException
     */
    public function search(array $parameters)
    {
        $collection = Collection::make($parameters);

        if (Collection::make($this->keys)->diff($collection->keys())->count() !== 0) {
            throw new InvalidArgumentException('Does the necessary key exists?');
        }

        $queries = $collection->filter(function ($value) {
            return !is_null($value);
        })->toArray();

        $url = $this->baseUrl . $collection->get('service') . '/contents/search';
        $response = $this->client->get($url, [
            'query' => $queries,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * コンテンツを簡単検索
     *
     * @param  string $service
     * @param  string $q
     * @return array
     */
    public function simpleSearch(string $service, string $q)
    {
        return $this->search([
            'service' => $service,
            'q' => $q,
            'targets' => 'title,description,tags',
            'fields' => 'contentId,title,description,tags,categoryTags,viewCounter,mylistCounter,commentCounter,startTime',
            '_sort' => '-viewCounter',
            '_offset' => 0,
            '_limit' => 100,
            '_context' => 'Laravel Nicovideo',
        ]);
    }

    /**
     * ビデオコンテンツを検索
     *
     * @param  string $q
     * @param  string $targets
     * @return array
     */
    public function videoSearch(string $q, string $targets = null, string $order = null, string $sort = null)
    {
        $targets = $this->transformTargets($targets ?? '');
        $sort = $this->transformOrder($order ?? '') . $this->transformSort($sort ?? '');

        return $this->search([
            'service' => 'video',
            'q' => $q,
            'targets' => $targets,
            'fields' => 'contentId,title,description,tags,categoryTags,viewCounter,mylistCounter,commentCounter,startTime',
            '_sort' => $sort,
            '_offset' => 0,
            '_limit' => 100,
            '_context' => 'Laravel Nicovideo',
        ]);
    }

    /**
     * 検索対象のフィールドを変換
     *
     * @param  string $targets
     * @return string
     */
    protected function transformTargets(string $targets)
    {
        if ($targets === 'tags') {
            return 'tagsExact';
        }

        return 'title,description,tags';
    }

    /**
     * ソート方向の記号を変換
     *
     * @param  string $order
     * @return string
     */
    protected function transformOrder(string $order)
    {
        if ($order === 'asc') {
            return '+';
        }

        return '-';
    }

    /**
     * ソート対象のフィールド名を変換
     *
     * @param  string $sort
     * @return string
     */
    protected function transformSort(string $sort)
    {
        if ($sort === 'mylist' || $sort === 'mylistCounter') {
            return 'mylistCounter';
        }

        if ($sort === 'comment' || $sort === 'commentCounter') {
            return 'commentCounter';
        }

        if ($sort === 'start' || $sort === 'startTime') {
            return 'startTime';
        }

        if ($sort === 'thumbnail' || $sort === 'thumbnailUrl') {
            return 'thumbnailUrl';
        }

        if ($sort === 'score' || $sort === 'scoreTimeshiftReserved') {
            return 'scoreTimeshiftReserved';
        }

        return 'viewCounter';
    }
}
