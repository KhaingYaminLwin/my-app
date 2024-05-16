<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeControler extends Controller
{
    public function index() 
    {
        // $users = User::with('posts');
        $users = User::all();
        // dd($user->posts);
        // foreach($user->posts as $post){
        //     dd($post->title);
        // }
        // $post->user->name;
        return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:5', 'max:15'],
            'phone_no' => ['required']
        ],
        [
            'name.required' => 'နာမည်ဖြည့်သွင်းရန်လိုအပ်ပါသည်။'
        ]
    );
    // $data['password'] = Hash::make($request->password);
    // $user = new User();
    // $user->name =  $request->name;
    // $user->email = $request->email;
    // $user->password =  Hash::make($request->password);
    // $user->phone_no = $request->phone_no;
    // $user->save();

    User::create($data);

    return redirect()->route('user.index')->with('success', 'Successfully Created!');

    }

    public function edit($id)
    {
        // $user = User::where('id', $id);
        $user = User::findOrFail($id);

        return view('edit', compact('user'));
    
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['nullable'],
            'phone_no' => ['required']
        ],
        [
            'name.required' => 'နာမည်ဖြည့်သွင်းရန်လိုအပ်ပါသည်။'
        ]
        );

        if($request->password){
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $user->password;
        }
        // dd($data['password']);
        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Successfully Updated!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Successfully Deleted');
        
    }
}
