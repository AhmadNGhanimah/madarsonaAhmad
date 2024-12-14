
<td class="text-end">
    <a href="{{route('schools.edit',$model->id)}}" class="btn btn-sm btn-light btn-active-light-primary" title="Edit" >
        <i class="fas fa-edit text-hover-primary fa-xl"></i>
    </a>
    <a class="btn btn-sm btn-light btn-active-light-danger remove_btn" id="{{$model->id}}" title="Delete">
        <i class="fas fa-trash-alt text-hover-danger fa-xl "></i>
    </a>
</td>
