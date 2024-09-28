<div class="row">
    <div class="col-12">
        <label>{{trans('admin.settings.timezone')}} </label>
        <select id="timezone" name="timezone" class="form-control select2">
            @foreach(getAllTimeZones() as $time)
                <option
                    {{isset($timezone->value) && $timezone->value==$time['zone']?'selected':''}} value="{{$time['zone']}}">
                    ({{$time['GMT_difference']. ' ) '.$time['zone']}}</option>
            @endforeach
        </select>
    </div>
</div>
