<div>
    <div {{ $attributes->merge(['class' => 'font-bold']) }}>
        <span>Hello {{ $name }} !</span>
        <strong>{{ $title }}</strong>
    </div>

    {{-- {{ $slot }} --}}
    {{ $subtitle }}

    @foreach ($tags as $tag)
        <span>{{ $tag }}</span>
    @endforeach
</div>