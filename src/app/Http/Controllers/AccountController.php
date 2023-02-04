<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Currency;
use App\Models\Scopes\UserScope;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Account::class, 'account');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = request()?->user()?->can('viewAll', Account::class) ? Account::paginate(15) : Account::byUser(request()?->user())->paginate(15);

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountTypes = AccountType::pluck('name', 'id');
        $currencies = Currency::pluck('description', 'id');
        $users = request()?->user()?->can('viewAll', Account::class) ? User::pluck('name', 'id') : [\request()?->user()?->id => \request()?->user()?->name ];

        return view('accounts.create', compact('accountTypes', 'currencies', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\AccountRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $data = $request->validated();

        $account = new Account();
        $this->fillAccount($account, $data);

        $this->authorize('update', $account);


        session()->flash('message', sprintf(
            '%s account %s in %s for %s successfully created.',
            $account->accountType->name,
            $account->name,
            $account->currency_id,
            $account->user->name,
        ));
        return redirect()->route('accounts.index', $account);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Account $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Account $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $accountTypes = AccountType::pluck('name', 'id');
        $currencies = Currency::pluck('description', 'id');
        $users = User::pluck('name', 'id');

        return view('accounts.edit', compact('account', 'accountTypes', 'currencies', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Account $account
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, Account $account)
    {
        $data = $request->validated();
        $this->fillAccount($account, $data);

        session()->flash('message', sprintf(
            '%s account %s in %s for %s successfully updated.',
            $account->accountType->name,
            $account->name,
            $account->currency_id,
            $account->user->name,
        ));
        return redirect()->route('accounts.index', $account);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Account $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $message = sprintf('Account %s (#%s) successfully deleted.', $account->name, $account->id);
        $account->deleteOrFail();
        session()->flash('message', $message);
        return redirect()->route('accounts.index');
    }

    public function fillAccount(Account $account, mixed $data): Account
    {
        $account->name = $data['name'];
        $account->account_type_id = $data['accountType'];
        $account->user_id = $data['user'];
        $account->currency_id = $data['currency'];
        $account->balance = $data['balance'];
        $account->saveOrFail();
        $account->refresh();
        return $account;
    }
}
