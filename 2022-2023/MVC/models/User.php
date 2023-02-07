<?php

require_once 'core/DbModel.php';

class User extends DbModel
{
    public string $firstName = '';
    public string $lastName = '';
    public string $password = '';
    public string $email = '';
    private const TABLE_NAME = 'users';

    public function save() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,32}$/";
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_PREG_MATCH, $passwordRegex, "Password very week"]],
        ];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'firstName' => 'First name',
            'lastName' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function tableName(): string
    {
        return self::TABLE_NAME;
    }

    /**
     * @return string[]
     * return all the DB properties of this class
     * you may create other properties not part of the DB model
     */
    public function attributes(): array
    {
        return ['firstName', 'lastName', 'email', 'password'];
    }

    public static function findOne(array $where, $tableName = self::TABLE_NAME): User
    {
        return parent::findOne($where, $tableName);
    }


    public function primaryKey(): string
    {
        return 'id';
    }

    public function getDisplayName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}