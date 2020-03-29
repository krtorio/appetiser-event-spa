<form @submit="formSubmit">
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="name">Event</label>
            <input type="text" class="form-control" id="event" name="event" value="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="from">From</label>
            <input type="date" class="form-control" id="from" name="from" value="">
        </div>
        <div class="col-sm-6">
            <label for="to">To</label>
            <input type="date" class="form-control" id="to" name="to" value="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            @foreach ( ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $day )
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="{{$day}}">
                <label class="custom-control-label" for="{{$day}}">{{$day}}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" id="btnSave">Save</button>
        </div>
    </div>
</form>