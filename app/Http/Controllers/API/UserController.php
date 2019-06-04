<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request)
    {
        // $this->validate($request, ['email' => 'required|email', 'password' => 'required|min:6|max:20',], ['email.required' => 'Vui lòng nhập email', 'email.email' => 'Email không đúng định dạng', 'password.required' => 'Vui lòng nhập mật khẩu', 'password.min' => 'Mật khẩu ít nhất 6 kí tự', 'password.max' => 'Mật khẩu không quá 20 kí tự']);
        // if ($validator->fails()) {
        //     return $this->errorResponse(self::ERROR_BAD_REQUEST, [], self::getErrorMessage(self::ERROR_BAD_REQUEST));
        // }
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('a.com');
        } else {
            // return redirect('login')->with('status', 'Please try again!');
        }
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 401);
        // }
        if ($validator->fails()) {
            return $this->errorResponse(self::ERROR_BAD_REQUEST, [], self::getErrorMessage(self::ERROR_BAD_REQUEST));
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        return $this->successResponse(
            $success,
            'Regiter new user successfully'
        );
        // return response()->json(['success' => $success], $this->successStatus);
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details()
    {
        $user = Auth::user();
        return $this->successResponse(
            $user,
            'Get details user successfully'
        );
        // return response()->json(['success' => $user], $this->successStatus);
    }
}
