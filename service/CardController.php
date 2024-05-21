<?php 
    class CardController{
        public function addCard($id){
            if(isset($id)){
                if(!isset($_SESSION['cardItem'])){
                    $_SESSION['cardItem'] = [];
                }
                $_SESSION['cardItem'][] = $id;
                return 'add item success!';
            }else{
                return 'not found id';
            }
        }

        public function removeCardAll(){
            if($_SESSION['cardItem']) {
                unset($_SESSION['cardItem']);
                // session_destroy();
            }else{
                return 'remove card item error!';
            }
        }
    }