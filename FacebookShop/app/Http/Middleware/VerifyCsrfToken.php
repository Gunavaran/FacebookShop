<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($request->is($except) || str_contains($request->url(), $except)) {
                return true;
            }
        }

        return false;
    }
}
