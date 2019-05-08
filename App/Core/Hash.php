<?php


class Hash {

  function make($str, $algo=PASSWORD_BCRYPT, $opts=null, $prehash = null) {
    // $str .=self::mix_hash(self::prefix_hash($prehash).'_').$str;
    $opts = [
      'cost' => 12,
    ];
    return password_hash( $str, $algo, $opts );
  }

  function check( $str, $hash ) {
    return password_verify( $str, $hash );
  }

  function needsRehash( $str, $algo=PASSWORD_DEFAULT, $opts=null ) {
    return password_needs_rehash( $str, $algo, $opts );
  }

  function random( $length=32 ) {
    return substr( md5( mt_rand() ), 0, $length );
  }

  public static function mix_hash($str)
  {
    return md5(sha1($str));
  }

  public static function prefix_hash($pre){

    return $pre;
  }
}
