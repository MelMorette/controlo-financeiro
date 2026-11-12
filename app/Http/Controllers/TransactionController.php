<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Enums\Currency;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Category;
use App\Models\Person;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['person', 'category'])
        ->latest('occurred_on')
        ->paginate(20);

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create', [
            'people' => Person::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
            'currencies' => Currency::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        Transaction::create($request->validated());

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transação criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
