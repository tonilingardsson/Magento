<?php
use App\Controllers\Controller;
use App\Database;
use App\Models\RecipeModel;
use App\Models\UserModel;

// Sökväg till grundmappen i projektet
$baseDir = __DIR__ . '/..';

// Ladda in Composers autoload-fil
require $baseDir . '/vendor/autoload.php';

// Ladda konfigurationsdata
$config = require $baseDir. '/config/config.php';

// Normalisera url-sökvägar
$path = function($uri) {
    $uri = ($uri == "/") ? $uri : rtrim($uri, '/');
    $uri = explode('?', $uri);
    $uri = array_shift($uri);
	return $uri;
};

$dsn = "mysql:host=".$config['host'].";dbname=".$config['db'].";charset=".$config['charset'];
$pdo = new PDO($dsn, $config['user'], $config['password'], $config['options']);
$db = new Database($pdo);

/*
Exempel börjar här! Ta bort detta om du vill

$db->create('product', [
	'id' => "",
    'product' => "",
	'description' => "",
	'price' => ""

]);

$product = $db->getById('product', 1);
$product = $db->getAll('product');

$productModel = new productModel($db);
$product = $productModel->getById(1);
$recipes = $recipeModel->getAll();
$recipeModel->create([
	'name' => "Falukorv",
	'quantity' => 2,
	'recipe_difficulty' => "Hard",
	'user_id' => 1
]);

Exempel slutar här
*/

/**
 * Routing
 * Route: En sökväg/url. Varje case är en route.
 * Vy: En fil som laddas in som visar en sida.
 * En vy behöver en route för att visas men en route behöver inte alltid ha en vy.
 * Tex så är det en bra idé att dirigera om till en annan route efter en POST.
 *
 * Du kan bestämma själv om du vill använda en Controller-klass eller om vill skriva koden direkt
 * i varje case. En bra riktlinje är att om koden blir mer än 4-6 rader i ett case så är det dags
 * att lyfta ut koden till en Controller-metod. Det är viktigt att kunna titta på switch:en
 * och kunna få en bra översikt över vad som händer. Om det ligger för mycket kod i varje case
 * så blir det svårt att få en översikt.
 */
//$controller = new Controller($baseDir);

$url = $path($_SERVER['REQUEST_URI']);
switch ($url) {
	case '/':
	    $products = $db->getAll('products');
		//$controller->index();
		require $baseDir.'/views/index.php';
	break;
	case '/create':
        require $baseDir.'/views/create.php';
	break;
    case '/read':
        $product = $db->getById('products', $_GET['id']);
        require $baseDir.'/views/read.php';
    break;
    case '/update':
        $product = $db->getById('products', $_GET['id']);
        require $baseDir.'/views/update.php';
    break;
    case '/update-product':
        $productId = $db->update('products', $_POST['id'], [
            'product' => $_POST['product'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image' => $_POST['image'],
        ]);
        header('Location: /?id='.$_POST['id']);
        break;
	case '/create-product':
		// Detta är ett enkelt exempel på hur vi skulle kunna spara datan vid en create.
		// $controller->createRecipe($recipeModel, $_POST, $_GET);
        $productId = $db->create('products', [
            'product' => $_POST['product'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image' => $_POST['image'],
        ]);

		// Dirigera tillbaka till förstasidan efter att vi har sparat.
		// Vi skickar med id:t på receptet som sparades för att kunna använda oss av det i vår vy.
		header('Location: /?id='.$productId);
	break;
    case '/delete':
        // Detta är ett enkelt exempel på hur vi skulle kunna spara datan vid en create.
        // $controller->createRecipe($recipeModel, $_POST, $_GET);
        $productId = $db->delete('products', $_GET['id']
        );

        // Dirigera tillbaka till förstasidan efter att vi har sparat.
        // Vi skickar med id:t på receptet som sparades för att kunna använda oss av det i vår vy.
        header('Location: /?id='.$productId);
        break;
	default:
		header('HTTP/1.0 404 Not Found');
		echo 'Page not found';
	break;
}