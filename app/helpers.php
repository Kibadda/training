<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

function to_action(string|array $action, array $parameters = [], int $status = 302, array $headers = []): RedirectResponse
{
    return redirect()->action($action, $parameters, $status, $headers);
}

function plural_from_model(string $model): string
{
    return str(class_basename($model))->plural()->kebab();
}
