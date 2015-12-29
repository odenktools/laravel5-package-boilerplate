<?php

namespace Odenktools\Boilerplate\Contracts;

interface UserRepository
{
    public function attachRole($roleName);
    
    public function attachPermission($permissionName, array $options = []);
}