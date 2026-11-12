@extends('layouts.app')

@section('title', 'Transações')

@section('content')
    <h1>Transações</h1>
    <a href="{{ route('transactions.create') }}">Nova transação</a>

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Pessoa</th>
                <th>Valor</th>
                <th>Ações</th>
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
                    <td><a href="{{ route('transactions.edit', $transaction)}}">Editar</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Ainda não há transações.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $transactions->links() }}
@endsection