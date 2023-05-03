


public function index()
    {
        $users = $this->recipeService->getAllRecipes();
        return view('recipes.index', compact('recipes'));
    }