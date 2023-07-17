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

        public static function validateFilePresence($value) {
            return $value !== null && !empty($value["name"]) && !empty($value["full_path"]);
        }

        public static function validateFile($value, $allowedFormats) {
            if(!self::validateFilePresence($value)){
                return false;
            }

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $value['tmp_name']);
            finfo_close($finfo);

            return in_array($mimeType, $allowedFormats);
        }

        public static function image($value){
            $allowedFormats = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

            return self::validateFile($value, $allowedFormats);
        }

        public static function video($value){
            $allowedFormats = ['video/mp4', 'video/mpeg', 'video/quicktime', 'video/x-msvideo', 'video/x-ms-wmv'];

            return self::validateFile($value, $allowedFormats);
        }

        public static function price($value){
            return is_numeric($value) && floatval($value) > 0;
        }

        public static function item($value){
            return is_numeric($value) && strpos($value, '.') === false && strpos($value, 'e') === false;
        }

        public static function quantity($value){
            return self::item($value) && intval($value) > 0;
        }

        public static function password($value){
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z]).{6,}$/';
            return preg_match($pattern, $value);
        }

        public static function mobileNumber($value){
            // Check if the resulting value is a valid mobile number format
            return preg_match('/^\+639\d{9}$/', $value);
        }
    }
?>