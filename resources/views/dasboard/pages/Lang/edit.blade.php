@extends('dasboard.layouts.app')

@section('content')
    <form action="{{ route('dashboard.lang.update', $lang->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="modal-body">
            <input class="form-control form-control-lg mb-2" name="phrase" type="text" placeholder="First term" value="{{$lang->phrase}}" disabled>

            <div class="form-row mb-2">
                <div class="col">
                    <label class="mr-3">{{ display('phrase en')}}</label>
                    <input class="form-control form-control-lg" name="en" type="text" placeholder="write en" value="{{$lang->en}}">
                </div>
                <div class="col">
                    <label class="mr-3">{{ display('phrase ar')}}</label>
                    <input class="form-control form-control-lg" name="ar" type="text" placeholder="wirte ar" value="{{$lang->ar}}">
                </div>
            </div>

            {{-- <input class="form-control form-control-lg" name="" type="text" placeholder=".input-lg"> --}}
        </div>

        {{-- modal-footer --}}
        <div class="modal-footer justify-content-between">
            <a href="{{ route('dashboard.lang.index') }}"><button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ display('Close')}}</button></a>
            <button type="submit" class="btn btn-primary">{{ display('Save')}}</button>
        </div>
    </form>
@endsection
