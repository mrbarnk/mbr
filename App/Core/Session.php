<?php

class Session {
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
}
