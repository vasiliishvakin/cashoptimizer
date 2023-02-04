<?php /** @var \App\Models\Account $account */ ?>

<div class="card-body">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('name') is-invalid  @enderror"
                   id="name" name="name" placeholder="name" value="{{ old('name', $account->name ?? null) }}"
                   aria-describedby="validationTitleFeedback" required>
            @error('name')
            <div id="validationTitleFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="accountType" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-10">
            <select id="accountType" name="accountType" class="form-select  @error('accountType') is-invalid  @enderror" aria-label="account type">
                @foreach ($accountTypes as $id => $title)
                    <option value="{{ $id }}" @selected(old('accountType', $account->account_type_id ?? null) === $id)>{{ $title }}</option>
                @endforeach
            </select>
            @error('accountType')
            <div id="validationTitleFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="currency" class="col-sm-2 col-form-label">Currency</label>
        <div class="col-sm-10">
            <select id="currency" name="currency" class="form-select @error('currency') is-invalid  @enderror" aria-label="currency">
                @foreach ($currencies as $id=>$description)
                    <option value="{{ $id }}" @selected(old('currency', $account->currency_id ?? 'USD') === $id)>{{ $id . ' - ' . $description }}</option>
                @endforeach
            </select>
            @error('currency')
            <div id="validationTitleFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="user" class="col-sm-2 col-form-label">User</label>
        <div class="col-sm-10">
            <select id="user" name="user" class="form-select @error('user') is-invalid  @enderror" aria-label="account type">
                @foreach ($users as $id => $name)
                    <option value="{{ $id }}" @selected(old('user', $account->user_id ?? null) === $id)>{{ $name }}</option>
                @endforeach
            </select>
            @error('user')
            <div id="validationTitleFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="balance" class="col-sm-2 col-form-label">Balance</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('balance') is-invalid  @enderror"
                   id="balance" name="balance" placeholder="balance" value="{{ old(
                        'balance',
                        \App\Facades\MoneyFormatterServiceFacade::decimal($account->balance  ?? null)
                    ) }}"
                   aria-describedby="validationBalanceFeedback">
            @error('balance')
            <div id="validationBalanceFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    @include("parts.items.actions.lg", [
                'routes'=>(new \App\Utils\BladeRoutesConfig($account->id ?? null))
                    ->cansel('accounts.index', 'Cansel')
                    ->update('accounts.mock', 'Save')
            ])
</div>
