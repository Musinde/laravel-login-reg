<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        return view ('show');
    }

    public function getMembers(){
        $members = Member::all();
        
        return view ('show', compact('members'));
    }

    public function save(Request $request){
        $member = new Member;
        $member->Fullname = $request->input('Fullname');
        $member->Email = $request->input('Email');
        $member->save();
 
        return redirect('/');
    }

    public function update(Request $request, $id){
        $member = Member::find($id);
        $input = $request->all();
        $member->fill($input)->save();
 
        return redirect('/');
    }
 
    public function delete($id)
    {
        $members = Member::find($id);
        $members->delete();
  
        return redirect('/');
    }
}
