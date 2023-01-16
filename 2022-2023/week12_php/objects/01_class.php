<?php
class Cat {
  public $name = '';

  // if a visibility is not specified, a method is public
  function getName() {
    return $this->name;
  }
  function setName($name) {
    $this->name = $name;
  }
}

$foo = new Cat();
$foo->setName("Foo");
echo $foo->getName(), "\n";


class HTMLStuff {
  static function p($text) {
    echo "<p>$text</p>";
  }
}

HTMLStuff::p("hello");

echo "\n";

class Person {
  public $age;
  protected $id;
  public function __construct($age, $id) {
    $this->age = $age;
    $this->id = $id;
  }
  public function incrementAge() {
    $this->age++;
    $this->ageChanged();
  }
  public function decrementAge() {
    $this->age -= 1;
    $this->ageChanged();
  }

  public function getId() {
    return $this->id;
  }

  private function ageChanged() {
    echo "age changed to {$this->age}\n";
  }
}

class SupernaturalPerson extends Person {
  public function incrementAge() {
    // ages in reverse
    $this->decrementAge();
  }
}

$bar = new Person(1, 1);
$bar->incrementAge();
$bar->decrementAge();

$benjaminButton = new SupernaturalPerson(1, 2);
$benjaminButton->incrementAge();
echo "Bar's id {$bar->getId()}\n";
echo "Benjamin's id {$benjaminButton->getId()}\n";


// declaring constants

class PaymentMethod {
  public const TYPE_CREDITCARD = 0;
  public const TYPE_CASH = 1;
  private const INTERNAL_KEY = "ABC1234";
}

echo PaymentMethod::TYPE_CREDITCARD, "\n";
// echo PaymentMethod::INTERNAL_KEY, "\n"; // can't do this

 ?>
