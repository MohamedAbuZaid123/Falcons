@extends('admin.layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Contact Us Messages')
@section('page-title', 'Contact Us')

@section('content')
    <div class="row-xl-4">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <i class="flaticon-mail"></i>&nbsp; Contact Messages
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $msg->first_name }}</td>
                                <td>{{ $msg->last_name }}</td>
                                <td>{{ $msg->phone }}</td>
                                <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                                <td>{{ $msg->created_at->diffForHumans() }}</td>
                                <td>
                                    <button type="button"
                                        class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom view-message-btn"
                                        data-toggle="modal" data-target="#viewMessageModal{{ $msg->id }}"
                                        style="margin-right: 5px;" title="View Message">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <form action="{{ route('contactUs.destroy', $msg->id) }}" method="POST"
                                        class="delete-form" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill btn btn-info m-btn m-btn--custom flaticon-delete delete-contact"
                                            data-contact-id="{{ $msg->id }}">
                                            <i class="fa flaticon-delete"></i>
                                        </button>
                                    </form>
                                    <!-- Modal -->
                                    <div class="modal fade" id="viewMessageModal{{ $msg->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="viewMessageModalLabel{{ $msg->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info text-white justify-content-center flex-column align-items-center"
                                                    style="padding: 20px 15px; text-align: center;">
                                                    <div
                                                        class="w-100 d-flex flex-column align-items-center justify-content-center">
                                                        <i class="fa fa-envelope fa-2x mb-2"></i>
                                                        <h5 class="modal-title mb-1 w-100"
                                                            id="viewMessageModalLabel{{ $msg->id }}">
                                                            Message from {{ $msg->first_name }} {{ $msg->last_name }}
                                                        </h5>
                                                        <small class="w-100">
                                                            <i class="fa fa-envelope"></i> <a
                                                                href="mailto:{{ $msg->email }}"
                                                                class="text-white">{{ $msg->email }}</a> |
                                                            <i class="fa fa-phone"></i> {{ $msg->phone }} |
                                                            <i class="fa fa-clock-o"></i>
                                                            {{ $msg->created_at->format('Y-m-d H:i') }}
                                                        </small>
                                                    </div>
                                                    <button type="button" class="close text-white position-absolute"
                                                        style="right: 20px; top: 20px;" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <div class="card shadow-sm border-0">
                                                        <div class="card-body">
                                                            <h6 class="font-weight-bold mb-3"><i
                                                                    class="fa fa-commenting-o mr-1"></i>Message</h6>
                                                            <p class="mb-0"
                                                                style="white-space: pre-line; font-size: 1.1em;">
                                                                {{ $msg->message }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="text-center py-4">
                                        <i class="fa fa-inbox fa-2x text-muted"></i>
                                        <div class="mt-2 text-muted">No messages found.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class='col-md-7 offset-2'>
        <form id="contact-us-form">
            <div class="m-portlet m-portlet--tabs">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                                    <i class=" flaticon-placeholder-1 "></i> Address
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                                    <i class="la la-phone-square"></i> Phones
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">
                                    <i class=" flaticon-profile-1 "></i>Social Media
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                            <div id="address-fields">
                                <div class="form-group m-form__group row address-row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line 1:</label>
                                    <div class="col-xl-9 col-lg-9 d-flex align-items-center">
                                        <input type="text" name="address1" class="form-control m-input"
                                            placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row address-row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2:</label>
                                    <div class="col-xl-9 col-lg-9 d-flex align-items-center">
                                        <input type="text" name="address2" class="form-control m-input"
                                            placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row address-row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line 1 (Arabic):</label>
                                    <div class="col-xl-9 col-lg-9 d-flex align-items-center">
                                        <input type="text" name="address1_ar" dir="rtl"
                                            class="form-control m-input" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row address-row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2 (Arabic):</label>
                                    <div class="col-xl-9 col-lg-9 d-flex align-items-center" dir="rtl">
                                        <input type="text" name="address2_ar" class="form-control m-input"
                                            placeholder="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row"
                                style="display: flex;justify-content: flex-end;align-items: center;height: ;padding: 20px 20px 0px">
                                <button type="button" id="save-address-btn"
                                    class="btn btn-accent  m-btn m-btn--icon m-btn--wide m-btn--md">
                                    <span>
                                        <i class="la la-check"></i>
                                        <span>Save</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                            <div id="phone-fields">
                                <div class="form-group m-form__group row phone-row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone Number 1:</label>
                                    <div class="col-xl-9 col-lg-9 d-flex align-items-center">
                                        <input type="text" name="phone1" class="form-control m-input" placeholder=""
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row phone-row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone Number 2:</label>
                                    <div class="col-xl-9 col-lg-9 d-flex align-items-center">
                                        <input type="text" name="phone2" class="form-control m-input" placeholder=""
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row"
                                style="display: flex;justify-content: flex-end;align-items: center;height: ;padding: 20px 20px 0px">
                                <button type="button" id="save-phone-btn"
                                    class="btn btn-accent  m-btn m-btn--icon m-fbtn--wide m-btn--md">
                                    <span>
                                        <i class="la la-check"></i>
                                        <span>Save</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                            <div class="form-group m-form__group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Facebook :</label>
                                <div class="col-xl-9 col-lg-9">
                                    <input type="text" name="facebook" class="form-control m-input" placeholder=""
                                        value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">LinkedIn :</label>
                                <div class="col-xl-9 col-lg-9">
                                    <input type="text" name="linkedin" class="form-control m-input" placeholder=""
                                        value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">X :</label>
                                <div class="col-xl-9 col-lg-9">
                                    <input type="text" name="x" class="form-control m-input" placeholder=""
                                        value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">WhatsApp :</label>
                                <div class="col-xl-9 col-lg-9">
                                    <input type="text" name="whatsapp" class="form-control m-input" placeholder=""
                                        value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row"
                                style="display: flex;justify-content: flex-end;align-items: center;height: ;padding: 20px 20px 0px">
                                <button type="button" id="save-social-btn"
                                    class="btn btn-accent  m-btn m-btn--icon m-btn--wide m-btn--md">
                                    <span>
                                        <i class="la la-check"></i>
                                        <span>Save</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch(`{{ route('contactInfo.info') }}`)
                .then(res => res.json())
                .then(data => {
                    fillContactForm(data);
                });

            ['save-address-btn', 'save-phone-btn', 'save-social-btn'].forEach(id => {
                document.getElementById(id).onclick = handleSubmit;
            });
        });

        function fillContactForm(data) {
            document.querySelector('[name="address1"]').value = data.addresses && data.addresses[0] ? data.addresses[0] :
                '';
            document.querySelector('[name="address2"]').value = data.addresses && data.addresses[1] ? data.addresses[1] :
                '';
            // Add for Arabic addresses
            if (data.addresses_ar) {
                document.querySelector('[name="address1_ar"]').value = data.addresses_ar[0] || '';
                document.querySelector('[name="address2_ar"]').value = data.addresses_ar[1] || '';
            } else {
                document.querySelector('[name="address1_ar"]').value = '';
                document.querySelector('[name="address2_ar"]').value = '';
            }
            document.querySelector('[name="phone1"]').value = data.mobiles && data.mobiles[0] ? data.mobiles[0] : '';
            document.querySelector('[name="phone2"]').value = data.mobiles && data.mobiles[1] ? data.mobiles[1] : '';
            if (data.social_links) {
                document.querySelector('[name="facebook"]').value = data.social_links.facebook || '';
                document.querySelector('[name="linkedin"]').value = data.social_links.linkedin || '';
                document.querySelector('[name="x"]').value = data.social_links.x || '';
                document.querySelector('[name="whatsapp"]').value = data.social_links.whatsapp || '';
            }
        }

        function handleSubmit() {
            const data = {
                addresses: [
                    document.querySelector('[name="address1"]').value.trim(),
                    document.querySelector('[name="address2"]').value.trim()
                ],
                addresses_ar: [
                    document.querySelector('[name="address1_ar"]').value.trim(),
                    document.querySelector('[name="address2_ar"]').value.trim()
                ],
                mobiles: [
                    document.querySelector('[name="phone1"]').value.trim(),
                    document.querySelector('[name="phone2"]').value.trim()
                ],
                social_links: {
                    facebook: document.querySelector('[name="facebook"]').value.trim(),
                    linkedin: document.querySelector('[name="linkedin"]').value.trim(),
                    x: document.querySelector('[name="x"]').value.trim(),
                    whatsapp: document.querySelector('[name="whatsapp"]').value.trim()
                }
            };

            fetch(`{{ route('contactInfo.store') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(res => {
                    if (!res.ok) return res.text().then(text => {
                        throw new Error(text);
                    });
                    return res.json();
                })
                .then(res => {
                    alert('Saved successfully!');
                    console.log('Server response:', res);
                })
                .catch(err => {
                    alert('Error saving data: ' + err.message);
                    console.error('Save error:', err);
                });
        }
    </script>
    <script>
        $(function() {
            $(document).on('click', '.delete-contact', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want To Delete This Message!",
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
