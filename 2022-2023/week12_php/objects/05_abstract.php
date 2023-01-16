<?php

// Abstract classes cannot be instantiated
abstract class Component {
  abstract function printOut();
}

class Image extends Component {
  function printOut() {
    echo "pretty image \n";
  }
}

/*
Traits can also declare abstract methods.
Classes that include a trait that defines an abstract method must implement that method
*/

trait Sortable {
  abstract function uniqueId();
  function compareById($object) {
    return ($object->uniqueId() < $this->uniqueId()) ? -1 : 1;
  }
}
class Bird {
  use Sortable;
  public $id;
  
  function uniqueId() {
    return __CLASS__ . ":{$this->id}";
  }
}

?>
