<div class="modal-header">
    <h5 class="modal-title">View User</h5>
    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body" id>
    <div class="card">
        <div class="card-body">
            @if ($user->image_path)
                <div class="mt-4 text-center">
                    <img src="{{  $application->image_path }}" alt="img" class="br-5" style="hight: 100px; width: 180px" />
                </div>
            @endif
            <div class="col-8 offset-2">
                <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                    <tbody>
                        <tr>
                            <td width="30%">Name</td>
                            <td width="5%">:</td>
                            <td width="65%">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                {{ $user->status->value }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
