<?php

namespace App\Http\Controllers\APi\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\Phone;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Notifications\Userlogin;
use Auth;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'phone_number'=> 'required|numeric|min:10',
            'country_name'=> 'required'
        ],
        [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
            'password.min' => 'enter over than 6 letter',
            'phone_number.required' => 'phone_number is required',
            'phone_number.min' => 'phone_number over than 10 letter',
            'phone_number.numeric' => 'phone_number must be numeric',
            'country_name.required' => 'country_name is required'
        ]);
        
    }
    protected function register(Request $request){
       
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'Error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $user=$this->create($request->all());
        if ($user==false) {
            return response()->json([
                'status' => 0,
                'message' => 'Error',
                'errors' => 'Error Occured'
            ]);
        }
        $user=User::where('id',$user->id)->first();
        $user->notify(new Userlogin($user));
        return response()->json([
            'status' => 1,
            'message' => 'success',
        ]);
    }
    protected function create(array $data)
    {
        \DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);
            $phone = Phone::create([
                'user_id' => $user->id,
                'phone_number' => $data['phone_number']
            ]);
            $phone = Country::create([
                'user_id' => $user->id,
                'country_name' => $data['country_name']
            ]);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());

            return false;
        }
        return $user;
    }
}
