<?php
/**
 * Serializing an object means converting it to a byte-stream 
 * representation that can be stored in a file.
 * Serialization in PHP is mostly automatic—it requires little extra work from you,
 * beyond calling the serialize() and unserialize() functions
 * PHP has two hooks for objects during the serialization and deserialization process: 
 * __sleep() and __wakeup()
 * The __sleep() method is called on an object just before serialization
 * it can perform any cleanup necessary to preserve the object’s state
 * It should return an array containing the names of the data members
 * The __wakeup() method is called on an object immediately after an 
 * object is created from a byte-stream
 */

 class Log { 
    private $filename;
    private $fh;
    function __construct($filename) { 
        $this->filename = $filename;
        $this->open();
    }
    function open() {
        $this->fh = fopen($this->filename, 'a') or die("Can't open {$this->filename}"); 
    }
    function write($note) { 
        fwrite($this->fh, "{$note}\n"); 
    }
    function read() {
        return join('', file($this->filename)); 
    }
    function __wakeup () {
        $this->open();
    }
    function __sleep() {
    // write information to the account file fclose($this->fh);
    return ["filename"];
    } }

?>