<?php
namespace Tirtoid\Neon\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class NeonController extends Controller
{

	/**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Login(Request $request)
    {

        if(!$session = $request->get('sess')){
            return route('google-login');
        }
        // cek user session
        $url = strtr(
            config('neon.url.check_session'),
            [
                '{sid}' => $session,
                '{client_id}' => config('neon.url.client'),
            ]
        );

        $resp = Http::get($url);

        if($resp->status() !== 200)
            return redirect(route('google-login'))->with('error', 'Invalid status while checking neon session CODE: '. $code);
        

        if (!is_array($resp->json()['data']))
            return redirect(route('google-login'))->with('error', 'Unauthorized: User tidak ditemukan');

        $data = $resp->json()['data'];

        $request->session()->put('neon_data', $data);
        $request->session()->put('sess', $session);

        return $data;
        
        /* 
        $user = config('neon.users.model');
        if(!$userExist = (new $user)->where('email', $data['email'])->first()){
            return redirect(config('neon_url'));


            //create user
            $user = User::create([
                'id' => $data['id_account'],
                'email' => $data['email'],
                'name' => $data['username'],
                'password' => Hash::make('password'),
                'role_id' => self::role()->id,
            ]);

            $id = $user->id;
        }else{
            $id = $userExist->id;
        }

        Auth::loginUsingId($id);
        $request->session()->put('sess', $session);

        return redirect(config('app.url'));
        */
    }

    public function Logout(Request $request)
    {
    	$session = session()->get('sess') ?: '';

    	$url = strtr(
            config('neon.url.logout'),
            [
                '{sid}' => $session,
            ]
        );

        $resp = Http::get($url);

        if(($code = $resp->status()) !== 200)
            return redirect(route('google-login'))->with('error', 'Invalid status while checking neon session CODE: '. $code);

        Auth::logout();
    	session()->flush();

        return redirect(route('google-login'))->with('success', 'Logged Out');
	}

    static private function role()
    {
        $role = Role::where('title', strtolower(config('neon.default_role')))->first();
        if($role->exists())
            return $role->first();

        return redirect(route('google-login'))->with('error', 'Please Check Neon Config Default Role ');
    }

    public function mailCheck(Request $request, $email)
    {
        
        $url = strtr(
            config('neon.url.check_email'),
            [
                '{email}' => $email
            ]
        );

        $resp = Http::get($url);

        if(($code = $resp->status()) !== 200)
            return redirect(route('google-login'))->with('error', 'Invalid status while checking neon session CODE: '. $code);

        return $resp->json();
        
    }

    public function sessionCheck()
    {
        $session = session()->get('sess');
        $url = strtr(
            config('neon.url.check_session'),
            [
                '{sid}' => $session,
                '{clientid}' => config('neon.client_id')
            ]
        );

        $resp = Http::get($url);


        if(($code = $resp->status()) !== 200)
            return redirect(route('google-login'))->with('error', 'Invalid status while checking neon session CODE: '. $code);

        return $resp->json();
    }
}