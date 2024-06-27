@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New K-POP Group</h1>
    <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_grub">Group Name</label>
            <input type="text" class="form-control" id="nama_grub" name="nama_grub" required>
        </div>
        <div class="form-group">
            <label for="foto_grub">Group Photo</label>
            <input type="file" class="form-control-file" id="foto_grub" name="foto_grub">
        </div>
        <div class="form-group">
            <label for="jenis">Type</label>
            <select class="form-control" id="jenis" name="jenis" required>
                <option value="boy group">Boy Group</option>
                <option value="girl group">Girl Group</option>
            </select>
        </div>
        <div class="form-group">
            <label for="generasi">Generation</label>
            <input type="text" class="form-control" id="generasi" name="generasi" required>
        </div>
        <div class="form-group">
            <label for="tahun_debut">Debut Year</label>
            <input type="number" class="form-control" id="tahun_debut" name="tahun_debut" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Group</button>
        <a href="{{ route('home') }}" class="btn btn-secondary ml-2">Cancel</a>
    </form>
</div>
@endsection