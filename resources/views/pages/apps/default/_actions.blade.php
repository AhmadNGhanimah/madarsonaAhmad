<td class="text-end">
    <a class="btn btn-sm btn-light btn-active-light-primary edit_btn" id="{{ $model->id }}"
        title="@if (request()->routeIs('contacts.*') || request()->routeIs('subscriptions.*')) Show @else Edit @endif ">
        <i class="fas @if (request()->routeIs('contacts.*') || request()->routeIs('subscriptions.*')) fa-eye @else fa-edit @endif text-hover-primary fa-xl"></i>
    </a>
    <a class="btn btn-sm btn-light btn-active-light-danger remove_btn" id="{{ $model->id }}" title="Delete">
        <i class="fas fa-trash-alt text-hover-danger fa-xl "></i>
    </a>
    @if (request()->routeIs('vacancies.*'))
        <div class="dropdown">
            <button class="btn btn-sm btn-light  text-hover-warning fa-xl dropdown-toggle" type="button"
                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-cog"></i>
                Matching Resume
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li>
                    <a class="dropdown-item " id="{{ $model->id }}" href="#" title="Show">
                        asdasd
                    </a>
                </li>

            </ul>
        </div>
    @endif

</td>
