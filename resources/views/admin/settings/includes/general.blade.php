<div class="tile">
    <h3 class="tile-title">الاعدادات العامة</h3>
    <hr>
    <div class="tile-body">
        <div class="form-group">
            <label class="control-label" for="site_name">اسم الموقع</label>
            <input
                class="form-control"
                type="text"
                placeholder="ادخل اسم المتجر"
                id="site_name"
                name="site_name"
                value="{{ old('site_name',@$page['site_name'])}}"
            />
        </div>

        <div class="form-group">
            <label class="control-label" for="default_email_address">عنوان البريد الالكتروني</label>
            <input
                class="form-control"
                type="email"
                placeholder="اخل عنوان البريد الالكتروني"
                id="default_email_address"
                name="default_email_address"
                value="{{ old('default_email_address',@$page['default_email_address'])}}"
            />
        </div>
    </div>
</div>
