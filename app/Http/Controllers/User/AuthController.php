<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;


//Ranim
class AuthController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function registerPhone(RegisterRequest $request)
    {
        $data = $request->validated();
        $created = $this->user->createData($data);
        $created['token'] = $created->createToken('libman')->accessToken;
        return ResponseHelper::create($created);
    }

    public function loginAdmin(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $user['token'] = $user->createToken('libman')->accessToken;
            return ResponseHelper::select($user);
        } else
            return ResponseHelper::authenticationFail();
    }

    public function getInfo()
    {
        $user = $this->user->findData(['id' => Auth::id()]);
        return ResponseHelper::select($user);
    }

    public function getUsers()
    {
        $users = $this->user->allInfo();
        return ResponseHelper::select($users);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        $updatedDataStatus = $this->user->updateData(['id' => Auth::id()], $data);
        if ($updatedDataStatus == null) {
            return ResponseHelper::updatingFail();
        }
        return ResponseHelper::update();
    }

    public function logout(Request $request)
    {
        try {
            if (Auth::user()->is_admin == 0)
                $this->user->softDeleteData(['id' => Auth::id()]);
            $request->user()->token()->revoke();
            return ResponseHelper::operationSuccess();
        } catch (Exception $e) {
            return ResponseHelper::operationFail();
        }
    }

}
