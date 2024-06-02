<label class="form-control w-full max-w-xs">
    <div class="label">
        <span class="label-text">{{ $label }}</span>
    </div>
    <input
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        class="input input-bordered w-full max-w-xs"
        name="{{ $name }}"
        value="{{ $value }}"
        @required($required)
    />
</label>

