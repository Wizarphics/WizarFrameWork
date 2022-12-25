<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 7/3/22, 3:50 AM
 * Last Modified at: 7/3/22, 3:50 AM
 * Time: 3:50
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

namespace app\models;

use wizarphics\wizarframework\interfaces\ValidationInterface;
use wizarphics\wizarframework\UserModel;

class User extends UserModel
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $passwordConfirm = '';

    public string $remberMe = '';
    public string $consent = '';
    public string $range = '';
    public string $switch = '';
    public string $search = '';
    public $pin = '';
    public $image = null;

    public $color = '';

    public $dateTime = '';

    public $date = '';
    public $time = '';
    public $number = '';

    public $message = '';

    public $tel = '';

    public $select = [];

    /**
     * Class constructor.
     */
    public function __construct(?ValidationInterface $validator = null)
    {
        parent::__construct($validator);
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = $this->passwordHandler->hashPassword($this->password);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED, $this->validator::RULE_ALPHA],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_UNIQUE . ':'.$this->tableName().'.email'],
            'password' => [self::RULE_REQUIRED, self::RULE_MIN.':8', self::RULE_MAX.':24'],
            'passwordConfirm' => [self::RULE_REQUIRED, self::RULE_MATCH.':password'],
            // 'consent' => [self::RULE_REQUIRED],
        ];
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return [
            'firstname',
            'lastname',
            'email',
            'password',
            'status',
        ];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'passwordConfirm' => 'Confirm Password',
            'consent' => 'I\'ve read and agree to the <a href="https://" class="text-danger">Terms</a> and <a href="https://" class="text-danger">Conditions</a>',
            'select' => 'Select One',
            'remberMe' => 'Stay signed in.'
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    /**
     * @return UserModel
     */
    public function setLoginFields(): UserModel
    {
        $this->loginFields = ['email', 'password'];
        return $this;
    }
}
