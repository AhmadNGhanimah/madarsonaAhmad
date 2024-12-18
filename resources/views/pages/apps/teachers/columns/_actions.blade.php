<td class="text-end">
    {{--  <a class="btn btn-sm btn-light btn-active-light-primary btn_gallery_school" id="{{$model->id}}" title="Gallery"
       data-supplier-name="{{$model->name_en}}">
        <i class="fa fa-file-image text-hover-primary fa-xl"></i>
    </a> --}}
    <a href="{{ route('teachers.edit', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary"
        title="Edit">
        <i class="fas fa-edit text-hover-primary fa-xl"></i>
    </a>
    <a class="btn btn-sm btn-light btn-active-light-danger remove_btn" id="{{ $model->id }}" title="Delete">
        <i class="fas fa-trash-alt text-hover-danger fa-xl "></i>
    </a>
    <a href="{{ route('teacher.resume', $model->id) }}" class="btn btn-sm btn-light btn-active-light-primary"
        title="View">
        <i class="fa-solid fa-file text-hover-warning fa-xl"></i>
    </a>
</td>
