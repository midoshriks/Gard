@extends('layouts.app')

@section('content')
    <form action="{{ route('gard.store', $gard->id) }}" method="POST">

        @csrf
        @method('POST')

        <div class="form-row">
            <div class="col">
                <input type="text" hidden  name="id" value="{{ $gard->id }}">
                <input type="text" name="C" class="form-control" placeholder="Com in ">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Primary</button>
        </div>

    </form>
@endsection
