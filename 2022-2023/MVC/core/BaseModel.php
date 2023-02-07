<?php

abstract class BaseModel
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_UNIQUE = 'unique';
    public const RULE_PREG_MATCH = 'preg_match';

    public array $errors = [];

    /**
     * @param $data - will get the data from the request and load it in the current model
     * @return void
     */
    public function loadData($data): void
    {
        foreach ($data as $k=>$v) {
            if(property_exists($this, $k)) {
                $this->{$k} = $v;
            }
        }
    }

    /**
     * @return array - An associative array with rules
     * If you want your password to be not only a required field but also a valid password you return an array of:
     * [RULE_REQUIRED, [RULE_PREG_MATCH, 'regex_pattern', 'Error message in case the matching fails]
     * RULE_REQUIRED and RULE_EMAIL can be passed directly
     * RULE_MIN and RULE_MAX need another value, so you have to pass an array with two values, one for the rule and one for the boundary
     * RULE_PREG_MATCH needs the pattern and the error message you want to display if the match fails, therefore you need an array with 3 items
     */
    abstract public function rules(): array;

    public function labels():array {
        return [];
    }

    public function getLabel($attribute) {
        return $this->labels()[$attribute] ?? $attribute;
    }

    /**
     * @return bool - true if the model being checked passes all the self-defined rules otherwise false
     */
    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                if($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                }

                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, self::RULE_EMAIL);
                }

                if($ruleName === self::RULE_MIN && strlen($value) < $rule[1]) {
                    $this->addErrorForRule($attribute, self::RULE_MIN, ['min' => $rule[1]]);
                }

                if($ruleName === self::RULE_MAX && strlen($value) > $rule[1]) {
                    $this->addErrorForRule($attribute, self::RULE_MAX, ['max' => $rule[1]]);
                }

                if($ruleName === self::RULE_UNIQUE) {
                    $className = $rule[1];
                    $uniqueAttribute = $rule[2] ?? $attribute;
                    $tableName = $className::tableName();
                    $stmt = Application::$APP->getDb()->prepare("select * from $tableName where $uniqueAttribute = :attr");
                    $stmt->bindValue(":attr", $value);
                    $stmt->execute();
                    $record = $stmt->fetchObject();
                    if($record) {
                        $this->addErrorForRule($attribute, self::RULE_UNIQUE, ['field'=>$this->getLabel($attribute)]);
                    }
                }

                if($ruleName === self::RULE_PREG_MATCH) {
                    $regex = $rule[1];
                    $errorMsg = $rule[2];
                    if(!preg_match($regex, $value)) {
                        $this->addError($attribute, $errorMsg);
                    }
                }
            }
        }
        return empty($this->errors);
    }

    private function addErrorForRule($attribute, $rule, $params = []): void
    {
        $msg = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $k => $v) {
            $msg = str_replace("{{$k}}", $v, $msg);
        }
        $this->errors[$attribute][] = $msg;
    }

    public function addError($attribute, $msg): void
    {
        $this->errors[$attribute][] = $msg;
    }

    private function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => "This field is required",
            self::RULE_EMAIL => "This field must be a valid email address",
            self::RULE_MIN => "Min length of this field must be {min}",
            self::RULE_MAX => "Max length of this field must be {max}",
            self::RULE_UNIQUE => "Record with this {field} already exists",
        ];
    }

    public function hasError($attribute) {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute) {
        return $this->errors[$attribute][0] ?? '';
    }

}