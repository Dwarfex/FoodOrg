<?php

class fo_ingredientDetail
{
    var $id = "INT NOT NULL AUTO_INCREMENT";
    var $ingredientID = array('cockpitTable', 'id', 'int', 'on delete cascade on update cascade');
    var $ingredientDetailName = "varchar(100) character set utf8 collate utf8_general_ci";
    var $modified = 'datetime';
    var $created = 'datetime';
    var $_engine = "innodb";
}

