<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Services\UserService;


class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function get(): UserResource
    {
        return new UserResource(UserRepository::getAuthUser());
    }

    public function store(UserCreateRequest $request): void
    {
        $this->userService->store($request->validated());
    }
}
