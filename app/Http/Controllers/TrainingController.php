<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\Exercise;
use App\Models\Training;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TrainingController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Training/Index', [
            'trainings' => Training::all(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Training/Create', [
            'exercises' => Exercise::all(),
            'selected' => collect([]),
        ]);
    }

    public function store(StoreTrainingRequest $request): RedirectResponse
    {
        $safe = $request->safe()->collect();
        $training = new Training($safe->all());
        $training->save();

        if (!empty($safe['exercises'])) {
            $training->exercises()->sync(collect($safe['exercises'])->mapWithKeys(fn (array $item) => [$item['id'] => $item['pivot']]));
        }

        session()->flash('success', 'Training saved successfully!');

        return to_action([self::class, 'index']);
    }

    public function edit(Training $training): Response
    {
        return Inertia::render('Training/Edit', [
            'training' => $training,
            'exercises' => Exercise::query()->whereNotIn('id', $training->exercises->pluck('id'))->get(),
            'selected' => $training->exercises,
        ]);
    }

    public function update(UpdateTrainingRequest $request, Training $training): RedirectResponse
    {
        $safe = $request->safe()->collect();
        $training->update($safe->all());

        if (!empty($safe['exercises'])) {
            $training->exercises()->sync(collect($safe['exercises'])->mapWithKeys(fn (array $item) => [$item['id'] => $item['pivot']]));
        }

        session()->flash('success', 'Training updated successfully!');

        return to_action([self::class, 'index']);
    }

    public function destroy(Training $training): RedirectResponse
    {
        $training->delete();

        session()->flash('success', 'Training deleted successfully!');

        return to_action([self::class, 'index']);
    }
}
