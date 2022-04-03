<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include_once 'config.php';
$action = (isset($_GET['action']) ? $_GET['action'] : '');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$value = (isset($_GET['value']) ? $_GET['value'] : '');



if ($_SESSION['cartItems'] == false) {
    $_SESSION['unique'] = array();
    $_SESSION['cartItems'] = array();
}

switch ($action) {
    case "add":
        global $Products;
      
        for ($i = 0; $i < count($Products); $i++) {
           
            if ($Products[$i]["id"] == $id) {
                 
                array_push($_SESSION["cartItems"], $id);
                $_SESSION['unique'] = array_count_values($_SESSION['cartItems']);
                echo json_encode(($_SESSION['unique']));
                
            }
        }
        
        break;
 
    case 'delete':
        
        $x = count($_SESSION['cartItems']);
        for ($i = 0; $i < $x; $i++) {
            if ($id == $_SESSION['cartItems'][$i]) {
                unset($_SESSION['cartItems'][$i]);
            }
        }
        // unset($_SESSION['unique'][$id]);
        $_SESSION['cartItems'] = array_values($_SESSION['cartItems']);
        $_SESSION['unique'] = array_count_values($_SESSION['cartItems']);
        echo json_encode(($_SESSION['unique']));
        break;

    case "update":
        
        $x = count($_SESSION['cartItems']);
        for ($i = 0; $i <= $x; $i++) {
            if ($id == $_SESSION['cartItems'][$i]) {
                unset($_SESSION['cartItems'][$i]);
            }
        }
        for ($i = 0; $i < $value; $i++) {
            array_push($_SESSION['cartItems'], $id);
        }
        $_SESSION['cartItems'] = array_values($_SESSION['cartItems']);
        $_SESSION['unique'] = array_count_values($_SESSION['cartItems']);
        // $_SESSION['unique'][$id] = $value;
        echo json_encode(($_SESSION['unique']));
        break;
 }
