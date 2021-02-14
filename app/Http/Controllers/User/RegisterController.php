<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\UseCase\User\RegisterUser;
use Domain\Exceptions\InvariantException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    private RegisterUser $registerUser;

    public function __construct(RegisterUser $registerUser)
    {
        $this->registerUser = $registerUser;
    }

    /**
     * @param RegisterRequest $request
     * @return Application|RedirectResponse|Redirector
     * @throws InvariantException
     */
    public function __invoke(RegisterRequest $request)
    {
        ['user_name' => $userName, 'email' => $email] = $request->all();
        $address = $request->get('address', '');
        $this->registerUser->execute($userName, $email, $address);
        return redirect(route('welcome'));
    }
}
