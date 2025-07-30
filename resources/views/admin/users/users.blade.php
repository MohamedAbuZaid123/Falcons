@extends('admin.layouts.app')

@section('title', 'Users')
@section('page-title', 'Users')

@section('content')
    <div class="row-xl-4">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text"><i class="flaticon-users-1"></i>&nbsp; All Users</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#" act='{{ route('user.create') }}'
                                class="User btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add User</span>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            @if (auth()->id() !== $user->id)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="user-status" data-id="{{ $user->id }}">
                                        @if ($user->active)
                                            <span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;
                                            <span class="m--font-bold m--font-primary">Active</span>
                                        @else
                                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;
                                            <span class="m--font-bold m--font-danger">Not Active</span>
                                        @endif
                                    </td>
                                    <td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                        <a href="#" act="{{ route('user.edit', ['user' => $user]) }}"
                                            class="User btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom">
                                            <i class="fa flaticon-edit"></i>
                                        </a>
                                        <form hidden="true" id= "deleteUserForm"
                                            action="{{ route('user.destroy', ['user' => $user]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button
                                            class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom flaticon-delete"
                                            id="m_sweetalert"></button>
                                        <span class="m-list-settings__item-control"style="  padding-top: 8px;">
                                            <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                                <label>
                                                    <input type="checkbox" class="toggle-active"
                                                        data-id="{{ $user->id }}" {{ $user->active ? 'checked' : '' }}>
                                                    <span></span>
                                                </label>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- User Modal (only once per page) -->
    <div class="userModal modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="userContent modal-body">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            // Use event delegation for dynamic elements
            $(document).on('click', '.User', function(e) {
                e.preventDefault();
                let ur = $(this).attr('act');
                $('.userContent').load(ur, function() {
                    $('.userModal').modal();
                });
            });

            // Handle delete button click
            $(document).on('click', '#m_sweetalert', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want To Delete This User!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("deleteUserForm").submit();
                    }
                });
            });

            $(document).on('change', '.toggle-active', function() {
                const userId = $(this).data('id');
                const isChecked = $(this).is(':checked');
                $.ajax({
                    url: '{{ url('admin/user') }}/' + userId + '/toggle-active',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        active: isChecked ? 1 : 0
                    },
                    success: function() {
                        const statusTd = $('.user-status[data-id="' + userId + '"]');
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
