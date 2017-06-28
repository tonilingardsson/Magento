<?php

namespace App\Models;


use App\Database;

class RecipeModel extends Model {
	protected $table = 'recipes';

	public function __construct(Database $db, array $modelData = [])
    {
        parent::__construct($db, $modelData);
    }
}