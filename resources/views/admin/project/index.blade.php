@extends('admin.layouts.app')

@section('title', 'Projects')
@section('page-title', 'Projects')

@section('content')
    <div class="row-xl-4">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text"><i class="flaticon-globe"></i>&nbsp; All Projects</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#" act='{{ route('project.create') }}'
                                class="Project btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Create Project</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <div class="contnt"></div>
                <table class="table table-striped- table-bordered table-hover table-checkable" style="text-align: center"
                    id="m_table_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th style="width:40%">Description</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th style="width:8%">Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td style="width:35%">{{ $project->description }}</td>
                                <td>{{ $project->category }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td class="project-status" data-id="{{ $project->id }}">
                                    @if ($project->active)
                                        <span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;
                                        <span class="m--font-bold m--font-primary">Active</span>
                                    @else
                                        <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;
                                        <span class="m--font-bold m--font-danger">Not Active</span>
                                    @endif
                                </td>
                                <td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                    <a href="#" act="{{ route('project.edit', ['project' => $project]) }}"
                                        class="Project btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom">
                                        <i class="fa flaticon-edit"></i>
                                    </a>
                                    <form action="{{ route('project.destroy', ['project' => $project]) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom flaticon-delete delete-project"
                                            data-project-id="{{ $project->id }}">
                                            <i class="fa flaticon-delete"></i>
                                        </button>
                                    </form>
                                    <span class="m-list-settings__item-control" style="padding-top:11px">
                                        <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                            <label>
                                                <input type="checkbox" class="toggle-active" data-id="{{ $project->id }}"
                                                    {{ $project->active ? 'checked' : '' }}>
                                                <span></span>
                                            </label>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $projects->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <div class="projectModal modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="width: 900px;">
                <div class="projectContent modal-body">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '.Project', function(e) {
                e.preventDefault();
                let ur = $(this).attr('act');
                $('.projectContent').load(ur, function() {
                    $('.projectModal').modal();
                });
            });

            $(document).on('click', '.delete-project', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const projectId = $(this).data('project-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want To Delete This Project!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $(document).on('change', '.toggle-active', function() {
                const projectId = $(this).data('id');
                const isChecked = $(this).is(':checked');
                $.ajax({
                    url: '{{ url('admin/project') }}/' + projectId + '/toggle-active',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        active: isChecked ? 1 : 0
                    },
                    success: function() {
                        const statusTd = $('.project-status[data-id="' + projectId + '"]');
                        if (isChecked) {
                            statusTd.html(`
                            <span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;
                            <span class="m--font-bold m--font-primary">Active</span>
                        `);
                        } else {
                            statusTd.html(`
                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;
                            <span class="m--font-bold m--font-danger">Not Active</span>
                        `);
                        }
                    }
                });
            });
        });
    </script>
@endpush
