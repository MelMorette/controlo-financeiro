<?php

namespace App\Http\Controllers;

use App\Enums\Currency;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Category;
use App\Models\Person;
use App\Models\Transaction;

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
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', [
            'transaction' => $transaction,
            'people' => Person::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
            'currencies' => Currency::cases(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transação atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transação apagada com sucesso.');
    }
}
