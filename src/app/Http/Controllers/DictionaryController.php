<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DictionaryRequest;
use App\Models\Dictionary;
use App\Models\User;

class DictionaryController extends Controller
{
    public function index()
    {
        $query = Dictionary::query()->where('user_id', auth()->id());
        $dictionaries = $query->orderByDesc('created_at')->paginate(5);
        return view('index', compact('dictionaries'));
    }

    public function display(Request $request)
    {
        return view('text_register');
    }

    public function register(DictionaryRequest $request)
    {
        $validated = $request->validate([
            'keyword' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if (empty($validated['user_id']) && $request->user()) {
            $validated['user_id'] = $request->user()->id;
        }

        Dictionary::create($validated);

        return redirect('/');
    }

    public function search(DictionaryRequest $request)
    {
        $query = Dictionary::query()->where('user_id', auth()->id());

        if ($request->filled('text')) {
            $text = $request->text;
            $query->where(function ($q) use ($text) {
                $q->where('keyword', 'like', "%{$text}%")
                  ->orWhere('description', 'like', "%{$text}%");
            });
        }

        $dictionaries = $query->orderByDesc('created_at')->paginate(5);

        return view('index', compact('dictionaries'));
    }

    public function update(DictionaryRequest $request)
    {
        $validated = $request->validate([
            'keyword' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $dictionary = Dictionary::where('id', $request->id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $dictionary->update($validated);

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $dictionary = Dictionary::where('id', $request->id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $dictionary->delete();

        return redirect('/');
    }
}
