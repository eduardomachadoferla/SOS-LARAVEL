<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; use Illuminate\Support\Facades\Auth;
class AuthController extends Controller { public function loginForm(){return view('admin.login');} 
public function login(Request $r){$d=$r->validate(['email'=>'required|email','senha'=>'required']);
 if(Auth::attempt(['email'=>$d['email'],'password'=>$d['senha']],
 $r->boolean('remember')))
 {$r->session()->regenerate(); return redirect()->intended(route('admin.dashboard'));
 } return back()->withInput($r->only('email'))->with('erro','E-mail ou senha inválidos.');
 } public function logout(Request $r){Auth::logout();
 $r->session()->invalidate();$r->session()->regenerateToken()
 ;return redirect()->route('admin.login');}}