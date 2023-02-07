<?php

require_once 'core/BaseModel.php';

abstract class DbModel extends BaseModel
{
    /**
     * @return string - table name in the database for the model
     */
    abstract public function tableName(): string;

    /**
     * @return array - simple array of string values that represent the database attributes of each model
     */

    abstract public function attributes(): array;

    /**
     * @return string - primary key in the database for each model
     * Usually is id but consider a Book model with ISBN as primary key
     */

    abstract public function primaryKey(): string;

    /**
     * @return true - whether saving the object was successful
     * Generic query to save DB models, you don't have to write a separate query for each model
     * Just make sure to define attributes correctly for each model
     */
    public function save() {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($x) => ":$x", $attributes);
        $stmt = self::prepare("insert into $tableName (" . implode(',', $attributes)
            . ") values (" . implode(",", $params) . ");");
        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }
        $stmt->execute();
        return true;
    }

    public static function prepare($sql) {
        return Application::$APP->getDb()->prepare($sql);
    }

    /**
     * @param array $where - an associative array containing query params you want to search
     * @param $tableName - table name
     * @return DbModel Generic query to search for a single row
     * Generic query to search for a single row
     * If you want to search for User with first name Foo and last name Bar pass $where = ['firstName'=>'Foo', 'lastName' => 'Bar']
     */
    public static function findOne(array $where, $tableName): self
    {
        $attributes = array_keys($where);
        $str = implode("and ", array_map(fn($x) => "$x = :$x", $attributes));
        $stmt = self::prepare("select * from $tableName where $str;");
        foreach ($where as $k => $v) {
            $stmt->bindValue(":$k", $v);
        }
        $stmt->execute();
        return @$stmt->fetchObject(static::class);
    }
}