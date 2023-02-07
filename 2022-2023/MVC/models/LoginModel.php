<?php

require_once 'core/BaseModel.php';
require_once 'models/User.php';

class LoginModel extends BaseModel
{
    public string $email = '';
    public string $password = '';
    public function rules(): array
    {
        $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,32}$/";
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_PREG_MATCH, $passwordRegex, "Password very week"]]
        ];
    }

    public function login(): bool
    {
        $user = User::findOne(['email'=>$this->email]);
        if(!$user) {
            $this->addError('email','User does not exist');
            return false;
        }
        if(!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        Application::$APP->setUserData($user);
        return true;
    }

    public function labels(): array
    {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }
}