<div class="tile">
    <h3 class="tile-title">روابط مواقع التواصل الاجتماعي</h3>
    <hr>
    <div class="tile-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label" for="social_facebook">رابط حساب فيسبوك</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="ادخل رابط حساب فيسبوك"
                        id="social_facebook"
                        name="social_facebook"
                        value="{{ old('social_facebook',@$page['social_facebook']) }}"
                        {{--                    old(config('settings.social_facebook'),'social_facebook')--}}
                    />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label" for="social_twitter">رابط حساب تويتر</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="ادخل رابط حساب تويتر"
                        id="social_twitter"
                        name="social_twitter"
                        value="{{ old('social_twitter',@$page['social_twitter']) }}"
                    />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label" for="social_instagram">رابط حساب انستقرام</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="ادخل رابط حساب انستقرام"
                        id="social_instagram"
                        name="social_instagram"
                        value="{{ old('social_instagram',@$page['social_instagram']) }}"
                    />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label" for="social_youtube">رابط حساب يوتيوب</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="ادخل رابط حساب يوتيوب"
                        id="social_youtube"
                        name="social_youtube"
                        value="{{ old('social_youtube',@$page['social_youtube'])}}"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
