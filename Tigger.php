<?php
class Tigger {
    private static $instance;
    private $contador = 0;

    private function __construct() {
        echo "Building character..." . PHP_EOL;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Tigger();
        }
        return self::$instance;
    }

    public function roar() {
        echo "Grrr!" . PHP_EOL;
        $this->contador++;
    }

    public function getCounter() {
        return $this->contador;
    }
}


$tigger1 = Tigger::getInstance();
echo '<br>';
$tigger1->roar();
echo '<br>';
$tigger2 = Tigger::getInstance();
$tigger2->roar();
echo '<br>';
$tigger3 = Tigger::getInstance();
$tigger3->roar();
echo '<br>';
$tigger4 = Tigger::getInstance();
$tigger4->roar();
echo '<br>';
$tigger5 = Tigger::getInstance();
$tigger5->roar();
echo '<br>';
echo "Number of roars: " . $tigger5->getCounter();