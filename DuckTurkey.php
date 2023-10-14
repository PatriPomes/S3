<?php

class Duck {

public function quack() {
       echo "Quack \n";
}

public function fly() {
       echo "I'm flying \n";
}
}

class Turkey {

public function gobble() {
       echo "Gobble gobble \n";
}

public function fly() {
echo "I'm flying a short distance";
}
}
class TurkeyAdapter extends Duck{
    private $turkey;

    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }

    public function quack(){
        $this->turkey->gobble();
    }
    public function fly(){
        for ($cont=0; $cont<5; $cont++){
            $this->turkey->fly();
        }

    }
}
function duck_interaction($duck) {
    $duck->quack();
    $duck->fly();
}
$duck = new Duck;
$turkey = new Turkey;
$tunedTurkey = new TurkeyAdapter($turkey);
echo "The Turkey says...";
echo"<br>";
$turkey->gobble();
echo"<br>";
$turkey->fly();
echo"<br>";
echo"<br>";
echo "The Duck says...";
echo"<br>";
$duck->quack();
echo"<br>";
$duck->fly();
echo"<br>";
duck_interaction($duck);
echo"<br>";
echo"<br>";
echo "The TunedTurkey says...";
echo"<br>";
duck_interaction($tunedTurkey);


?>