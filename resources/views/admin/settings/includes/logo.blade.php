<div class="tile">
    <h3 class="tile-title">شعار المتجر</h3>
    <hr>
    <div class="tile-body">

        <div class="row">
            <div class="col-6">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-left">شعار الموقع</label>
                    <div class="col-lg-9 col-xl-9">
                        <div class="image-input image-input-outline" id="kt_image_1">
                            <div class="image-input-wrapper"
                                 style="background-image: url({{asset('uploads/settings/'.@$page['site_logo'])??asset('assets/media/users/blank.png')}})"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="تغيير الشعار">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="site_logo" accept=".png, .jpg, .jpeg"/>
                                <input type="hidden" name="حذف الشعار"/>
                            </label>

                            <span
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                        </div>
                        <div class="fv-plugins-message-container">
                            @error('site_logo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-left">ايقونة الموقع</label>
                    <div class="col-lg-9 col-xl-9">
                        <div class="image-input image-input-outline" id="kt_image_2">
                            <div class="image-input-wrapper"
                                 style="background-image: url({{asset('uploads/settings/'.@$page['site_favicon'])??asset('assets/media/users/blank.png')}})"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="تغيير الايقونة">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="site_favicon" accept=".png, .jpg, .jpeg"/>
                                <input type="hidden" name="حذف الايقونة"/>
                            </label>

                            <span
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                        </div>
                        <div class="fv-plugins-message-container">
                            @error('site_favicon')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

    <script>
        var avatar1 = new KTImageInput('kt_image_1');
        var avatar2 = new KTImageInput('kt_image_2');
    </script>

@endsection
