<?php 
    class CardController{
        public function addCard($id){
            if(isset($id)){
                if(!isset($_SESSION['cardItem'])){
                    $_SESSION['cardItem'] = [];
                }
                $_SESSION['cardItem'][] = $id;
                return true;
            }else{
                return false;
            }
        }

        public function removeCardAll(){
            if($_SESSION['cardItem']) {
                unset($_SESSION['cardItem']);
                return true;
            }else{
                return false;
            }
        }
    }