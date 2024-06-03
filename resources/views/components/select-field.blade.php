<select class="select select-bordered w-full max-w-xs" @required($required) name="{{ $name }}">
    @foreach($options as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
    @endforeach
</select>
