<?php

namespace App\Services\Implementation;

use App\Services\Interfaces\IUserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements IUserServiceInterface
{
    private $model;

    function _construct()
    {
        $this->model = new User();
    }

    function getUser()
    {
        return $this->model->withTrashed()->get();
    }

    Function getUserById(int $id)
    {

    }
    /**
     * crea un nuevo usuario en el sistema
     */
    function postUser(array $user)
    {
        $user['password'] = Hash::make($user['password']);
        $this->model->create($user);
    }

    function putUser(array $user, int $id)
    {
        $user['password'] = Hash::make($user['password']);
        $this->model->where('id', $id)
        ->first()
        ->fill($user)
        ->save();
    }

    function delUser(int $id)
    {
        $user = $this->model->find($id);

        if ($user != null)
        {
            $user->delete();
        }
    }

    function restoreUser(int $id)
    {
        $user = $this->model->withTrashed()->find($id);

        if ($user != null)
        {
            $user->restore();
        }
    }

    

}