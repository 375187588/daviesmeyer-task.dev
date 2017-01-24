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
     * Method for getting all users from db.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsersForSuperadmin()
    {
        return UserModel::all();
    }

    /**
     * Method for getting all users from db.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsersForAdmin()
    {
        return UserModel::where('role_id', 3)
            ->get();
    }

    /**
     * Method for creating new user in db.
     *
     * @param array $params
     * @return bool
     */
    public function createNewUser($params)
    {
        $user = new UserModel();

        $user->username = $params['username'];
        $user->password = md5($params['password']);
        $user->first_name = $params['first_name'];
        $user->last_name = $params['last_name'];
        $user->address = $params['address'];
        $user->city = $params['city'];
        $user->phone = $params['phone'];
        $user->medical_institution = $params['medical_institution'];
        $user->role = isset($params['role']) ? $params['role'] : 2;
        $user->active = isset($params['active']) ? $params['active'] : 1;

        return $user->save();
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
     * Method for updating user in db.
     *
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateUser($params, $id)
    {
        $user = UserModel::find($id);

        $user->username = $params['username'];
        if (isset($params['password'])) {
            $user->password = md5($params['password']);
        }
        $user->first_name = $params['first_name'];
        $user->last_name = $params['last_name'];
        $user->address = $params['address'];
        $user->city = $params['city'];
        $user->phone = $params['phone'];
        $user->medical_institution = $params['medical_institution'];
        if (isset($params['token'])) {
            $user->token = $params['token'];
        }
        if (isset($params['active'])) {
            $user->active = $params['active'];
        }

        return $user->save();
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
        $user->password = Hash::make($params['password']);
        $user->token = null;

        return $user->save();
    }

}