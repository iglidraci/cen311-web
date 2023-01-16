<?php

/*
Traits provide a mechanism for reusing code outside of a class hierarchy.
Traits allow you to share functionality across different classes that don’t
(and shouldn’t) share a common ancestor in a class hierarchy.
*/
trait Logger {
  public function log($logString) {
    $className = __CLASS__;
    echo date("Y-m-d h:i:s", time()) . ": [{$className}] {$logString}\n";
  }
}

/*
To declare that a class should include a trait’s methods,
include the use keyword and any number of traits, separated by commas
*/

class User {
  use Logger;
  public $name;
  public function __construct($name) {
    $this->name = $name;
    $this->log("created user '{$this->name}'");
  }
  public function __toString() {
    return 'User ' . $this->name;
  }
}

class UserList {
  use Logger;
  public $users = array();
  public function add($user) {
    if (!in_array($user, $this->users)) {
      $this->users[] = $user;
      $this->log("added user '$user' to list");
    }
  }
  public function printUsers() {
    foreach($this->users as $user)
      echo $user->name, ",";
    echo "\n";
  }
}

$userList = new UserList;
$userList->add(new User("George"));
$userList->add(new User("George"));
$userList->printUsers();


/*
If a class uses multiple traits defining the same method, PHP gives a fatal error
You can override this behavior by telling the compiler specifically
which implementation of a given method you want to use.
Use the insteadof keyword for each conflict
*/

trait Command {
  function run() {
    echo "running a command \n";
  }
}

trait Marathon {
  function run() {
    echo "running in a marathon \n";
  }
}

class Runner {
  use Command, Marathon {
    Marathon::run insteadof Command;
  }
}

$runner = new Runner;
$runner->run();

/*
Instead of picking just one method to include, you can use the as keyword to
alias a trait’s method within the class including it to a different name.
You must still explicitly resolve any conflicts in the included traits
*/
class IntoSportsDev {
  use Command, Marathon {
    Command::run as runCommand;
    Marathon::run insteadof Command;
  }
}

$obj = new IntoSportsDev;
$obj->run();
$obj->runCommand();


?>
