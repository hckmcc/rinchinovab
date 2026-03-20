<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'service' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
        ]);

        // Здесь можно добавить отправку письма или сохранение в БД
        // Mail::to(config('mail.from.address'))->send(new BookingRequestMail($validated));

        return response()->json(['success' => true]);
    }
}
