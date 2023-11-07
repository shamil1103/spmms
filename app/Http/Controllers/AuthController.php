<?php

namespace App\Http\Controllers;

use App\Enums\CommonStatusEnum;
use App\Http\Requests\LoginRequest;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Show the application's login form
     *
     * @return view|RedirectResponse
     */
    public function index(): view | RedirectResponse
    {

        if (auth()->check()) {
            setMessage('Login Successfully', 'success');

            return redirect()->route('home');
        }

        $application = Application::first();

        return view('login', compact('application'));
    }

    /**
     * Login check
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginCheck(LoginRequest $request): RedirectResponse
    {

        if (auth()->check()) {
            setMessage('Login Successfully', 'success');

            return redirect()->route('home');
        }

        if (auth()->attempt(['email' => $request->post('email'), 'password' => $request->input('password'), 'status' => CommonStatusEnum::ACTIVE->value])) {

            $application = Application::first();

            $session_data = [
                'company_name'           => $application->name,
                'company_email'          => $application->email,
                'company_address'        => $application->address,
                'company_contact_number' => $application->contact_number,
                'company_photo'          => $application->photo_path,
                'company_favicon'        => $application->favicon_path,
            ];
            session()->put($session_data);

            setMessage('Login Successfully', 'success');

            return redirect()->route('home');

        } else {
            setMessage('Login Failed', 'danger');

            return redirect()->back()->withInput();
        }

    }

    /**
     * Logout
     *
     * @param Login $request
     * @return
     */
    public function logout(Request $request)
    {

        auth()->logout();
        setMessage('Logout Successfully', 'success');

        return redirect()->route('login');
    }

}
