<?php
/**
 *
 */
class Config
{
  public $title;

  public $description;

  public $email;

  public $base_url;
  
  public function __construct(array $data = ['title' => 'Fxreport', 'description' => 'Bitcoin is a cryptocurrency and worldwide payment system. It is the first decentralized digital currency, as the system works without a central bank.', 'email' => 'help@fxreport.com', 'base_url' => 'http://localhost/fxreport/public/']) {

    $this->title = $data['title'];
    $this->description = $data['description'];
    $this->email = $data['email'];
    $this->base_url = $data['base_url'];

  }

  public function app() {
    return $this;
  }

  public function name() {
    return $this->title;
  }
  public function email() {
    return $this->email;
  }
}
