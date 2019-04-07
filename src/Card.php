<?php


namespace carono\yii2trello;


use carono\yii2trello\query\CardQuery;

class Card extends \Trello\Model\Card
{

    public static function find()
    {
        return new CardQuery(get_called_class());
    }
}