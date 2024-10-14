@extends('dasboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable sweet productions</h3>
                    <a href="" class="btn btn-info waves-effect waves-light m-b-5" data-toggle="modal"
                        data-target="#modal-default">
                        <span>Add sweet productions</span>
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="#" onclick="window.print();return false"
                        class="btn btn-info waves-effect waves-light m-b-5">
                        <span>print</span>
                        <i class="fa fa-edit"></i>
                    </a>
                    @include('dasboard.pages.SweetProduction.create')

                </div>
                <!-- /.card-header -->
                {{-- <div class="card-body"> --}}
                <div class="table-responsive-sm">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Pure milk</th>
                                <th>Production of boxes</th>
                                <th>Convert from</th>
                                <th>Convert to</th>
                                <th>harmony</th>
                                <th>a cook</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sweet_productions as $key => $sweet_product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sweet_product->date_A }}</td>
                                    <td>{{ $sweet_product->pure_milka_B }}</td>
                                    <td>{{ $sweet_product->boxes_C }}</td>
                                    <td>{{ $sweet_product->convert_from_D }}</td>
                                    <td>{{ $sweet_product->convert_to_E }}</td>
                                    <td>{{ $sweet_product->harmony_F }}</td>
                                    <td>{{ $sweet_product->a_cook_G }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.sweetProduction.edit', $sweet_product->id) }}"
                                            class="btn btn-icon waves-effect waves-light btn-warning m-b-5">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        {{-- ----------------------------   ---  --------------------------- --}}
                                        <a href="{{ route('dashboard.sweetProduction.destroy', $sweet_product->id) }}"
                                            class="btn btn-danger" data-confirm-delete="true"><ion-icon
                                                name="trash-outline"></ion-icon></a>
                                        {{-- ----------------------------   ---  --------------------------- --}}

                                        {{-- <form action="{{ route('dashboard.sweetProduction.destroy', $sweet_product->id) }}"
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
                                @if (!$count_milka)
                                    <th>Pure milk</th>
                                @else
                                    <th style="color: blue">Total {{ $count_milka }}</th>
                                @endif

                                @if (!$count_boxes)
                                    <th>Production of boxes</th>
                                @else
                                    <th style="color: blue">Total {{ $count_boxes }}</th>
                                @endif
                                <th>Convert from</th>
                                <th>Convert to</th>
                                <th>harmony</th>
                                <th>a cook</th>
                                <th>action</th>
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
