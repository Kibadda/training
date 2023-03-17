<?php

use Illuminate\Http\RedirectResponse;

if (!function_exists('to_action')) {
    function to_action(string|array $action, array $parameters = [], int $status = 302, array $headers = []): RedirectResponse
    {
        return redirect()->action($action, $parameters, $status, $headers);
    }
}
