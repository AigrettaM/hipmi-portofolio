<!DOCTYPE html>
<html lang="en">
<head>
    <x-partials.head-info>
        <x-slot name="title">{{ $title }}</x-slot>
    </x-partials.head-info>
</head>

<body>
    <x-partials.user.header></x-partials.user.header>
    {{ $slot }}
    <x-partials.user.footer></x-partials.user.footer>
</body>
</html>
