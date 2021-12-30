@props(['label','single','multiple'])
<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $label }}</button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ $single }}">Add new</a>
      <a class="dropdown-item" href="{{ $multiple }}">Add Multiple</a>
    </div>
  </div>
