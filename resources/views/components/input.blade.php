<div class="mb-3">
  <label for="input-{{ $name }}" class="form-label @error($name) text-danger @enderror">
    <span>{{ $label }}</span>
    @if($required)
    <span class="text-danger">*</span>
    @endif
  </label>
  <input
    id="input-{{ $name }}"
    class="form-control @error($name) is-invalid @enderror"
    name="{{ $name }}"
    type="{{ $type }}"
    value="{{ old($name, $value) }}"
    @if($required) required @endif
    @if($disabled) disabled @endif
  >
  @error($name)
  <div class="alert alert-danger mt-3">{{ $message }}</div>
  @enderror
</div>
