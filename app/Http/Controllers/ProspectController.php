<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProspectController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('pages.prospect-lists.edit');
    }

    public function edit(string $listId)
    {
        return view(
            'pages.prospect-lists.edit',
            [
                'list' => Prospect::find($listId)
            ]
        );
    }

    public function show(string $listId)
    {
        return view(
            'pages.prospect-lists.show',
            [
                'list' => Prospect::find($listId)
            ]
        );
    }

    /**
     * @param Prospect $list
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(Prospect $list)
    {
        $list->delete();

        return Redirect::route('prospect-lists')->with('success', 'List deleted.');
    }
}
