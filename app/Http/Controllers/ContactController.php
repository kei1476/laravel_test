<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Carbon\Carbon;


class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        return view('confirm',compact('inputs'));
    }

    public function complete(Request $request)
    {
        $btn = $request->input('btn');
        $inputs = $request->all();
        if($btn === 'back'){
            return redirect('/')->withinput();
        }else{
            Contact::create($inputs);
        }
        return view('complete');
    }

    public function showAdmin()
    {
        $contacts = Contact::paginate(10);
        return view('admin',compact('contacts'));
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $email = $request->input('email');
        $query = Contact::query();


        if(!empty($fullname)){
            $query->where('fullname','like', '%'.$fullname.'%');
        }

        if(!empty($email)){
            $query->where('email','like', '%'.$email.'%');
        }

        if(!empty($date1) || !empty($date2)){
            $query->where('created_at','>=',$date1)
                  ->where('created_at','<=',$date2);
        }

        if(!empty($gender)){
            if($gender === "3"){
                $users = $query->paginate(10);
                return view('admin',compact('users'));
            }else{
                $query->where('gender',$gender);
            }
        }

        $users = $query->paginate(10);

        return view('admin',compact('users'));
    }
}
