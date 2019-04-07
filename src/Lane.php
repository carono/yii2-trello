<?php


namespace carono\yii2trello;


use carono\yii2trello\query\ListQuery;

class Lane extends \Trello\Model\Lane
{
    public static function find()
    {
        return new ListQuery(get_called_class());
    }
}