@extends('dasboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable Sweet Poding</h3>
                    <a href="" class="btn btn-info waves-effect waves-light m-b-5" data-toggle="modal"
                        data-target="#modal-default">
                        <span>Add Sweet Poding</span>
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="#" onclick="window.print();return false"
                        class="btn btn-info waves-effect waves-light m-b-5">
                        <span>print</span>
                        <i class="fa fa-edit"></i>
                    </a>
                    @include('dasboard.pages.SweetPoding.create')

                </div>
                <!-- /.card-header -->
                {{-- <div class="card-body"> --}}
                <div class="table-responsive-sm">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th style="color: rgb(0, 140, 255)">First term</th>
                                <th style="color: rgb(114, 190, 26)">Come in</th>
                                <th>Convert From</th>
                                <th>Convert to</th>
                                <th>Harmony</th>
                                <th>Sales</th>
                                <th>Residual</th>
                                <th>last term</th>
                                <th style="color: red;">Disability</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sweets as $key => $sweet)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sweet->date_A }}</td>
                                    <td style="color: rgb(0, 140, 255)"><b>{{ $sweet->first_term_B }}</b></td>
                                    <td style="color: rgb(114, 190, 26)"><b>{{ $sweet->come_in_C }}</b></td>
                                    <td>{{ $sweet->convert_from_D }}</td>
                                    <td>{{ $sweet->convert_to_E }}</td>
                                    <td>{{ $sweet->harmony_F }}</td>
                                    <td>{{ $sweet->sales_G }}</td>
                                    <td><b>{{ $sweet->residual_H }}</b></td>
                                    <td>{{ $sweet->last_term_I }}</td>
                                    @if ($sweet->disability_J == 0)
                                        <td style="color: rgb(114, 190, 26);"><b>{{ $sweet->disability_J }}</b></td>
                                    @else
                                        <td style="color: red;"><b>{{ $sweet->disability_J }}</b></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('dashboard.sweetpoding.edit', $sweet->id) }}"
                                            class="btn btn-icon waves-effect waves-light btn-warning m-b-5">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        {{-- ----------------------------   ---  --------------------------- --}}
                                        <a href="{{ route('dashboard.sweetpoding.destroy', $sweet->id) }}"
                                            class="btn btn-danger" data-confirm-delete="true"><ion-icon
                                                name="trash-outline"></ion-icon></a>
                                        {{-- ----------------------------   ---  --------------------------- --}}

                                        {{-- <form action="{{ route('dashboard.sweetpoding.destroy', $sweet->id) }}"
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
                                <th>Date</th>
                                <th>First term</th>
                                <th>Come in</th>
                                <th>Convert From</th>
                                <th>Convert to</th>
                                <th>Harmony</th>
                                <th>Sales</th>
                                <th>Residual</th>
                                <th>last term</th>
                                <th>Disability</th>
                                <th>Action</th>
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
