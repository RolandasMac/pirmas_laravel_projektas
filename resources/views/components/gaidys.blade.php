{{-- <div class="gaidys-component">
    <h1>Čia yra x-welcome komponento antraštė</h1>
    <div class="slot-content">
        {{ $slot }} <!-- Tai atvaizduos visą turinį, kuris buvo pateiktas tarp komponento žymų -->
    </div>
</div> --}}


@extends('layouts.app2')
@section('title')
    Gaidys page
@endsection('title')
@section('content')
    <div>Papildomas turinys
        <h1>{{ $papildomas }}</h1>
    </div>
    <h1>This is Gaidys page</h1>
    <h2>slot turinys</h2>
    {{ $slot }}
    <div>Papildomas turinys
        <h1>{{ $papildomas }}</h1>
    </div>
    <x-mano-button style="color: red;">
        <p>spausti</p>
    </x-mano-button>
    @php
        $tableData = [
            (object) ['id' => 1, 'title' => 'title1', 'description' => 'description1'],
            (object) ['id' => 2, 'title' => 'title2', 'description' => 'description2'],
            (object) ['id' => 3, 'title' => 'title3', 'description' => 'description3']
        ];
    @endphp
    <x-mano-table :tableData="$tableData">

    </x-mano-table>

@endsection('content')


{{-- @push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('Welcome');
        alert('Welcome');
    });
</script>
@endpush --}}