<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\Person;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $people = collect(['Amy', 'David'])
        ->map(fn ($name) => Person::create(['name' => $name]));

        $categories = collect([
            ['Salário', CategoryType::Income],
            ['Renda', CategoryType::Expense],
            ['Transportes', CategoryType::Expense],
            ['Alimentação', CategoryType::Expense],
            ['Contas Brasil', CategoryType::Expense],
        ])->map(fn ($c) => Category::create(['name' => $c[0], 'type' => $c[1]]));

        Transaction::factory(50)->recycle($people)->recycle($categories)->create();
    }
}
