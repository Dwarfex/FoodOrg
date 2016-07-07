<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 24.06.2016
 * Time: 15:10
 */

namespace Package\FoodOrganizer;


class FONahrungsmittel
{

    static function getReferenzmengeKcal(){
        return 2000;
    }
    static function getReferenzmengeKj(){
        return 8400;
    }
    static function getReferenzmengeFett (){
        return 70;
    }
    static function getReferenzmengeGesaettigteFettsaeuren (){
        return 20;
    }
    static function getReferenzmengeKohlenhydrate (){
        return 260;
    }
    static function getReferenzmengeZucker (){
        return 90;
    }
    static function getReferenzmengeEiweiß (){
        return 50;
    }
    static function getReferenzmengeNatrium (){
        return 6;
    }
    static function getReferenzmengeBallaststoffe (){
        return 25;
    }



}