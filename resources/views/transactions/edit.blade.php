@extends('layouts.app')

@section('title', 'Editar transação')

@section('content')
    <h1>Editar transação</h1>

    <form method="PUT" action="{{ route('transactions.update', $transaction) }}">
        @csrf
        @method('PUT') 
        {{-- method spoofing for PUT request --}}

        <p>
            <label>Data</label><br>
            <input type="date" name="occurred_on" value="{{ old('occurred_on', $transaction->occurred_on->format('Y-m-d')) }}">
            @error('occurred_on') <br><small>{{ $message }}</small> @enderror
        </p>

        <p>
            <label>Descrição</label><br>
            <input type="text" name="description" value="{{ old('description', $transaction->description) }}">
            @error('description') <br><small>{{ $message }}</small> @enderror
        </p>

        <p>
            <label>Categoria</label><br>
            <select name="category_id">
                <option value="">Escolha...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $transaction->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <br><small>{{ $message }}</small> @enderror
        </p>

        <p>
            <label>Pessoa</label><br>
            <select name="person_id">
                <option value="">Escolha...</option>
                @foreach ($people as $person)
                    <option value="{{ $person->id }}" @selected(old('person_id', $transaction->person_id) == $person->id)>
                        {{ $person->name }}
                    </option>
                @endforeach
            </select>
            @error('person_id') <br><small>{{ $message }}</small> @enderror
        </p>

        <p>
            <label>Valor</label><br>
            <input type="number" name="amount" step="0.01" min="0.01" value="{{ old('amount', $transaction->amount) }}">
            <select name="currency">
                @foreach ($currencies as $currency)
                    <option value="{{ $currency->value }}" @selected(old('currency', $transaction->currency) == $currency->value)>
                        {{ $currency->value }}
                    </option>
                @endforeach
            </select>
            @error('amount') <br><small>{{ $message }}</small> @enderror
        </p>

        <button type="submit">Guardar</button>
        <a href="{{ route('transactions.index') }}">Cancelar</a>
    </form>
@endsection