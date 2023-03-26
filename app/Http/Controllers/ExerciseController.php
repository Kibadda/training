<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ExerciseController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Exercise/Index', [
            'exercises' => Exercise::all(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Exercise/Create');
    }

    public function store(StoreExerciseRequest $request): RedirectResponse
    {
        $exercise = new Exercise($request->validated());
        $exercise->save();

        session()->flash('success', 'Exercise saved successfully!');

        return to_action([ExerciseController::class, 'index']);
    }

    public function edit(Exercise $exercise): Response
    {
        return Inertia::render('Exercise/Edit', [
            'exercise' => $exercise,
        ]);
    }

    public function update(UpdateExerciseRequest $request, Exercise $exercise): RedirectResponse
    {
        $exercise->update($request->validated());

        session()->flash('success', 'Exercise updated successfully!');

        return to_action([ExerciseController::class, 'index']);
    }

    public function destroy(Exercise $exercise): RedirectResponse
    {
        $exercise->delete();

        session()->flash('success', 'Exercise deleted successfully!');

        return to_action([ExerciseController::class, 'index']);
    }
}
