<div class="form-group mb-3">
    <label for="name">Name <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? null) }}"
        class="form-control  @error('name') is-invalid @enderror " placeholder="Name" aria-label="Name"
        aria-describedby="basic-addon1" required>
    @error('name')
        <div class="text-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="email">Email <span class="text-danger">*</span></label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? null) }}"
        class="form-control @error('email') is-invalid @enderror " placeholder="Email" aria-label="Email"
        aria-describedby="basic-addon1" required>
    @error('email')
        <div class="text-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="password">Password @if (empty($user))
            <span class="text-danger">*</span>
        @endif
    </label>
    <input type="password" name="password" id="password" value=""
        class="form-control @error('password') is-invalid @enderror " placeholder="Password" aria-label="Password"
        aria-describedby="basic-addon1" @if (empty($user)) required @endif>
    @error('password')
        <div class="text-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label class="form-label mt-0">Image</label>
    <input type="file" name="image" id="image"
        class="form-control file-preview @error('image') is-invalid @enderror" accept="image/*"
        data-previewDiv="preview_file_image">
    @error('image')
        <div class="text-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <div id="preview_file_image" style="margin-top: 10px;">
        @if (!empty($user) && $user->image != null)
            <img src="{{ $user->image_path }}" class="img-fluid img-thumbnail" style="height: 100px"
                alt="User  Image">
        @endif
    </div>
</div>

<div class="mb-3">
    <label for="roles" class="form-label">Roles <span class="text-danger">*</span></label>
    <select class="form-control select2 @error('roles') is-invalid @enderror" id="roles" name="roles[]"
        data-placeholder="Select roles" multiple>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" @selected(in_array($role->id, old('roles', $user->roles ?? [])))>{{ $role->name }}</option>
        @endforeach
    </select>

    @error('roles')
        <div class="invalid-feedback" role="alert">
            {{ $message }}
        </div>
    @enderror

    @error('roles.*')
        <div class="invalid-feedback" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
