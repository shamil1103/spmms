<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Role <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name', $role->name ?? null) }}" name="name" placeholder="Enter role name"
                        autofocus>

                    @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <label class="form-label">Permission <span class="text-danger">*</span></label>

        <div class="form-check form-checkbox-outline form-check-primary mb-3">
            <input class="form-check-input" type="checkbox" id="permission_all" name="permission_all">
            <label class="form-check-label" for="permission_all">
                All Permission
            </label>
        </div>

        @foreach ($permissions as $module => $modulePermissions)
            <h6>{{ $module }}</h6>
            <div class="row mb-3">
                @foreach ($modulePermissions as $permission)
                    <div class="col-xl-3 col-sm-4">
                        <div class="form-check form-checkbox-outline form-check-primary form-check-inline">
                            <input class="form-check-input" type="checkbox" id="permission_{{ $permission->id }}"
                                name="permissions[]"
                                value="{{ $permission->id }}"
                                @checked(in_array($permission->id, old('permissions', $role->permissions ?? [])))>
                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        @error('permissions')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror

        @error('permissions.*')
            <div class="invalid-feedback d-block" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

@push('js')
    <script>
        $("#permission_all").on('change', function() {
            let checked = $("#permission_all").prop('checked')

            $("input[name='permissions[]']").prop('checked', checked)
        })

        $("input[name='permissions[]']").on('change', function() {
            if ($("input[name='permissions[]']:not(:checked)").length > 0) {
                $("#permission_all").prop('checked', false)
            } else {
                $("#permission_all").prop('checked', true)
            }
        })
    </script>
@endpush
