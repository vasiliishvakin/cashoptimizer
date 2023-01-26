<?php /** @var \App\Models\AccountType $accountType */ ?>

<div class="card-body">
    @csrf
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('title') is-invalid  @enderror"
                   id="title" name="title" placeholder="title" value="{{ old('title', $accountType->title ?? '') }}"
                   aria-describedby="validationTitleFeedback" required>
            @error('title')
            <div id="validationTitleFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    @include("parts.items.actions.lg", [
                'routes'=>(new \App\Helpers\BladeRoutesConfig($accountType->id ?? null))
                    ->cansel('account-types.index', 'Cansel')
                    ->update('account-types.mock', 'Save')
            ])
</div>
