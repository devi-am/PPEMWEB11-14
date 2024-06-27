@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">K-POP Groups</h1>

    @auth
    <a href="{{ route('groups.create') }}" class="btn btn-primary mb-3">Add New Group</a>
    @endauth

    <div class="row">
        @foreach($groups as $group)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="group-image-container">
                    @if($group->foto_grub)
                    <img src="{{ asset('storage/'.$group->foto_grub) }}" class="card-img-top group-image"
                        alt="{{ $group->nama_grub }}">
                    @else
                    <img src="{{ asset('images/default-group.jpg') }}" class="card-img-top group-image"
                        alt="Default Group Image">
                    @endif
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $group->nama_grub }}</h5>
                    <p class="card-text">
                        <strong>Type:</strong> {{ $group->jenis }}<br>
                        <strong>Generation:</strong> {{ $group->generasi }}<br>
                        <strong>Debut Year:</strong> {{ $group->tahun_debut }}
                    </p>
                    <div class="mt-auto d-flex justify-content-center">
                        <a href="{{ route('members.index', ['group_id' => $group->id]) }}"
                            class="btn btn-sm btn-info">View Members</a>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    @auth
                    <a href="{{ route('groups.edit', $group) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection
