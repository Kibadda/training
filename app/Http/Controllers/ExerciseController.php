<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use Inertia\Inertia;
use Inertia\Response;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Exercise/Index', [
            'exercises' => Exercise::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Exercise/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $exercise = new Exercise($request->validated());
        $exercise->save();

        session()->flash('success', 'Exercise saved successfully!');

        return to_action([ExerciseController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise): Response
    {
        return Inertia::render('Exercise/Show', [
            'exercise' => $exercise,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise): Response
    {
        return Inertia::render('Exercise/Edit', [
            'exercise' => $exercise,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        $exercise->update($request->validated());

        session()->flash('success', 'Exercise updated successfully!');

        return to_action([ExerciseController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        session()->flash('success', 'Exercise deleted successfully!');

        return to_action([ExerciseController::class, 'index']);
    }
}
