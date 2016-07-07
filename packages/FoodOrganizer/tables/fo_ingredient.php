<?php

class fo_ingredient
{
    var $id = "INT NOT NULL AUTO_INCREMENT";
    var $ingredientName = "varchar(100) character set utf8 collate utf8_general_ci";
    var $modified = 'datetime';
    var $created = 'datetime';
    var $_engine = "innodb";
}

