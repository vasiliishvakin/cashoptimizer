<?php /** @var \App\Models\AccountType $accountType */ ?>

<div class="card-body">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('name') is-invalid  @enderror"
                   id="name" name="name" placeholder="name" value="{{ old('name', $accountType->name ?? '') }}"
                   aria-describedby="validationTitleFeedback" required>
            @error('name')
            <div id="validationTitleFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    @include("parts.items.actions.lg", [
                'routes'=>(new \App\Utils\BladeRoutesConfig($accountType->id ?? null))
                    ->cansel('account-types.index', 'Cansel')
                    ->update('account-types.mock', 'Save')
            ])
</div>
