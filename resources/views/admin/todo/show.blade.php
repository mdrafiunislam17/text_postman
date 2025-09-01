@extends("admin.layouts.master")
@section("title", "View Todo")
@section("content")

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Todo</h1>
            <a href="{{ route("todo.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-list fa-sm text-white-50"></i> Back to List
            </a>
        </div>

        <!-- Data Display -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Description</label>
                    <div class="col-sm-6">
                        <div class="border p-3 rounded bg-light">
                            {!! $todo->description !!}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                    <div class="col-sm-6">
                        @if ($todo->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Created At</label>
                    <div class="col-sm-6">
                        <span>{{ $todo->created_at->format("d M Y h:i A") }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right font-weight-bold">Updated At</label>
                    <div class="col-sm-6">
                        <span>{{ $todo->updated_at->format("d M Y h:i A") }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <a href="{{ route("todo.edit", $todo->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route("todo.index") }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
