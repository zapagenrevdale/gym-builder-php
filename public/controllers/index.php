<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    if(isset($_SESSION['admin'])){
        abort(403);
    }

    $products = $db->query('select * from products')->get();

    foreach($products as &$product){
        $rating = $db->query('SELECT AVG(reviews.rating) AS rating, COUNT(reviews.rating) as rating_count FROM orderitems INNER JOIN reviews ON orderitems.order_item_id = reviews.order_item_id WHERE orderitems.product_id  = ?', [$product["product_id"]])->find();
        $product["rating"] = $rating["rating"]; 
        $product["rating_count"] = $rating["rating_count"]; 
    }
    
    view("index.view.php", [
        'title' => 'Home | Gym Builder Equipments',
        "products" => $products
    ]);
?>