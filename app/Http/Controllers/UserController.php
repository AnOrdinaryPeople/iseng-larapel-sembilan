<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @var User
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    private function checkPassword($data)
    {
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('user.index', [
            'users' => $this->user->list(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserCreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        $this->user->create(
            $this->checkPassword($request->validated())
        );

        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        return response($this->user->find($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($user)
    {
        return view('user.edit', [
            'user' => $this->user->find($user),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $user)
    {
        $this->user->find($user)->update(
            $this->checkPassword($request->validated())
        );

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user)
    {
        $this->user->destroy($user);
        return to_route('users.index');
    }

    /**
     * Verify the specified resource in storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($user)
    {
        $this->user->verify($user);
        return to_route('users.index');
    }
}
