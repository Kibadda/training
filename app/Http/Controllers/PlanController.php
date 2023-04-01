<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use App\Models\Training;
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
        return Inertia::render('Plan/Create', [
            'trainings' => Training::all(),
            'selected' => collect([]),
        ]);
    }

    public function store(StorePlanRequest $request): RedirectResponse
    {
        $safe = $request->safe()->collect();

        if ($safe['active']) {
            Plan::query()->update(['active' => false]);
        }

        $plan = new Plan($safe->all());
        $plan->save();

        if (!empty($safe['trainings'])) {
            $plan->trainings()->sync(collect($safe['trainings'])->map(fn (array $item) => $item['id']));
        }

        session()->flash('success', 'Plan saved successfully!');

        return to_action([self::class, 'index']);
    }

    public function edit(Plan $plan): Response
    {
        return Inertia::render('Plan/Edit', [
            'plan' => $plan,
            'trainings' => Training::query()->whereNotIn('id', $plan->trainings->pluck('id'))->get(),
            'selected' => $plan->trainings,
        ]);
    }

    public function update(UpdatePlanRequest $request, Plan $plan): RedirectResponse
    {
        $safe = $request->safe()->collect();

        if ($safe['active']) {
            Plan::query()->update(['active' => false]);
        }

        $plan->update($safe->all());

        if (!empty($safe['trainings'])) {
            $plan->trainings()->sync(collect($safe['trainings'])->map(fn (array $item) => $item['id']));
        }

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
