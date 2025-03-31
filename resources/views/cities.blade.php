@extends('layouts.app2') <!-- Jei turite bendrą maketą -->

@section('content')
    <div class="container">
        <h1>Cities page</h1>

        @if($countries->isEmpty())
            <p>No cities found for the country.</p>
        @else
            @foreach ($countries as $country)
                <ol>
                    <li>
                        <h3>{{$country->name}}</h3>
                        {{-- <h4>{{$country->counties->pluck('name')->implode(', ')}}</h4>
                        <h4>{{$country->cities->pluck('name')->implode(', ')}}</h4> --}}
                    </li>

                    @if($country->counties->isEmpty())
                        <p>No counties available.</p>
                    @else
                        <ul>
                            @foreach($country->counties as $county)
                                <li>{{ $county->name . ' ' . 'apsktritis' }}</li>
                                <ul>
                                    @foreach($county->cities as $city)
                                        <li>{{ $city->name }}</li>
                                    @endforeach
                                </ul>

                            @endforeach
                        </ul>
                    @endif
                </ol>
            @endforeach

        @endif
    </div>
@endsection