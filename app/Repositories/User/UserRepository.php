<?php

namespace App\Repositories\User;

use App\Models\User\UserModel;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository
{
    /**
     * Method for getting user from db.
     *
     * @param array $credentials
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getUser($credentials)
    {
        return UserModel::where('username', $credentials['username'])
            ->where('password', $credentials['password'])
            ->first();
    }

    /**
     * Method for getting user by id from db.
     *
     * If user model is found, method returns user model with relational order models.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserById($id)
    {
        $user = UserModel::find($id);

        return $user;
    }
    /**
     *  Method for getting user by email from db.
     *
     * @param string $email
     * @return bool
     */
    public function getUserByEmail($email)
    {
        return UserModel::where('email', $email)
            ->first();
    }

    /**
     * Method for setting token for user in db.
     *
     * @param string $token
     * @param int $id
     */
    public function setResetPasswordToken($token, $id)
    {
        UserModel::where('id', $id)
            ->update(['token' => $token]);
    }

    /**
     * @param $token
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserByResetPasswordToken($token)
    {
        return UserModel::where('token', $token)->first();
    }


    /**
     * Method for changing user password in db.
     *
     * @param $user \Illuminate\Database\Eloquent\Model
     * @param $params array
     * @return bool
     */
    public function resetPassword($user, $params)
    {
        $user = UserModel::find($user->id);
        $user->password = Hash::make($params['password']);
        $user->token = null;

        $user->save();
    }

    /**
     * Method for updating user data in db.
     *
     * @param $id
     * @param $params array
     */
    public function updateUser($id, $params)
    {
        $user = UserModel::find($id);

        $user->email = $params['email'];

        if (isset($params['password'])) {
            $user->password = Hash::make($params['password']);
        }

        $user->save();
    }

}