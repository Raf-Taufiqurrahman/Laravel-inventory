@extends('layouts.frontend.master', ['title' => 'ATK - Kategori'])

@section('content')
    <div class="container-xl">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title font-weight-bold text-uppercase">
                        Daftar Kategori
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('category.index') }}" method="GET">
                    <x-search name="search" :value="$search" />
                </form>
            </div>
            @foreach ($categories as $category)
                <div class="col-md-6 col-lg-2">
                    <a class="card card-sm border-0" href="{{ route('category.show', $category->slug) }}">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar rounded"
                                        style="background-image: url({{ $category->image }})"></span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $category->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
