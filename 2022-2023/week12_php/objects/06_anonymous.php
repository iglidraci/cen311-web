<?php
class DB {
  public $host;
  public $dbName;
  function commit() {
    echo "committing changes to {$this->dbName} on {$this->host} \n";
  }
}

$mockDb = new class() extends DB {
  function commit() {
    echo "commit on db was called successfully \n";
  }
};

$mockDb->commit();

?>
