<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- modal-header --}}
            <div class="modal-header">
                <h4 class="modal-title">Create Big Water</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- modal-body --}}
            <form action="{{ route('dashboard.bigwater.store') }}" method="post">
                @csrf
                @method('POST')

                <div class="modal-body">

                    <input class="form-control form-control-lg mb-2" name="first_term_B" type="number"
                        placeholder="First term"
                        {{ $row_first_term->first() == null ? ' ' : 'disabled' }}>

                    <input type="date" name="date_A" class="form-control form-control-lg mb-2"
                        style="width: 100%; display: inline;" onchange="invoicedue(event);" required value="">

                    <div class="form-row mb-2">
                        <div class="col">
                            <input class="form-control form-control-lg" name="sales_G" type="number"
                                placeholder="Sales">
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg" name="last_term_I" type="number"
                                placeholder="last term">
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <input class="form-control form-control-lg" name="harmony_F" type="number"
                                placeholder="harmony">
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg" name="come_in_C" type="number"
                                placeholder="Come in">
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <input class="form-control form-control-lg" name="convert_from_D" type="number"
                                placeholder="Convert From">
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg" name="convert_to_E" type="number"
                                placeholder="Convert to">
                        </div>
                    </div>

                    {{-- <input class="form-control form-control-lg" name="" type="text" placeholder=".input-lg"> --}}
                </div>

                {{-- modal-footer --}}
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
