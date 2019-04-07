<?php


namespace carono\yii2trello;


use carono\yii2trello\query\BoardQuery;

class Board extends \Trello\Model\Board
{
    public static function find()
    {
        return new BoardQuery(get_called_class());
    }
}