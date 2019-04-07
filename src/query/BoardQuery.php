<?php


namespace carono\yii2trello\query;

use Trello\Model\Board;

/**
 * Class BoardQuery
 *
 * @package carono\yii2trello\query
 * @method Board[] all($client = null) : array
 * @method null|Board one($client = null)
 */
class BoardQuery extends Query
{
    protected function fetchData(): array
    {
        $this->from = $this->getMember($this->client)->getBoards();
        return parent::fetchData();
    }
}