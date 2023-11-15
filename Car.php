<?php

require_once "PropulsionSystem.php";
require_once "ICEngine.php";
require_once "ElectricMotor.php";
require_once "Tire.php";

class Car {
    public $color;
    public $brand;
    private $releaseYear;
    private $mileage;
    private $tires = [];
    private $propulsionSystem = [];

    public function __construct($color, $brand, $releaseYear, $mileage, $tireSize, $tirePressure, $type) {
        $this->color = $color;
        $this->brand = $brand;
        $this->releaseYear = $releaseYear;
        $this->mileage = $mileage;

        for ($i = 0; $i < 4; $i++) {
            $this->tires[] = new Tire($tireSize, $tirePressure);
        }

        // Add the motor based on the type
        if ($type === "Hybrid") {
            $this->propulsionSystem[] = new ICEngine(650, "Gasoline", 0.7);
            $this->propulsionSystem[] = new ElectricMotor(1, "Electricity", 0.8);
        } else if ($type === "Electric") {
            $this->propulsionSystem[] = new ElectricMotor(1, "Electricity", 0.8);
        } else if ($type === "Gasoline" || $type === "Diesel") {
            $this->propulsionSystem[] = new ICEngine(650, $type, 0.7);
        } else {
            echo "Car not supported";
        }
    }

    public function move() {
        echo "Car is moving\n";
    }

    public function makeNoise() {
        foreach ($this->propulsionSystem as $engine) {
            $engine->work();
        }
    }
}
