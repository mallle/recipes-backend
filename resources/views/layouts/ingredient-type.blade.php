@if($ingredient->pivot->type === App\RecipeIngredients::TYPE_GRAMM)
Gramm
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_STÜCK)
Stück
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_TEELÖFFEL)
Teelöffel
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_ESSLÖFFEL)
Esslöffel
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_LITER)
Liter
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_DECILITER)
Deciliter
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_MILLILITER)
Milliliter
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_PACKUNG)
Packung
@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_SCHEIBE)
Scheibe
@endif