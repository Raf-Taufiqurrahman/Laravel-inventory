@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')
    <x-container>
        <div class="col-12">
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="fas fa-info-circle mr-2 fa-lg"></i>
                Saat ini belum ada permintaan barang
            </div>
        </div>
    </x-container>
@endsection
