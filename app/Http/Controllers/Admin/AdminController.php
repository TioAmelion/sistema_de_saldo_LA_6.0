<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Noticia;
use App\Permission;
use App\Role;
use App\User;
use Gate;

class AdminController extends Controller
{
    public function
    index() {

        $noticias    = Noticia::count();
        $permissions = Permission::count();
        $users       = User::count();
        $roles       = Role::count();

        return view('admin.home.index', compact('noticias', 'permissions', 'users', 'roles'));
    }

    public function listarUser()
    {
        $users = User::all();return view('admin.pages.users.listarUsers', compact('users'));
    }

    public function
    aa() {
        if (condition) {
            if
            (condition) {
                return
                    0;}
        }
    }

    public function update($id)
    {
        $noticia = Noticia::find($id);

        //$this->authorize('update-post', $noticia);

        if (Gate::denies('updatePost', $noticia)) {
            abort('403', 'unauthorized');
        }

        return view('admin.home.update', [
            'noticia' => $noticia,
        ]);
    }

    public function rolesPermissions()
    {
        $nomeUser = auth()->user()->name;
        var_dump($nomeUser);

        foreach (auth()->user()->roles as $role) {
            var_dump('Permissão do User - ' . $role->name);

            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                var_dump($permission->name);
            }
        }

    }
}
