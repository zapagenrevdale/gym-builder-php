<?php
    $db->query('delete from products where product_id = ?', [$_POST["product_id"]]);
    header("Location: /admin/products");
    exit;
?>