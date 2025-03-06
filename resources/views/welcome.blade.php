@extends('layouts.app')
@section('title')
Welcome page
@endsection('title')
@section('content')
<h1>This is welcome page</h1>
@endsection('content')

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    console.log('Welcome');
    alert('Welcome');
});
    </script>
@endpush
