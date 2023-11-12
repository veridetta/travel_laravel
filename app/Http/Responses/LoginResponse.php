<?php

namespace App\Http\Responses;

use App\Filament\Resources\OrderResource;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse extends \Filament\Http\Responses\Auth\LoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
      $redirectPage = explode("?page=",request()->server('HTTP_REFERER'))[1];
        // Here, you can define which resource and which page you want to redirect to
        return redirect()->to($redirectPage);
    }
}
