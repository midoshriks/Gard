@extends('dasboard.layouts.app')

@section('content')
    <form action="{{ route('dashboard.pepsi_cans.update', $pepsican->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="modal-body">
            <input class="form-control form-control-lg mb-2" name="first_term_B" type="number" placeholder="First term" value="{{$pepsican->first_term_B}}">

            <input type="date" name="date_A" class="form-control form-control-lg mb-2"
                style="width: 100%; display: inline;" onchange="invoicedue(event);" required value="{{$pepsican->date_A}}">

            <div class="form-row mb-2">
                <div class="col">
                    <input class="form-control form-control-lg" name="sales_G" type="number" placeholder="Sales" value="{{$pepsican->sales_G}}">
                </div>
                <div class="col">
                    <input class="form-control form-control-lg" name="last_term_I" type="number" placeholder="last term" value="{{$pepsican->last_term_I}}">
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col">
                    <input class="form-control form-control-lg" name="harmony_F" type="number" placeholder="harmony" value="{{$pepsican->harmony_F}}">
                </div>
                <div class="col">
                    <input class="form-control form-control-lg" name="come_in_C" type="number" placeholder="Come in" value="{{$pepsican->come_in_C}}">
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col">
                    <input class="form-control form-control-lg" name="convert_from_D" type="number"
                        placeholder="Convert From" value="{{$pepsican->convert_from_D}}">
                </div>
                <div class="col">
                    <input class="form-control form-control-lg" name="convert_to_E" type="number" placeholder="Convert to" value="{{$pepsican->convert_to_E}}">
                </div>
            </div>

            {{-- <input class="form-control form-control-lg" name="" type="text" placeholder=".input-lg"> --}}
        </div>

        {{-- modal-footer --}}
        <div class="modal-footer justify-content-between">
            <a href="{{ route('dashboard.pepsi_cans.index') }}"><button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button></a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
