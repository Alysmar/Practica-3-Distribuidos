<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implementation\UserServiceImpl;

class UserController extends Controller
{
    /**
     * @var UserServiceImpl
     */
    private $userService;
    /**
     * @var Request
     */
    private $request;

    private $validator;
    /**
     * @var UserValidator
     */

    Public function _construct(UserServiceImpl $userService, Request $request, UserValidator $userValidator)
    {
        $this->userService = $userService;
        $this->request = $request;
        $this->validator = $userValidator;
    }

    function createUser()
    {
        $response = response("", 201);

        $validator = $this->validator->validate();

        if ($validator-fails())
        {
            $response = response([
                "estatus" => 422,
                "message" => "Error",
                "errors" => $validator->errors()
            ], 422);
        } else{
            $this->userService->postUser($this->request->all());
        }

        return $response;
    }

    function getListUser()
    {
        return response($this->userService->getUser());
    }

    function putUser(int $id) {

        $response = response("", 202);

        $validator = $this->validator->validate();

        if ($validator-fails())
        {
            $response = response([
                "estatus" => 422,
                "message" => "Error",
                "errors" => $validator->errors()
            ], 422);
        } else{
            $this->userService->putUser($this->request->all(), $id);
        }


        return $response;
    }

    function deleteUser(int $id)
    {
        $this->userService->delUser($id);
        return response("", 204);
    }

    function restoreUser(int $id)
    {
        $this->userService->restoreUser($id);
        return response("", 204);
    }
}
