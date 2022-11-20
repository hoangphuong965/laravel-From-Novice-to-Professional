<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $companies = [
            1 => ['name' => 'Company One', 'contacts' => 3],
            2 => ['name' => 'Company Two', 'contacts' => 5],
        ];
        $contacts = $this->getContacts();

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show($id)
    {
        $contacts = $this->getContacts();
        abort_if(!isset($contacts[$id]), 404);
        // abort_unless(isset($contacts[$id]), 404); # cach 2
        $contact = $contacts[$id];
        return view('contacts.show', compact('contact'));
    }

    protected function getContacts()
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
}
