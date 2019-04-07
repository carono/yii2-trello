<?php


namespace carono\yii2trello\query;


use Trello\Client;
use yii2mod\query\ArrayQuery;

abstract class Query extends ArrayQuery
{
    protected $modelClass;
    protected $client;
    protected $member;

    /**
     * @param $id
     * @return $this
     */
    public function andWhereMember($id)
    {
        $this->member = $id;
        return $this;
    }

    public function __construct($modelClass, $config = [])
    {
        $this->modelClass = $modelClass;
        parent::__construct($config);
    }

    /**
     * @param null $client
     * @return array
     */
    public function all($client = null): array
    {
        $this->client = static::getClient($client);
        return parent::all();
    }

    public function one($client = null)
    {
        $this->client = static::getClient($client);
        return parent::one();
    }

    /**
     * @param null $client
     * @return Client
     */
    protected static function getClient($client = null)
    {
        if ($client === null) {
            $client = \Yii::$app->get('trello');
        }
        return $client;
    }

    /**
     * @param $client
     * @return \Trello\Model\Member
     */
    protected function getMember($client)
    {
        $member = new \Trello\Model\Member(static::getClient($client));
        $member->setId($this->member);
        return $member;
    }
}