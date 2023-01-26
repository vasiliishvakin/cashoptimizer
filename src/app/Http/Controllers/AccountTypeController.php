<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountTypeRequest;
use App\Models\AccountType;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountTypes = AccountType::paginate(15);
        return view('account-types.index', compact('accountTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountTypeRequest $request)
    {
        $data = $request->validated();
        $accountType = AccountType::create($data);
        session()->flash('message', sprintf('Account Type %s (#%s) successfully created.', $accountType->title, $accountType->id));
        return redirect()->route('account-types.show', $accountType);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function show(AccountType $accountType)
    {
        return view('account-types.show', compact('accountType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountType $accountType)
    {
        return view('account-types.edit', compact('accountType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountTypeRequest $request
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function update(AccountTypeRequest $request, AccountType $accountType)
    {
        $data = $request->validated();
        $accountType->title = $data['title'];
        $accountType->save();
        session()->flash('message', 'Account Type successfully updated.');
        return redirect()->route('account-types.show', $accountType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountType $accountType)
    {
        $message = sprintf('Account Type %s (#%s) successfully deleted.', $accountType->title, $accountType->id);
        $accountType->deleteOrFail();
        session()->flash('message', $message);
        return redirect()->route('account-types.index');
    }
}
