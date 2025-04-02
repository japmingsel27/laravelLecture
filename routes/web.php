<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentsController;
use App\Jobs\SimulationEvent;

Route::get('/',[studentsController::class, 'index']);
Route::get('/student/{id}', [studentsController::class, 'get']);
Route::post('/register',[studentsController::class, 'store'])->name('register.student');
Route::get('/delete/{id}',[studentsController::class, 'delete'])->name('delete.student');
Route::get('/update/{id}',[studentsController::class, 'updateView'])->name('update.student');


// Route::get('/start-simulation', function () {
//    //first customer
//     SimulationEvent::dispatch(['type' => 'arrival', 'entity_id' => 1], now());
//    //second customer 
//     SimulationEvent::dispatch(['type' => 'arrival', 'entity_id' => 2], now()->addSeconds(3));

//     SimulationEvent::dispatch(['type' => 'arrival', 'entity_id' => 3], now()->addSeconds(3));

//     SimulationEvent::dispatch(['type' => 'arrival', 'entity_id' => 4], now()->addSeconds(3));

//     SimulationEvent::dispatch(['type' => 'arrival', 'entity_id' => 5], now()->addSeconds(3));

    

//     return "Simulation started!";
// });


