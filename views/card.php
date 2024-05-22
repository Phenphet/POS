<?php 
    session_start();

    include_once('../service/CardController.php'); 

    header('Content-Type: application/json'); 

    $card = new CardController();

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if($action == "add"){
            if(isset($_GET['item'])){
                $idItem = htmlspecialchars($_GET['item']);
                $card->addCard($idItem);
                echo json_encode(["message"=>"add item success"]);
            }else{
                echo json_encode(["error"=>"item not found"]);
            }
        }elseif ($action == "remove") {
            $card->removeCardAll();
            echo json_encode(["message" => "remove item success"]);
        }else{
            echo json_encode(["error" => "invalid action"]);
        }
    }
    