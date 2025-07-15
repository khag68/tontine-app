@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-indigo-700 mb-6">👤 Mon profil</h2>

    @livewire('client.profile-form') {{-- Nom, email, téléphone, mot de passe --}}
</div>
@endsection
