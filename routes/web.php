<?php

use App\Exports\ExpensesExport;
use App\Exports\IncomesExport;
use App\Exports\TransactionsExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckUserLoggedIn;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Psy\ManualUpdater\Checker;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

use function Symfony\Component\String\s;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/idea', function () {
    return view('idea');
})->name('idea');

Route::get('/about-us', function () {
    return view('aboutUs');
})->name('about-us');

Route::get('/privacy', function(){
    return view('privacy');
})->name('privacy');

Route::get('/terms', function() {
    return view('terms');
})->name('terms');



Route::middleware(CheckUserLoggedIn::class)->group(function () {
    Route::redirect('/login', destination: '/auth/login');
    Route::redirect('/register', destination: '/auth/register');

    Route::get("/auth/register", [AuthController::class, "register"])->name("register");
    Route::post("/auth/register", [AuthController::class, "storeRegister"])->name("storeRegister");

    Route::get("/auth/login", [AuthController::class, "login"])->name("login");
    Route::post("/auth/login", [AuthController::class,"storeLogin"])->name("storelogin");

    //RESET PASSWORD
    Route::get("/forgot-password", [AuthController::class,"showForgotForm"])->name("password.request");
    Route::post("/forgot-password", [AuthController::class,"sendResetLink"])->name("password.email");
    
    Route::get("/reset-password", [AuthController::class,"showResetForm"])->name("password.reset");
    Route::post("/reset-password", [AuthController::class,"updatePassword"])->name("password.update");

});

Route::get("/auth/logout", [AuthController::class,"logout"])->name("logout");
Route::redirect('/logout', destination: '/auth/logout');

Route::get("/auth/not-auth", [AuthController::class,"not-auth"])->name("not-auth");



Route::middleware(AuthMiddleware::class)->group(function () {
    // Income
    Route::get("/loggedin/income", [IncomeController::class,"income"])->name("loggedin.income");
    Route::get("/income/create", [IncomeController::class, "create"])->name("income.create");
    Route::post("/income/create", [IncomeController::class,"store"])->name("income.store");
    Route::get("/income/edit/{id}", [IncomeController::class,"edit"])->name("income.edit");
    Route::post("/income/edit/{id}", [IncomeController::class,"update"])->name("income.update");
    Route::get("/income/delete/{id}",[IncomeController::class,"delete"])->name("income.delete");
    Route::post("/income/delete/{id}", [IncomeController::class,"destroy"])->name("income.destroy");
    Route::get("/income/details/{id}", [IncomeController::class,"details"])->name("income.details");
    Route::get("/export-incomes", function(){
        return Excel::download(new IncomesExport(), 'incomes.xlsx');
    })->name("incomes.export");

    // Expense
    Route::get("/expense/create", [ExpenseController::class,"create"])->name("expense.create");
    Route::post("/expense/create", [ExpenseController::class,"store"])->name("expense.store");
    Route::get("/expense/edit/{id}", [ExpenseController::class,"edit"])->name("expense.edit");
    Route::post("/expense/edit/{id}",[ExpenseController::class,"update"])->name("expense.update");
    Route::get("/expense/delete/{id}", [ExpenseController::class,"delete"])->name("expense.delete");
    Route::post("/expense/delete/{id}", [ExpenseController::class,"destroy"])->name("expense.destroy");
    Route::get("/expense/details/{id}", [ExpenseController::class,"details"])->name("expense.details");
    Route::get("/export-expenses", function () {
        return Excel::download(new ExpensesExport, 'expenses.xlsx' );
    })->name("expenses.export");

    // Dashboard
    Route::get("/loggedin/dashboard", [DashboardController::class,"dashboard"])->name("loggedin.dashboard");
    Route::get("export-transactions", function() {
        return Excel::download(new TransactionsExport,"transactions.xlsx");
    })->name("transactions.export");

    // BUDGET
    Route::get("/loggedin/budget", [BudgetController::class,"budget"])->name("loggedin.budget");
    Route::get("/budget/create", [BudgetController::class,"create"])->name("budget.create");
    Route::post("/budget/create", [BudgetController::class,"store"])->name("budget.store");
    Route::get("/budget/delete/{id}", [BudgetController::class,"delete"])->name("budget.delete");
    Route::delete("/budget/delete/{id}", [BudgetController::class,"destroy"])->name("budget.destroy");

    Route::put("/budget/edit/{id}", [BudgetController::class,"update"])->name("budget.update");

    // Exchange rate Calculator
    Route::get("/exchange", [ExchangeController::class,"index"])->name("loggedin.exchange");
    Route::post("/exchange", [ExchangeController::class,"calculate"])->name("exchange.calculate");

    // Reports 
    Route::get("/reports", [ReportController::class,"reports"])->name("loggedin.reports");

    Route::get("/subscribe", function(){
        return view("loggedin.subscribe");
    })->name("subscribe.page");

    Route::post("/subscribe", [NewsletterController::class,"store"])->name("subscribe.store");


    Route::get("/loggedin/expenses", [ExpenseController::class,"expense"])->name("loggedin.expenses");

});