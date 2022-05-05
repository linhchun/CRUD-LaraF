<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMembers()
    {
        $members = Member::all();
        return view('show')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function save(Request $request)
{
     $member = new Member;
      $member->firstname = $request->input('firstname');
    $member->lastname = $request->input('lastname');
    $member->save();
    return redirect('/');
    
    
    }

    public function update(Request $request, $id)
    {
       $member = Member::find($id);
        $input = $request->all();
        $member->fill($input)->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members = Member::find($id);
        $members->delete();
  
        return redirect('/');
    }
}
