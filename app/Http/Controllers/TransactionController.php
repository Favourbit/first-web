<?php
namespace App\Http\Controllers;
use App\Notifications\TransactionNotification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // 1. Get all transactions for this user
        $transactions = $user->transactions()->orderBy('transaction_time', 'desc')->get();

        // 2. Calculate Balance: (Sum of Deposits) - (Sum of Purchases)
        $income = $user->transactions()->where('type', 'income')->sum('amount');
        $expense = $user->transactions()->where('type', 'expense')->sum('amount');
        $balance = $income - $expense;

        return Inertia::render('dashboard1', [
            'balance' => (float) $balance,      // matches 'balance' prop
            'transactions' => $transactions,    // matches 'transactions' prop
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required|string',
            'item_id' => 'nullable|string',
            'transaction_time' => 'required',
        ]);

        // 2. Create the record linked to the logged-in user
        // Note: We use auth()->user()->user_id because of your custom primary key
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category' => 'required|string',
            'type' => 'required|in:income,expense',
            'transaction_time' => 'required|date',
            'item_id' => 'nullable' // Add this if you are using it
        ]);
        $transaction = auth()->user()->transactions()->create($validated);

        auth()->user()->notify(new TransactionNotification($transaction));

        return back()->with('message', 'Transaction added successfully!');
    }
    // Inside TransactionController.php

    public function showAll()
    {
        return Inertia::render('transaction', [
            'transactions' => auth()->user()->transactions()->get() // This MUST be 'transactions'
        ]);
    }

    public function chart()
    {
        $user = auth()->user();

        // 1. Get Spending per day of current week (Mon-Sun)
        $weeklyData = [];
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($days as $day) {
            $weeklyData[] = Transaction::where('user_id', $user->user_id)
                ->where('type', 'expense')
                ->whereRaw("DAYNAME(transaction_time) = ?", [$day])
                ->sum('amount');
        }

        // 2. Get Top Categories for Doughnut Chart
        $categories = Transaction::where('user_id', $user->user_id)
            ->where('type', 'expense')
            ->select('category', \DB::raw('SUM(amount) as total'))
            ->groupBy('category')
            ->get();

        return Inertia::render('chart', [
            'weeklyLabels' => $days,
            'weeklyValues' => $weeklyData,
            'catLabels' => $categories->pluck('category'),
            'catValues' => $categories->pluck('total'),
        ]);
    }
}