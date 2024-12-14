<td class="text-end">
    <a class="btn btn-sm btn-light btn-active-light-primary btn_gallery_school" id="{{$model->id}}" title="Gallery"
       data-school-name="{{$model->name_en}}">
        <i class="fa fa-file-image text-hover-primary fa-xl"></i>
    </a>

    <a href="{{"/schools/$model->id/transportations"}}"
       class="btn btn-sm btn-light btn-active-light-primary" title="Transportations">
        <i class="fa fa-bus text-hover-primary fa-xl"></i>
    </a>
    <a href="{{"/schools/$model->id/grades"}}"
       class="btn btn-sm btn-light btn-active-light-primary" title="Grades">
        <i class="fa fa-dollar text-hover-primary fa-xl"></i>
    </a>
    <a href="{{"/schools/$model->id/news"}}"
       class="btn btn-sm btn-light btn-active-light-primary" title="News">
        <i class="fa fa-newspaper text-hover-primary fa-xl"></i>
    </a>
</td>
