<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/post', function () {

        $form = SpladeForm::make()
            ->id('test-form')
            ->class('space-y-4')
            ->fields([
                Input::make('name')->label('User Name'),
                Password::make('password')->label('Password'),
                Textarea::make('textarea')->label('Post')->autosize(),
                File::make('photo')
                    ->multiple() // Enables selecting multiple files
                    ->filepond()
                    ->preview()
                    ->accept('image/jpeg')
                    ->accept(['image/png', 'image/jpeg']),
                File::make('photo')
                    ->label('second photo')
                    ->multiple()
                    ->filepond()
                    // ->server() // Enables asynchronous uploads of files
                    ->preview() // Show image preview

                    ->minSize('1Kb')
                    ->maxSize('10Mb')

                    // ->width(120)
                    // ->height(120)

                    ->minWidth(150)
                    // ->maxWidth(500)

                    ->minHeight(150)
                    // ->maxHeight(500)

                    // ->minResolution(150)
                    // ->maxResolution(99999)
            ]);

        return view('post.post', [
            'form' => $form,
        ]);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
});