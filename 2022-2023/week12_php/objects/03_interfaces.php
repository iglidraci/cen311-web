<?php

/*
An interface may inherit from other interfaces (including multiple interfaces)
as long as none of the interfaces it inherits from, declares methods with the
same name as those declared in the child interface
*/
interface Edible {
  function eat();
}

// may implement multiple interfaces
class Apple implements Edible {
  function eat() {
    echo "an apple a day keeps the doctor away \n";
  }
}

?>
