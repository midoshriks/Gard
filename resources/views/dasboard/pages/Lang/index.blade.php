@extends('dasboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ display('DataTable languages')}}</h3>
                    <a href="" class="btn btn-info waves-effect waves-light m-b-5" data-toggle="modal"
                        data-target="#modal-default">
                        <span>{{ display('Add language')}}</span>
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="#" onclick="window.print();return false"
                        class="btn btn-info waves-effect waves-light m-b-5">
                        <span>{{ display('print')}}</span>
                        <i class="fa fa-edit"></i>
                    </a>
                    {{-- @include('dasboard.pages.lang.create') --}}

                </div>
                <!-- /.card-header -->
                {{-- <div class="card-body"> --}}
                <div class="table-responsive-sm">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ display('phrase')}}</th>
                                <th>{{ display('en')}} </th>
                                <th>{{ display('ar')}} </th>
                                <th>{{ display('Action')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $key => $lang)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $lang->phrase }}</td>
                                    <td>{{ $lang->en }}</td>
                                    <td>{{ $lang->ar }}</td>

                                    <td>
                                        <a href="{{ route('dashboard.lang.edit', $lang->id) }}"
                                            class="btn btn-icon waves-effect waves-light btn-warning m-b-5">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        {{-- ----------------------------   ---  --------------------------- --}}
                                        <a href="{{ route('dashboard.lang.destroy', $lang->id) }}"
                                            class="btn btn-danger" data-confirm-delete="true"><ion-icon
                                                name="trash-outline"></ion-icon></a>

                                        {{-- ----------------------------   ---  --------------------------- --}}
                                        {{-- <form action="{{ route('dashboard.lang.destroy', $lang->id) }}"
                                            method="POST" style="display: inline-block;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}

                                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><ion-icon
                                                    name="trash-outline"></ion-icon> </button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ display('phrase')}}</th>
                                <th>{{ display('en')}} </th>
                                <th>{{ display('ar')}} </th>
                                <th>{{ display('Action')}} </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
