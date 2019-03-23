<?php
namespace frontend\models;

use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $surname;
    public $phone;
    public $email;
    public $password;
    public $role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'surname', 'phone', 'email', 'trim'],
            ['name', 'surname', 'phone', 'password', 'string'],

            ['email','password', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 30],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been taken.'],

            ['role', 'boolean'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->role = function ($role){
           return $role ? 'organizer' : 'model';
        };

        $userProfile = new UserProfile();
        $userProfile->name = $this->name;
        $userProfile->surname = $this->surname;
        $userProfile->phone = $this->phone;

        $token = new UserToken();
        $token->generateToken(time() + 3600 * 24);


        return $user->save() ? $user : null;
    }
}
