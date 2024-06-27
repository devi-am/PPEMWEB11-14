@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit K-POP Group</h1>
    <form action="{{ route('groups.update', $group) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_grub">Group Name</label>
            <input type="text" class="form-control" id="nama_grub" name="nama_grub" value="{{ $group->nama_grub }}" required>
        </div>
        <div class="form-group">
            <label for="foto_grub">Group Photo</label>
            <input type="file" class="form-control-file" id="foto_grub" name="foto_grub">
            @if($group->foto_grub)
                <img src="{{ asset('storage/'.$group->foto_grub) }}" alt="{{ $group->nama_grub }}" class="mt-2" style="max-width: 200px;">
            @endif
        </div>
        <div class="form-group">
            <label for="jenis">Type</label>
            <select class="form-control" id="jenis" name="jenis" required>
                <option value="boy group" {{ $group->jenis == 'boy group' ? 'selected' : '' }}>Boy Group</option>
                <option value="girl group" {{ $group->jenis == 'girl group' ? 'selected' : '' }}>Girl Group</option>
            </select>
        </div>
        <div class="form-group">
            <label for="generasi">Generation</label>
            <input type="text" class="form-control" id="generasi" name="generasi" value="{{ $group->generasi }}" required>
        </div>
        <div class="form-group">
            <label for="tahun_debut">Debut Year</label>
            <input type="number" class="form-control" id="tahun_debut" name="tahun_debut" value="{{ $group->tahun_debut }}" required>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Update Group</button>
            <a href="{{ route('home') }}" class="btn btn-secondary ml-2">Cancel</a>
        </div>
    </form>
</div>
@endsection