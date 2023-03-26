<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
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
        return Inertia::render('Training/Create');
    }

    public function store(StoreTrainingRequest $request): RedirectResponse
    {
        $training = new Training($request->validated());
        $training->save();

        session()->flash('success', 'Training saved successfully!');

        return to_action([self::class, 'index']);
    }

    public function edit(Training $training): Response
    {
        return Inertia::render('Training/Edit', [
            'training' => $training,
        ]);
    }

    public function update(UpdateTrainingRequest $request, Training $training): RedirectResponse
    {
        $training->update($request->validated());

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
