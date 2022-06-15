@extends('layouts.master', ['title' => 'Akun'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="PROFILE" class="card-body">
                <form action="{{ route('customer.setting.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input title="Nama" name="name" type="text" placeholder="" :value="$user->name" />
                    <x-input title="Email" name="email" type="text" placeholder="" :value="$user->email" />
                    <x-input title="Seksi" name="department" type="text" placeholder="" :value="$user->department" />
                    <x-input title="Avatar" name="avatar" type="file" placeholder="" :value="$user->avatar" />
                    <x-input title="Password" name="password" type="password" placeholder="" value="" />
                    <x-button-save title="Update" icon="save" class="btn btn-primary" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection
