<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.aside')

        <div class="body-wrapper">
            @include('layouts.navigation')

            <div class="m-3">
                <div class="row">
                 
                    <div class="col-lg-12">
                        <div class="card w-100 shadow-none border">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title fw-semibold mb-0">Settings</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createFaqModal">
                                        New FAQ
                                    </button>
                                </div>

                                <ul class="nav nav-tabs mb-4" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $activeTab === 'faq' ? 'active' : '' }}"
                                            href="{{ route('settings.index', ['tab' => 'faq']) }}" role="tab">
                                            FAQs
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade {{ $activeTab === 'faq' ? 'show active' : '' }}"
                                        id="tab-faq" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap mb-0 align-middle table-bordered">
                                                <thead class="text-dark fs-4">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Question</th>
                                                        <th>Answer</th>
                                                        <th>Status</th>
                                                        <th>Last Updated</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($faqs as $index => $faq)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td class="fw-semibold text-truncate" style="max-width: 240px;" title="{{ $faq->question }}">
                                                                {{ \Illuminate\Support\Str::limit($faq->question, 60, ' ...') }}
                                                            </td>
                                                            <td class="text-truncate" style="max-width: 360px;" title="{{ $faq->answer }}">
                                                                {{ \Illuminate\Support\Str::limit($faq->answer, 100, ' ...') }}
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge {{ $faq->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                                    {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $faq->updated_at?->format('M d, Y H:i') }}</td>
                                                            <td>
                                                                <a href="#" class="badge bg-primary me-1 edit-faq-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editFaqModal"
                                                                    data-faq-id="{{ $faq->id }}"
                                                                    data-faq-question="{{ $faq->question }}"
                                                                    data-faq-answer="{{ $faq->answer }}"
                                                                    data-faq-active="{{ $faq->is_active ? '1' : '0' }}">
                                                                    <i class="ti ti-edit"></i>
                                                                </a>
                                                                <a href="{{ route('settings.faqs.destroy', $faq) }}"
                                                                    class="badge bg-danger"
                                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this FAQ?')) { document.getElementById('delete-faq-{{ $faq->id }}').submit(); }">
                                                                    <i class="ti ti-trash"></i>
                                                                </a>
                                                                <form id="delete-faq-{{ $faq->id }}"
                                                                    action="{{ route('settings.faqs.destroy', $faq) }}"
                                                                    method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                <h6 class="fw-semibold mb-0 text-danger">No FAQs found.
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createFaqModal" tabindex="-1" aria-labelledby="createFaqModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFaqModalLabel">Create FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('settings.faqs.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="faq_question" class="form-label">Question</label>
                            <input type="text" class="form-control" id="faq_question" name="question"
                                value="{{ old('question') }}" placeholder="Enter question" required>
                        </div>
                        <div class="mb-3">
                            <label for="faq_answer" class="form-label">Answer</label>
                            <textarea class="form-control" id="faq_answer" name="answer" rows="4" placeholder="Provide the answer" required>{{ old('answer') }}</textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" id="faq_is_active" name="is_active"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="faq_is_active">
                                Display on website
                            </label>
                        </div>
                        <div class="modal-footer px-0">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFaqModalLabel">Edit FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="edit-faq-form">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_faq_question" class="form-label">Question</label>
                            <input type="text" class="form-control" id="edit_faq_question" name="question"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_faq_answer" class="form-label">Answer</label>
                            <textarea class="form-control" id="edit_faq_answer" name="answer" rows="4" required></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" id="edit_faq_is_active"
                                name="is_active">
                            <label class="form-check-label" for="edit_faq_is_active">
                                Display on website
                            </label>
                        </div>
                        <div class="modal-footer px-0">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editFaqModal = document.getElementById('editFaqModal');
            const editFaqForm = document.getElementById('edit-faq-form');
            const editFaqQuestion = document.getElementById('edit_faq_question');
            const editFaqAnswer = document.getElementById('edit_faq_answer');
            const editFaqIsActive = document.getElementById('edit_faq_is_active');

            if (editFaqModal) {
                editFaqModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    if (!button) {
                        return;
                    }

                    const faqId = button.getAttribute('data-faq-id');
                    const faqQuestion = button.getAttribute('data-faq-question');
                    const faqAnswer = button.getAttribute('data-faq-answer');
                    const faqActive = button.getAttribute('data-faq-active') === '1';

                    editFaqQuestion.value = faqQuestion || '';
                    editFaqAnswer.value = faqAnswer || '';
                    editFaqIsActive.checked = faqActive;
                    editFaqForm.action = "{{ url('/settings/faqs') }}/" + faqId;
                });
            }
        });
    </script>
</x-app-layout>

