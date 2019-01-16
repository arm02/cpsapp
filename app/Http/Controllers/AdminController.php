<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kegiatan()
    {
    	return view('operator.kegiatan.index');
    }

    public function indexadmin()
    {
    	return view('admin.index');
    }

    public function indexoperator()
    {
    	return view('operator.index');
    }

    public function indexsuper()
    {
    	return view('super.index');
    }

    public function dataadmin()
    {
    	return view('admin.Admin.index');
    }

    public function addadmin()
    {
    	return view('admin.Admin.add');
    }

    public function saveadmin(Request $r)
    {
    	$n = new User;
    	$n->name = $r->input('name');
    	$n->email = $r->input('email');
    	$n->password = bcrypt($r->input('password'));
    	$n->role = $r->input('role');
    	$n->status = $r->input('status');
    	$n->save();
    	return redirect(url('admin/dataadmin'));
    }

    public function editadmin($id)
    {
    	$user = User::find($id);
    	return view('admin.Admin.edit')->with('user',$user);
    }

    public function updateadmin(Request $r)
    {
    	$user = User::find($r->id);
    	$status = "1";
    	$user->status = $status;
    	$user->save();
    	return redirect(url('admin/dataadmin'));
    }

    public function updateadmin2(Request $r)
    {
        $user = User::find($r->id);
        $status = "2";
        $user->status = $status;
        $user->save();
        return redirect(url('admin/dataadmin'));
    }

    public function deleteadmin($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect(url('admin/dataadmin'));
    }

    public function dataoperator()
    {
    	return view('operator.Operator.index');
    }

    public function addoperator()
    {
    	return view('operator.Operator.add');
    }

    public function saveoperator(Request $r)
    {
    	$n = new User;
    	$n->name = $r->input('name');
    	$n->email = $r->input('email');
    	$n->password = bcrypt($r->input('password'));
    	$n->role = $r->input('role');
    	$n->status = $r->input('status');
    	$n->save();
    	return redirect(url('admin/dataoperator'));
    }

    public function editoperator($id)
    {
    	$user = User::find($id);
    	return view('operator.Operator.edit')->with('user',$user);
    }

    public function updateoperator(Request $r)
    {
    	$user = User::find($r->id);
    	$status = "1";
    	$user->status = $status;
    	$user->save();
    	return redirect(url('admin/dataoperator'));
    }

    public function updateoperator2(Request $r)
    {
        $user = User::find($r->id);
        $status = "2";
        $user->status = $status;
        $user->save();
        return redirect(url('admin/dataoperator'));
    }

    public function deleteoperator($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect(url('admin/dataoperator'));
    }

    public function datasuper()
    {
    	return view('super.Super.index');
    }

    public function addsuper()
    {
    	return view('super.Super.add');
    }

    public function savesuper(Request $r)
    {
    	$n = new User;
    	$n->name = $r->input('name');
    	$n->email = $r->input('email');
    	$n->password = bcrypt($r->input('password'));
    	$n->role = $r->input('role');
    	$n->status = $r->input('status');
    	$n->save();
    	return redirect(url('admin/datasuper'));
    }

    public function editsuper($id)
    {
    	$user = User::find($id);
    	return view('super.Super.edit')->with('user',$user);
    }

    public function updatesuper(Request $r)
    {
    	$user = User::find($r->id);
    	$status = "1";
    	$user->status = $status;
    	$user->save();
    	return redirect(url('admin/datasuper'));
    }

    public function updatesuper2(Request $r)
    {
        $user = User::find($r->id);
        $status = "2";
        $user->status = $status;
        $user->save();
        return redirect(url('admin/datasuper'));
    }

    public function deletesuper($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect(url('admin/datasuper'));
    }
}
