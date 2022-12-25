<?php

namespace app\models;

use wizarphics\wizarframework\Model;

class ContactModel extends Model{
    

    public string $name='';

    public string $subject='';
    public string $email='';

    public string $body='';

    /**
     */
    public function __construct() {
        parent::__construct();
    }
	/**
	 * @return array
	 */
	public function rules(): array {
        return [
            'name' => [self::RULE_REQUIRED],
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>15]]
        ];
	}

    public function labels():array
    {
        return [
            'name'=>'Name',
            'subject'=>'Subject',
            'email'=>'Email Address',
            'body'=>'Body',
        ];
    }

    public function send()
    {        
        return true;
    }
}