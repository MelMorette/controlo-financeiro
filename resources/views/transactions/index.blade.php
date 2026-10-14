@extends('layouts.app')

@section('title', 'Transações')

@section('content')
    <h1>Transações</h1>

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Pessoa</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->occurred_on->format('d/m/Y') }}</td>
                    <td>{{ $transaction->description ?? '-' }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->person->name }}</td>
                    <td>{{ number_format($transaction->amount, 2, ',', '.') }} {{ $transaction->currency->value }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Ainda não há transações.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $transactions->links() }}
@endsection