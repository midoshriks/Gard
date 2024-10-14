@extends('dasboard.layouts.app')

@section('content')
    <form action="{{ route('dashboard.sweetProduction.update',$sweet_product->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="modal-body">
            <div class="form-row mb-2">
                <div class="col">
                    <input type="date" name="date_A" class="form-control form-control-lg"
                        style="width: 100%; display: inline;" onchange="invoicedue(event);" required  value="{{$sweet_product->date_A}}">
                </div>
                <div class="col">
                    <input class="form-control form-control-lg" name="pure_milka_B" type="number" placeholder="Pure milka" value="{{$sweet_product->pure_milka_B}}">
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col">
                    <input class="form-control form-control-lg" name="boxes_C" type="number"
                        placeholder="Production of boxes" value="{{$sweet_product->boxes_C}}">
                </div>
                <div class="col">
                    <input class="form-control form-control-lg" name="convert_from_D" type="number"
                        placeholder="Convert from" value="{{$sweet_product->convert_from_D}}">
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col">
                    <input class="form-control form-control-lg" name="convert_to_E" type="number" placeholder="Convert to" value="{{$sweet_product->convert_to_E}}">
                </div>
                <div class="col">
                    <input class="form-control form-control-lg" name="harmony_F" type="number" placeholder="harmony" value="{{$sweet_product->harmony_F}}">
                </div>
            </div>

            <input class="form-control form-control-lg" name="a_cook_G" type="text" placeholder="name a cook" value="{{$sweet_product->a_cook_G}}">

            {{-- <input class="form-control form-control-lg" name="" type="text" placeholder=".input-lg"> --}}
        </div>

        {{-- modal-footer --}}
        <div class="modal-footer justify-content-between">
            <a href="{{ route('dashboard.sweetProduction.index')}}"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
