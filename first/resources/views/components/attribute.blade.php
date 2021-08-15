@props(['class','type'])
<div {{ $attributes->merge(['class' => "bg-{$type}"]) }}>
    Attribute
    {{-- @php
        dd($attributes)
    @endphp --}}
</div>
