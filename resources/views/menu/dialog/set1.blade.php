<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="fa fa-exclamation-circle" style="font-size:100px;color:red"></i>
                    <h4 class="mt-4"><b>Are you sure?</b></h4>
                    <h6>You won't be able to revert this!</h6>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary text-white" onclick="delete_request()">Yes, delete it!</a>
            </div>
        </div>
    </div>
</div>

<!-- PRIORITY 0 MODAL -->
<div class="modal fade" id="priority0Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="fa fa-exclamation-circle" style="font-size:100px;color:red"></i>
                    <h4 class="mt-4"><b>Are you sure?</b></h4>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary text-white" onclick="priority0()">Yes</a>
            </div>
        </div>
    </div>
</div>

<!-- PRIORITY 1 MODAL -->
<div class="modal fade" id="priority1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="fa fa-exclamation-circle" style="font-size:100px;color:red"></i>
                    <h4 class="mt-4"><b>Are you sure?</b></h4>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary text-white" onclick="priority1()">Yes</a>
            </div>
        </div>
    </div>
</div>