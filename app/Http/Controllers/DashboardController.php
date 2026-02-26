<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Expense;
use App\Models\Income;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        $year = date("Y");
        

        $incomeData = collect(range(1,12))->map(function($month) use ($user, $year) {
            return $user->incomes()
            ->whereYear("created_at", $year)
            ->whereMonth("created_at", $month)
            ->sum("amount");
        })->ToArray();

        $expenseData = collect(range(1,12))->map(function($month) use ($user, $year) {
            return $user->expenses()
            ->whereYear("created_at", $year)
            ->whereMonth("created_at", $month)
            ->sum("amount");
        })->toArray();


        $userExpenses = Auth::user()->expenses()->get();
        $userIncomes = Auth::user()->incomes()->get();
        
        $transactions = $userExpenses->concat($userIncomes)->sortByDesc('created_at');

        $incomeCategories = IncomeCategory::all();
        $expenseCategories = ExpenseCategory::with(['expenses' => function($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->get();

        $pieData = $expenseCategories->map(function($cat){
            return [
                'name' => $cat->name,
                'total' => $cat->expenses->sum('amount') ?? 0,
            ];
        })->filter(fn($item) => $item['total'] > 0);

        $pieLabels = $pieData->pluck('name');
        $pieValues = $pieData->pluck('total');


        $eurRate = $this->fetchExchangeRate();
        
        return view("loggedin.dashboard", compact("userExpenses","userIncomes", "transactions", "incomeData" , 'expenseData', 'incomeCategories', 'expenseCategories', 'pieLabels', 'pieValues', 'eurRate'));
    }

    private function fetchExchangeRate()
    {
        $apiKey = env('EXCHANGE_RATE_API_KEY');

        $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD");

        if ($response->successful()){
            return $response->json()["conversion_rates"]["EUR"];
        } else{
            return "N/A";
        }
    }
}
