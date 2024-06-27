@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Artist: {{ $member->nama_panggung }}</h1>
    <form action="{{ route('artists.update', $member) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_panggung">Stage Name</label>
            <input type="text" class="form-control" id="nama_panggung" name="nama_panggung" value="{{ $member->nama_panggung }}" required>
        </div>
        <div class="form-group">
            <label for="nama_asli">Real Name</label>
            <input type="text" class="form-control" id="nama_asli" name="nama_asli" value="{{ $member->nama_asli }}" required>
        </div>
        <div class="form-group">
            <label for="id_group">Group</label>
            <select class="form-control" id="id_group" name="id_group" required>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ $member->id_group == $group->id ? 'selected' : '' }}>{{ $group->nama_grub }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Birthday</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $member->tanggal_lahir->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="kewarganegaraan">Nationality</label>
            <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="{{ $member->kewarganegaraan }}" required>
        </div>
        <div class="form-group">
            <label for="foto_member">Photo</label>
            <input type="file" class="form-control-file" id="foto_member" name="foto_member">
            @if($member->foto_member)
                <img src="{{ asset('storage/'.$member->foto_member) }}" alt="{{ $member->nama_panggung }}" class="mt-2" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Artist</button>
        <a href="{{ route('artists.index') }}" class="btn btn-secondary ml-2">Cancel</a>
    </form>
</div>
@endsection