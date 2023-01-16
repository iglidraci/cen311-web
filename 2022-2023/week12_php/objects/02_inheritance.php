<?php
// To inherit the properties and methods from another class, use the extends keyword

class Person {
  public $name, $address, $age;
  public function __construct($name, $address, $age) {
    $this->name = $name;
    $this->address = $address;
    $this->age = $age;
  }
  function introduceYourself(){
    echo "Hi, I'm {$this->name}, {$this->age} year old\n";
  }
  public function __destruct() {
    echo "person {$this->name} destroyed \n";
  }
}


class Employee extends Person {
  public $position, $salary;
  public function __construct($name, $address, $age, $position, $salary) {
    parent::__construct($name, $address, $age); // super class constructor
    $this->position = $position;
    $this->salary = $salary;
  }
  function introduceYourself() {
    /*
    Use the parent::method() notation to access an overridden method on
    an object’s parent class
    */
    parent::introduceYourself();
    echo "I work as a {$this->position} for \${$this->salary}\n";
  }
}

$p = new Person("Foo", "London", 10);
$e = new Employee("Bar", "Berlin", 20, "librarian", 1000);
$p->introduceYourself();
$e->introduceYourself();

// To check if an object is an instance of a particular class

echo $e instanceof Person, "\n";

?>
