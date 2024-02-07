@extends('Layouts.admin.app')

@section('title')
    Edit
@endsection

@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h6>Edit Agent Data</h6>
                            <div>
                                <a href="{{ route('hajj.page') }}"
                                    class="btn btn-sm bg-gradient-primary font-weight-bold text-xs">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('hajj.update', $hajj->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.form')
                            {{-- <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm bg-gradient-warning font-weight-bold text-xs"
                                    data-toggle="tooltip" data-original-title="Update">
                                    Update
                                </button>
                                <button type="button" class="btn btn-sm bg-gradient-danger font-weight-bold text-xs"
                                    data-toggle="tooltip" data-original-title="Delete"
                                    onclick="deleteMember('{{ $candidate->id }}')">
                                    Delete
                                </button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
