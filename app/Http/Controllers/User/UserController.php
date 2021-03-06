<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestResetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\User\UserRepository;
use App\UtilityHelpers\UtilityHelpers;
use Illuminate\Support\Facades\Log;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $userHandler;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userHandler = new $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forgotPasswordForm()
    {
        return view('forgot-password');
    }

    /**
     * @param RequestResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function requestResetPassword(RequestResetPasswordRequest $request)
    {
        $params = $request->all();

        $user = $this->userHandler->getUserByEmail($params['email']);

        if ($user !== null)
        {
            try {
                $token = md5(uniqid(time(), true));
                $this->userHandler->setResetPasswordToken($token, $user->id);
                $email = [
                    'message' => 'Please follow the link to reset your password: ' . url('/password-recover/' . $token),
                    'from'    => 'zteblade3.dm@gmail.com',
                    'to'      => $params['email'],
                    'subject' => 'Request for password reset.'
                ];
                UtilityHelpers::sendMail($email);

            } catch (\Exception $e) {
                Log::error('Error while sending reset password mail: ', ['message' => $e->getMessage()]);
                request()->session()->flash('message', trans('passwords.error'));

                return redirect()->route('forgot-password');
            }
            request()->session()->flash('message', trans('passwords.sent'));

            return redirect()->route('forgot-password');
        }
        request()->session()->flash('message', trans('passwords.user'));

        return redirect()->route('forgot-password');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPasswordForm($secret_token)
    {
        return view('password-recover', ['secret_token' => $secret_token]);
    }

    /**
     * @param ResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $params = $request->all();

        $user = $this->userHandler->getUserByResetPasswordToken($params['secret_token']);

        if (!$user)
        {
            request()->session()->flash('message', trans('passwords.token'));

            return redirect()->route('forgot-password');
        }

        try
        {
            $this->userHandler->resetPassword($user, $params);
        } catch  (\Exception $e) {
            Log::error('Error while reseting password: ', ['message' => $e->getMessage()]);
            request()->session()->flash('message', trans('passwords.error'));

            return redirect()->route('password-recover', ['secret_token' => $params['secret_token']]);
        }
        request()->session()->flash('message', trans('passwords.reset'));

        return redirect()->route('auth.login');
    }

    /**
     * @param $id
     * @return $this
     */
    public function profile($id)
    {
        $user = $this->userHandler->getUserById($id);

        return view('admin.profile')->with('user', $user);
    }

    /**
     * @param UpdateProfileRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        $params = $request->all();

        try
        {
            $this->userHandler->updateUser($id, $params);
        } catch  (\Exception $e) {
            Log::error('Error while updating user record: ', ['message' => $e->getMessage()]);
            request()->session()->flash('message', trans('user.error'));

            return redirect()->route('admin.profile', $id);
        }
        request()->session()->flash('message', trans('user.success'));

        return redirect()->route('auth.logout');
    }


}
