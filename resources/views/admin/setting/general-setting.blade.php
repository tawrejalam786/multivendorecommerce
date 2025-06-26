<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.general-setting-update')}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Site Name</label>
                            <input type="text" class="form-control" name="site_name" value="{{@$generalSetting->site_name}}" placeholder="Enter Site Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Layout</label>
                            <select name="layout" id="" class="form-control">
                                <option value="">Select Layout</option>
                                <option {{@$generalSetting->layout == 'LTR' ? 'selected' : ''}} value="LTR">LTR</option>
                                <option {{@$generalSetting->layout == 'RTL' ? 'selected' : ''}} value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contact Email</label>
                            <input type="text" class="form-control" name="contact_email" value="{{@$generalSetting->contact_email}}" placeholder="Enter Contact Email">
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Default Currency Name</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select Currency Name</option>
                                @foreach (config('settings.currency_list') as $currency)  
                                <option {{@$generalSetting->currency_name == $currency ? 'selected' : ''}} value="{{$currency}}">{{$currency}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Currency Icon</label>
                            <input type="text" class="form-control" name="currency_icon" value="{{@$generalSetting->currency_icon}}" placeholder="Enter Currency Name">
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Timezone</label>
                            <select name="time_zone" id="" class="form-control select2">
                                <option value="">Select Timezone</option>
                                @foreach (config('settings.time_zone') as $key => $timezone)
                                <option {{@$generalSetting->time_zone == $key ? 'selected' : ''}} value="{{$key}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary px-5">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>