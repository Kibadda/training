<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Plan;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User([
            'name' => 'Michael Strobel',
            'email' => 'dev@training.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->save();

        $plan = new Plan(['name' => '3-split']);
        $plan->save();

        $push = new Training(['name' => 'Push']);
        $push->save();
        $plan->trainings()->attach($push->id);
        $exercises = collect([
            new Exercise(['name' => 'Bankdrücken']),
            new Exercise(['name' => 'Military Press']),
            new Exercise(['name' => 'Schrägbankdrücken']),
            new Exercise(['name' => 'Seitheben']),
            new Exercise(['name' => 'Skull Crushers']),
        ]);
        $exercises->each(fn (Exercise $exercise) => $exercise->save());
        $push->exercises()->attach($exercises->pluck('id'), ['sets' => 3, 'repetitions' => 10]);

        $pull = new Training(['name' => 'Pull']);
        $pull->save();
        $plan->trainings()->attach($pull->id);
        $exercises = collect([
            new Exercise(['name' => 'Kreuzheben']),
            new Exercise(['name' => 'Klimmzüge']),
            new Exercise(['name' => 'Rudern']),
            new Exercise(['name' => 'Face Pulls']),
            new Exercise(['name' => 'Bizep Curls']),
        ]);
        $exercises->each(fn (Exercise $exercise) => $exercise->save());
        $pull->exercises()->attach($exercises->pluck('id'), ['sets' => 3, 'repetitions' => 10]);

        $legs = new Training(['name' => 'Legs']);
        $legs->save();
        $plan->trainings()->attach($legs->id);
        $exercises = collect([
            new Exercise(['name' => 'Kniebeugen']),
            new Exercise(['name' => 'Beinstrecker']),
            new Exercise(['name' => 'Beinbeuger']),
            new Exercise(['name' => 'Abduktoren']),
            new Exercise(['name' => 'Adduktoren']),
        ]);
        $exercises->each(fn (Exercise $exercise) => $exercise->save());
        $legs->exercises()->attach($exercises->pluck('id'), ['sets' => 3, 'repetitions' => 10]);
    }
}
