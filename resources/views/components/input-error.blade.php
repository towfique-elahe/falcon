@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'error']) }}>
        @foreach ((array) $messages as $message)
            <li class="error">{{ $message }}</li>
        @endforeach
    </ul>
@endif
