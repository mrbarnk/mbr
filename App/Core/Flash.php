<?php

class Flash {
  function set( $key, $val ) {
    if ( ! session_id() ) {
      session_start();
    }
    $_SESSION[ 'mbr_php_flash_msg' ][ $key ] = $val;
  }
  function has( $key ) {
    if ( ! session_id() ) {
      session_start();
    }
    return isset( $_SESSION[ 'mbr_php_flash_msg' ][ $key ] );
  }
  function get( $key ) {
    if ( ! session_id() ) {
      session_start();
    }
    if ( ! $this->has( $key ) ) {
      return null;
    }
    $val = $_SESSION[ 'mbr_php_flash_msg' ][ $key ];
    unset( $_SESSION[ 'mbr_php_flash_msg' ][ $key ] );
    return $val;
  }
  function put($key, $val) {
    return $this->set($key, $val);
  }
  function keep( $key ) {
    if ( ! session_id() ) {
      session_start();
    }
    if ( ! $this->has( $key ) ) {
      return null;
    }
    return $_SESSION[ 'mbr_php_flash_msg' ][ $key ];
  }
}
