<!--begin:: Avatar -->
<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    <a href="#">
        @if($model->logo_image)
            <div class="symbol-label">
                <img src="{{ $model->logo_image }}" class="w-100"/>
            </div>
        @else
            <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $model->name_en) }}">
                {{ substr($model->name_en, 0, 1) }}
            </div>
        @endif
    </a>
</div>
<!--end::Avatar-->
<!--begin::User details-->
<div class="d-flex flex-column">
    <span href="" class="text-gray-800 text-hover-primary mb-1 fw-bold">
        {{ $model->name_ar }}
    </span>
    <span>{{ $model->supplierType->title_ar }}</span>
</div>
<!--begin::User details-->
