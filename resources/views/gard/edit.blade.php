@extends('layouts.app')

@section('content')
    <form action="{{ route('gard.update', $gard->id) }}" method="POST">

        @csrf
        @method('put')

        <input type="date" name="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required value="">

        <div class="form-row">
            <div class="col">
                <input type="text" name="I" class="form-control" placeholder="last term" value="{{ $gard->I }}">
            </div>
            <div class="col">
                <input type="text" name="G" class="form-control" placeholder="sales">
            </div>
        </div>

        <div class="form-group">
            <div class="col">
                
            </div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Primary</button>
        </div>

    </form>
@endsection
