<td class="text-end">
    <a class="btn btn-sm btn-light btn-active-light-primary edit_btn" id="{{ $model->id }}"
        title="@if (request()->routeIs('contacts.*') || request()->routeIs('subscriptions.*')) Show @else Edit @endif ">
        <i class="fas @if (request()->routeIs('contacts.*') || request()->routeIs('subscriptions.*')) fa-eye @else fa-edit @endif text-hover-primary fa-xl"></i>
    </a>
    <a class="btn btn-sm btn-light btn-active-light-danger remove_btn" id="{{ $model->id }}" title="Delete">
        <i class="fas fa-trash-alt text-hover-danger fa-xl "></i>
    </a>
</td>
