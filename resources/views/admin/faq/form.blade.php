<div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    {{ isset($faq) ? 'Edit FAQ' : 'Add FAQ' }}
                </h3>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ isset($faq) ? route('faq.update', $faq->id) : route('faq.store') }}"
        class="m-form m-form--fit m-form--label-align-right">
        @csrf
        @if (isset($faq))
            @method('PUT')
        @endif
        <div class="m-portlet__body">
            <div class="row">
                <div class="col-md-6" style="padding: 20px;">
                    <h5>English</h5>
                    <div class="form-group m-form__group">
                        <label class="form-label" for="question">Question</label>
                        <input type="text" name="question" id="question" class="form-control m-input"
                            value="{{ old('question', $faq->question ?? '') }}" required>
                    </div>
                    <div class="form-group m-form__group">
                        <label class="form-label" for="answer">Answer</label>
                        <textarea name="answer" id="answer" style="height: 100px;" class="form-control m-input" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6" style="padding: 20px;">
                    <h5>Arabic</h5>
                    <div class="form-group m-form__group">
                        <label class="form-label" for="question_ar" dir="rtl"
                            style="font-size:15px;">السؤال</label>
                        <input type="text" name="question_ar" id="question_ar" class="form-control m-input"
                            value="{{ old('question_ar', $faq->question_ar ?? '') }}" dir="rtl">
                    </div>
                    <div class="form-group m-form__group">
                        <label class="form-label" for="answer_ar" dir="rtl" style="font-size:15px;">الإجابة</label>
                        <textarea name="answer_ar" id="answer_ar" style="height: 100px;" class="form-control m-input" dir="rtl">{{ old('answer_ar', $faq->answer_ar ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="form-group m-form__group row" style="display: flex; justify-content: end; padding-top: 15px;">
                <button type="submit" class="btn btn-brand">{{ isset($faq) ? 'Update FAQ' : 'Add FAQ' }}</button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
</div>
