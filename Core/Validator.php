<?php
    namespace Core;

    class Validator
    {
        public static function string($value, $min = 1, $max = INF)
        {
            $value = trim($value);

            return strlen($value) >= $min && strlen($value) <= $max;
        }

        public static function email($value)
        {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }

        public static function image($value){
            if($value === null){
                return false;
            }
            if(strlen($value["name"]) === 0 || strlen($value["full_path"]) === 0){
                return false;
            }

            $imageInfo = getimagesize($_FILES['productImage']['tmp_name']);
            $allowedFormats = ['jpg', 'jpeg', 'png', 'gif', "image/jpg", "image/jpeg", "image/png", "image/gif"];

            return $imageInfo && in_array($imageInfo['mime'], $allowedFormats);
        }

        public static function price($value){
            return is_numeric($_POST['price']) && floatval($_POST['price']) > 0;
        }
    }
?>