<?php
class Controller_chat extends Controller{
  public function action_default(){
      $this->action_addMessage();
      $this->action_last();
  }

  public function action_addMessage(){
    $m = Model::getModel();
    $data = ['tab' =>$m->addMessage()];
    $this-> render("chat",$data);
  }

  public function action_get_last(){
    $m = Model::getModel();
    $tab = ['tab' =>$m->get_last()];
    $this-> render("chat",$tab);
    }
}


?>
