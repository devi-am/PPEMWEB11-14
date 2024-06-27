@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">K-POP Artists</h1>
    @auth
    <a href="{{ route('artists.create') }}" class="btn btn-primary mb-3">Add New Artist</a>
    @endauth
    <div class="row">
        @foreach($members as $member)
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="artist-image-container">
                                @if($member->foto_member)
                                    <img src="{{ asset('storage/'.$member->foto_member) }}" class="artist-image" alt="{{ $member->nama_panggung }}">
                                @else
                                    <img src="{{ asset('images/default-profile.jpg') }}" class="artist-image" alt="Default Profile">
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">{{ $member->nama_panggung }}</h5>
                                <p class="card-text">
                                    <strong>Real Name:</strong> {{ $member->nama_asli }}<br>
                                    <strong>Group:</strong> {{ $member->group->nama_grub }}<br>
                                    <strong>Birthday:</strong> {{ $member->tanggal_lahir->format('F d, Y') }}<br>
                                    <strong>Nationality:</strong> {{ $member->kewarganegaraan }}
                                </p>
                                @auth
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="{{ route('artists.edit', $member) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('artists.destroy', $member) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection