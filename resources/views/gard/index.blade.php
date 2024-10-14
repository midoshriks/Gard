@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table">
            <caption>Gard</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col" style="color: blue">First term</th>
                    <th scope="col" style="color: green">come in</th>
                    <th scope="col">Convert from</th>
                    <th scope="col">Convert to</th>
                    <th scope="col">harmony</th>
                    <th scope="col">sales</th>
                    <th scope="col">residual</th>
                    <th scope="col">last term</th>
                    <th scope="col" style="color: red">disability</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gard as $index => $item)
                    <tr>
                        <th scope="row">{{ $item->index + 1 }}</th>
                        <th scope="row">{{ $item->created_at->format('Y-m-d') }}</th>
                        <th scope="row">{{ $item->B }}</th>
                        {{-- <th scope="row">{{ $item->first_term() }}</th> --}}
                        <th scope="row">{{ $item->C }}</th>
                        <th scope="row">{{ $item->D }}</th>
                        <th scope="row">{{ $item->E }}</th>
                        <th scope="row">{{ $item->F }}</th>
                        <th scope="row">{{ $item->G }}</th>
                        <th scope="row">{{ $item->residual() }}</th>
                        {{-- <th scope="row">{{ $item->H }}</th> --}}
                        <th scope="row">{{ $item->I }}</th>
                        <th scope="row" style="color: red">{{ $item->disability() }}</th>
                        {{-- <th scope="row">{{ $item->J }}</th> --}}
                        <th scope="row">
                            @if ($item->id == 1)
                                <a href="{{ route('gard.show', $item->id) }}">
                                    <button type="button" class="btn btn-info">first term</button>
                                </a>
                            @endif
                            <a href="{{ route('gard.show', $item->id) }}">
                                <button type="button" class="btn btn-info">come in</button>
                            </a>
                            <a href="{{ route('gard.edit', $item->id) }}">
                                <button type="button" class="btn btn-info">last</button>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
