@extends('Layouts.admin.app')

@section('title')
    Training
@endsection

@section('main')
    {{-- {{ $errors }} --}}
    {{-- edit training --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h6>Add Agent</h6>
                            <div>
                                <a href="{{ route('hajj.page') }}"
                                    class="btn btn-sm bg-gradient-primary font-weight-bold text-xs">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('hajj.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
