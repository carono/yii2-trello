<?php


namespace carono\yii2trello\query;


use carono\yii2trello\Board;
use Trello\Model\Card;

/**
 * Class CardQuery
 *
 * @package carono\yii2trello\query
 * @method Card[] all($client = null) : array
 * @method null|Card one($client = null)
 */
class CardQuery extends Query
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
        $boards = Board::find()->andWhereMember($this->member)->andFilterWhere(['id' => $this->board])->all($this->client);
        $cards = [];
        foreach ($boards as $board) {
            $cards[] = $board->getCards();
        }
        $this->from = array_merge(...$cards);
        return parent::fetchData();
    }
}