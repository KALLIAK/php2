<?php

namespace models;

class NewsModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'news');
    }
}