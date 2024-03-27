<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // Determine the role based on form input
        $role = $request->input('role');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $role
        ]);

        // Redirect to the appropriate dashboard based on role
        return redirect()->route($this->getDashboardRoute($role));
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        throw ValidationException::withMessages([
            'email' => trans('auth.failed')
        ]);
    }



    $user = Auth::user();


    return redirect()->route($this->getDashboardRoute($user->role_id));
}

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

   private function getDashboardRoute($role)
{
    $routes = [
        1 => 'admin.home',
        2 => 'manager.home',
        3 => 'cashier.home',
        4 => 'parent.home',

    ];
    if ($role instanceof \App\Models\Role) {
        $roleName = $role->name;
    } else {
        $roleName = $role;
    }

    // Check if the route exists in the defined routes
    if (isset($routes[$roleName])) {
        return $routes[$roleName];
    } else {
      
        return 'admin.home'; // Change this to the default route you want to redirect to
    }
}

}
