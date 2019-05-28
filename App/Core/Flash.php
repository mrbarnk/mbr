<?php

class Session {
  public function __construct($key = '') {
    // // return 'ss';
    if (!is_null($key)) {
        if ($this->has( $key )) {
          $val = $key;
          $this->delete( $key );
          return $this->get( $val );
        }
    }
  }
  function put($key, $val) {
    return $this->set($key, $val);
  }
  function start() {
    session_start();
  }
  function set( $key, $val ) {
    $_SESSION[ $key ] = $val;
  }
  function get( $key, $def=null ) {
    return $this->has( $key ) ? $_SESSION[ $key ] : $def;
  }
  function has( $key ) {
    return isset( $_SESSION[ $key ] );
  }
  function delete( $key ) {
    if ( $this->has( $key ) ) {
      unset( $_SESSION[ $key ] );
    }
  }
  function id( $newID='' ) {
    return ( !empty( $newID ) ) ? session_id( $newID ) : session_id();
  }
  function destroy() {
    session_destroy();
  }
  function flush() {
    $this->destroy();
  }
}
