@props(['disabled' => false, 'textarea' => false, 'value' => ''])


@if ($textarea)
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block mt-1 w-full border-dark-700 bg-dark-900 text-dark-400 focus:border-bmo focus:ring-bmo rounded-md shadow-sm']) !!}>{{ $value }}</textarea>
@else
    <input value="{{ $value }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block mt-1 w-full border-dark-700 bg-dark-900 text-dark-400 focus:border-bmo focus:ring-bmo rounded-md shadow-sm']) !!}>
@endif
