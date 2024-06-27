@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $group->nama_grub }} Members</h1>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Back to Groups</a>
    <div class="row">
        @foreach($members as $member)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="member-image-container">
                                @if($member->foto_member)
                                    <img src="{{ asset('storage/'.$member->foto_member) }}" class="member-image" alt="{{ $member->nama_panggung }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $member->nama_panggung }}</h5>
                                <p class="card-text">
                                    <strong>Real Name:</strong> {{ $member->nama_asli }}<br>
                                    <strong>Date of Birth:</strong> {{ $member->tanggal_lahir }}<br>
                                    <strong>Nationality:</strong> {{ $member->kewarganegaraan }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
