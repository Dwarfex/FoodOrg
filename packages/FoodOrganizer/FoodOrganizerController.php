<?php
/**
 * Created by PhpStorm.
 * User: listener
 * Date: 18.05.2015
 * Time: 23:26
 */

namespace Package\FoodOrganizer;


use Package\FoodOrganizer\Models\Ingredient;

class FoodOrganizerController {

    public function addIngredient($name,$detail=''){
        $ingredient = new Ingredient();
        if(!$ingredient->findByName($name)){
            $ingredient->setIngredientName($name);
            $ingredient->setIngredientDetail($detail);
            $ingredient->save();

        }

    }


}