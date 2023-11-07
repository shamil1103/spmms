<div class="form-group mb-3">
    <label for="name">Name <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" value="{{ old('name', $client->name ?? null) }}"
        class="form-control  @error('name') is-invalid @enderror " placeholder="Name" aria-label="Name"
        aria-describedby="basic-addon1" required>
    @error('name')
        <div class="text-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="contact_number">Contact Number</label>
    <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', $client->contact_number ?? null) }}"
        class="form-control  @error('contact_number') is-invalid @enderror " placeholder="Contact Number" aria-label="Contact Number"
        aria-describedby="basic-addon1">
    @error('contact_number')
        <div class="text-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="address">Address</label>
    <textarea name="address" id="address"
        class="form-control @error('address') is-invalid @enderror " placeholder="Address" aria-label="Address"
        aria-describedby="basic-addon1">{{ old('address', $client->address ?? null) }}</textarea>
    @error('address')
        <div class="text-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
