@extends('admin.layouts.app')

@section('title', 'FAQs')
@section('page-title', 'FAQs')

@section('content')
    <div class="row-xl-4">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text"><i class="fa fa-question-circle"></i>&nbsp; All FAQs</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#" act='{{ route('faq.create') }}'
                                class="FaqModal btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add FAQ</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" style="text-align: center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th style="font-size:15px;">السؤال</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($faqs as $faq)
                            <tr>
                                <td>{{ $faq->id }}</td>
                                <td style="width:40%">{{ $faq->question }}</td>
                                <td style="width:40%">{{ $faq->question_ar }}</td>
                                <td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                    <a href="#" act="{{ route('faq.edit', $faq->id) }}"
                                        class="FaqModal btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom">
                                        <i class="fa flaticon-edit"></i>
                                    </a>
                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom flaticon-delete delete-faq"
                                            data-faq-id="{{ $faq->id }}">
                                            <i class="fa flaticon-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $faqs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <div class="faqModal modal fade" id="faq_modal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="width: 1000px;">
                <div class="faqContent modal-body"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '.FaqModal', function(e) {
                e.preventDefault();
                let ur = $(this).attr('act');
                $('.faqContent').load(ur, function() {
                    $('#faq_modal').modal();
                });
            });

            $(document).on('click', '.delete-faq', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want To Delete This FAQ!",
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
        });
    </script>
@endpush
