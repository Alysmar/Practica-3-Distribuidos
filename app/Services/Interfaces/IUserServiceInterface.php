<?php

namespace App\Services\Interfaces;


interface IUserServiceInterface
{
    /**
     * @return array User
     */
    function getUser();
    /**
     * @param int $id
     * @return User
     */
    Function getUserById(int $id);
    /**
     * @param int $user
     * @return void
     */
    function postUser(array $user);
    /**
     * @param array $user
     * @param int $id
     * @return void
     */
    function putUser(array $user, int $id);
    /**
     * @param int $id
     * @return boolean
     */
    function delUser(int $id);
    /**
     * @param int $id
     * @return boolean
     */
    function restoreUser(int $id);
}