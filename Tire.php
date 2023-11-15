<?php

class Tire {

  function __construct(public $pressure, public $size) {
    echo "Tire Created";
  }
}