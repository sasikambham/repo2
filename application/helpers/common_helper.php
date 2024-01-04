<?php 
$ci = &get_instance();
$ci->load->helper('string');

if (!function_exists('hash_password_md5')) {
    function hash_password_md5($password) {
        if (!empty($password)) {
            $password_hashed = md5($password);
            return $password_hashed;
        }
        return null; // Or you can return false or any other default value
    }
}
