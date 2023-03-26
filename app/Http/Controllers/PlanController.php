<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PlanController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Plan/Index', [
            'plans' => Plan::all(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Plan/Create');
    }

    public function store(StorePlanRequest $request): RedirectResponse
    {
        $plan = new Plan($request->validated());
        $plan->save();

        session()->flash('success', 'Plan saved successfully!');

        return to_action([self::class, 'index']);
    }

    public function edit(Plan $plan): Response
    {
        return Inertia::render('Plan/Edit', [
            'plan' => $plan,
        ]);
    }

    public function update(UpdatePlanRequest $request, Plan $plan): RedirectResponse
    {
        $plan->update($request->validated());

        session()->flash('success', 'Plan updated successfully!');

        return to_action([self::class, 'index']);
    }

    public function destroy(Plan $plan): RedirectResponse
    {
        $plan->delete();

        session()->flash('success', 'Plan deleted successfully!');

        return to_action([self::class, 'index']);
    }
}
