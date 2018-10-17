<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class UserController extends BaseController
{
    public function users()
    {
        //return $this->response->error('This is an error.', 404);
        return $this->response->collection(User::get(),new UserTransformer());
    }
}
