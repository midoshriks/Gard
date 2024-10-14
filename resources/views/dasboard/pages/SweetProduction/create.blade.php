<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- modal-header --}}
            <div class="modal-header">
                <h4 class="modal-title">Create sweet productions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- modal-body --}}
            <form action="{{ route('dashboard.sweetProduction.store') }}" method="post">
                @csrf
                @method('POST')

                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-row mb-2">
                        <div class="col">
                            <input type="date" name="date_A" class="form-control form-control-lg"
                                style="width: 100%; display: inline;" onchange="invoicedue(event);" required
                                value="">
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg" name="pure_milka_B" type="number"
                                placeholder="Pure milka">
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <input class="form-control form-control-lg" name="boxes_C" type="number"
                                placeholder="Production of boxes">
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg" name="convert_from_D" type="number"
                                placeholder="Convert from">
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <input class="form-control form-control-lg" name="convert_to_E" type="number"
                                placeholder="Convert to">
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg" name="harmony_F" type="number"
                                placeholder="harmony">
                        </div>
                    </div>

                    <input class="form-control form-control-lg" name="a_cook_G" type="text"
                        placeholder="name a cook">

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
