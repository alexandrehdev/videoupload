<?php

namespace App\Shared;

enum RoleType: string
{
    case ADMIN = "admin";
    case VIEWER = "viewer";
}