<?php

use Illuminate\Support\Facades\Route;

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

function getContacts()
{
    return [
        [
            'id' => 1,
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@gmail.com',
            'phone' => '87839484940',
            'address' => '123 abc',
            'company' => 'Company one'
        ],
        [
            'id' => 2,
            'firstName' => 'Stephen',
            'lastName' => 'Grider',
            'email' => 'ste@gmail.com',
            'phone' => '0292020393',
            'address' => '456 jql',
            'company' => 'Company JS'
        ],
    ];
}

Route::get("/", function () {
    return view("welcome");
});

Route::get('/contacts', function () {
    $companies = [
        1 => ['name' => 'Company One', 'contacts' => 3],
        2 => ['name' => 'Company Two', 'contacts' => 5],
    ];
    $contacts = getContacts();
    // $contacts = [];
    return view('contacts.index', compact('contacts', 'companies'));
})->name('contacts.index');

Route::get('/contacts/create', function () {
    return view('contacts.create');
})->name('contacts.create');

Route::get("/contacts/{id}/{name}", function ($id) {
    $contacts = getContacts();
    abort_if(!isset($contacts[$id]), 404);
    // abort_unless(isset($contacts[$id]), 404); # cach 2
    $contact = $contacts[$id];
    return view('contacts.show', compact('contact'));
})->name('contacts.show');


Route::get('/companies/{name?}', function ($name = null) {
    if ($name) {
        return "Company {$name}";
    } else {
        return "All companies";
    }
})->whereAlpha('name');

Route::fallback(function () {
    return "<h1>404 | Page Not Found</h1>";
});
