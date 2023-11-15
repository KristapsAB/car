<?php

abstract class PropulsionSystem {
    public function __construct(public $power, public $fuelType, protected $efficiency) {
    }

    abstract public function work();
}
