<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Korisnici
 * 
 * API za upravljanje korisnicima sustava.
 */
class UserController extends Controller
{
    /**
     * Prijava korisnika
     * 
     * @unauthenticated
     * @bodyParam email string required Email korisnika. Example: ivan.horvat@example.com
     * @bodyParam password string required Lozinka. Example: tajnalozinka123
     * 
     * @response 200 scenario="Uspješna prijava" {
     *   "user": {
     *     "id": 1,
     *     "name": "Ivan Horvat",
     *     "email": "ivan.horvat@example.com"
     *   },
     *   "token": "1|Xyz123..."
     * }
     * @response 401 scenario="Neuspješna prijava" {
     *   "message": "Nevažeći podaci za prijavu"
     * }
     */
    public function login(Request $request)
    {
        // Logika za prijavu
    }

    /**
     * Dohvati sve korisnike
     * 
     * @queryParam page integer Broj stranice za paginaciju. Example: 1
     * @queryParam per_page integer Broj rezultata po stranici. Example: 10
     * 
     * @responseField id integer ID korisnika.
     * @responseField name string Ime korisnika.
     * @responseField email string Email korisnika.
     * @responseField created_at string Datum kreiranja.
     */
    public function index(Request $request)
    {
        // Logika za dohvat korisnika
    }

    /**
     * @bodyParam content string required Sadržaj komentara. Example: Ovo je primjer komentara
     * @responseField id integer ID komentara.
     * @responseField content string Sadržaj komentara.
     */
    public function store(Request $request)
    {
    // Logika za spremanje komentara
    }
}