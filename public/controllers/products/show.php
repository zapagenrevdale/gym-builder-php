<?php

    use Core\Database;
    use Core\App;

    if(!isset($_GET["product_id"])){
        abort(404);
    }

    $db = App::resolve(Database::class);
    
    $_SESSION['previous_route'] = $_SERVER['REQUEST_URI'];
    
    $product = $db->query('select * from products where product_id = ?', [$_GET["product_id"]])->findOrFail();
    $tutorial = $db->query('select * from tutorials where product_id = ?', [$_GET["product_id"]])->find();
    $title = $product["name"] ." | Admin Gym Builder";

    $review = $db->query('SELECT AVG(reviews.rating) AS rating, COUNT(reviews.rating) as rating_count FROM orderitems INNER JOIN reviews ON orderitems.order_item_id = reviews.order_item_id WHERE orderitems.product_id  = ?', [$product["product_id"]])->find();
    $reviews = $db->query('SELECT reviews.*, CONCAT(users.first_name, " ", users.last_name) as name FROM orderitems INNER JOIN reviews ON orderitems.order_item_id = reviews.order_item_id INNER JOIN users ON users.user_id = reviews.user_id WHERE orderitems.product_id  = ? ORDER BY reviews.rating DESC, reviews.created_at DESC', [$product["product_id"]])->get();
    $product["rating"] = $review["rating"]; 
    $product["rating_count"] = $review["rating_count"]; 
    $product["reviews"] =  $reviews;

 
 
    view("products/show.php", [
        "title" => $title,
        "product" =>  $product,
        "tutorial" =>  $tutorial,
    ]);
?>