<?php

class RecipeCollection
{
    private $title;
    private $recipes = array();
    
    public function addRecipe($recipe)
    {
      $this->recipes[] = $recipe;
    }
    
    public function getRecipes()
    {
        return $this->recipes;
    }
    
    public function getRecipeTitles()
    {
        $titles = array();
        foreach ($this->recipes as $recipe) {
            $titles[] = $recipe->getTitle();
        }
        return $titles;
    }
    public function filterByTag($tag)
    {
      $taggedRecipes = array();
      foreach ($this->recipes as $recipe){
          if (in_array(strtolower($tag), $recipe->getTags())) {
              $taggedRecipes[] = $recipe;
          }
      }
      return $taggedRecipes;
    }

    public function getCombinedIngredients() {
        $ingredients = array();
        foreach($this->recipes as $recipe){
            foreach($recipe->getIngredients as $ing ){
                $ingredients[$ing["item"]] = array(
                    $ing["amount"],
                    $ing["measure"]
                );
            }
        }
        return $ingredients;
    }
}