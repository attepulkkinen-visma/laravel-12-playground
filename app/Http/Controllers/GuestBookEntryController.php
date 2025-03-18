<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestBookEntryRequest;
use App\Http\Resources\GuestBookEntryResource;
use App\Models\GuestBookEntry;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class GuestBookEntryController extends Controller
{
    use AuthorizesRequests;

    public function index(): Response
    {
        $this->authorize('viewAny', GuestBookEntry::class);

        $entries = GuestBookEntryResource::collection(
            GuestBookEntry::with('user')->latest()->get()
        );

        $can = [
            'create_entry' => Auth::check() && Auth::user()->can('create', GuestBookEntry::class),
        ];

        return Inertia::render('guest-book/index', compact('entries', 'can'));
    }

    public function create(): Response
    {
        $this->authorize('create', GuestBookEntry::class);

        return Inertia::render('guest-book/create');
    }

    public function store(GuestBookEntryRequest $request): RedirectResponse
    {
        $this->authorize('create', GuestBookEntry::class);

        $request->user()->guestBookEntries()->create($request->validated());

        return to_route('guest-book.index');
    }

    public function edit(GuestBookEntry $guestBook): Response
    {
        $this->authorize('update', $guestBook);

        $entry = new GuestBookEntryResource($guestBook);

        return Inertia::render('guest-book/edit', compact('entry'));
    }

    public function update(GuestBookEntryRequest $request, GuestBookEntry $guestBook): RedirectResponse
    {
        $this->authorize('update', $guestBook);

        $guestBook->update($request->validated());

        return to_route('guest-book.index');
    }

    public function destroy(GuestBookEntry $guestBook): RedirectResponse
    {
        $this->authorize('delete', $guestBook);

        $guestBook->delete();

        return to_route('guest-book.index');
    }
}
