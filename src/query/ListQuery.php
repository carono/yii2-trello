<?php


namespace carono\yii2trello\query;


use carono\yii2trello\Board;

/**
 * Class ListQuery
 *
 * @package carono\yii2trello\query
 */
class ListQuery extends Query
{
    protected $board;

    /**
     * @param $id
     * @return $this
     */
    public function andWhereBoard($id)
    {
        $this->board = $id;
        return $this;
    }

    protected function fetchData(): array
    {
        $board = Board::find()->andWhereMember($this->member)->andWhere(['id' => $this->board])->one($this->client);
        $this->from = $board ? $board->getLists() : [];
        return parent::fetchData();
    }
}