<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<div class="container">

    {!! Form::open(['action' =>['TourController@store',$tour ? $tour->id : null],
    'file' =>'true',
    'enctype' => 'multipart/form-data']) !!}
    {{csrf_field()}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName4">Name</label>
            <input type="text" class="form-control" id="inputName4" placeholder="Name" name="name"
                   value="@isset($tour->name)  {{$tour->name}} @endisset">
        </div>

        <div class="form-group col-md-6">
            <label for="inputDescription4">Description</label>
            <input type="text" class="form-control" id="inputDescription4" placeholder="Description" name="description"
                   value="@isset($tour->description){{$tour->description}}@endisset">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAge">Age</label>
            <input type="number" class="form-control" id="inputAge" placeholder="Age" name="age"
                   value="@isset($tour->age){{$tour->age}}@endisset">
        </div>
        <div class="form-group col-md-4">
            <label for="inputAvailability">Availability</label>
            <input type="text" class="form-control" id="inputAvailability" placeholder="Availability"
                   name="availability" value="@isset($tour->availability){{$tour->availability}}@endisset">
        </div>
        <div class="form-group col-md-4">
            <label for="inputPrice">price</label>
            <input type="text" class="form-control" id="inputPrice" placeholder="Price" name="price"
                   value="@isset($tour->price){{$tour->price}}@endisset">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputDeparture">departure</label>
            <input type="text" class="form-control" id="inputDeparture" placeholder="Departure" name="departure"
                   value="@isset($tour->departure){{$tour->departure}}@endisset">
        </div>
        <div class="form-group col-md-4">
            <label for="inputDepartureTime">Departure Time</label>
            <input type="text" class="form-control" id="inputDepartureTime" placeholder="Departure_time"
                   name="departure_time" value="@isset($tour->departure_time) {{$tour->departure_time}} @endisset">
        </div>
        <div class="form-group col-md-4">
            <label for="returnTime">Return Time</label>
            <input type="text" class="form-control" id="returnTime" placeholder="Return_Time" name="return_time"
                   value="@isset($tour->return_time) {{$tour->return_time}} @endisset">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="returnIncluded">included</label>
            <input type="text" class="form-control" id="returnIncluded" placeholder="Included" name="included"
                   value="@isset($tour->included) {{$tour->included}} @endisset">
        </div>
        <div class="form-group col-md-4">
            <label for="not_included">not_included</label>
            <input type="text" class="form-control" id="not_included" placeholder="Not included" name="not_included"
                   value="@isset($tour->not_included) {{$tour->not_included}} @endisset">
        </div>
        <div class="form-group col-md-4">
            <label for="sel1">Select Category </label>
            <select class="form-control" id="sel1" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress" class="mt-1">Tour Image</label>
            <input type="file" name="tourImage" value="">
            @isset($tour->img)
                <a target="_blank" href="{{$tour->tourImage()}}"> view image </a>
            @endisset
        </div>
        <div class="form-group col-md-4">
            <label for="not_included">Video Link</label>
            <input type="text" class="form-control" id="not_included" placeholder="Not included" name="video_link"
                   value="@isset($tour->video_link) {{$tour->viseo_link}} @endisset">
        </div>
        <div class="form-group col-md-4">
            <label for="calendar">Calendar</label>
            <input type="text" class="form-control" id="calendar" placeholder="Calendar" name="calendar"
                   value="@isset($tour->calendari_logoyi_taki_text) {{$tour->calendari_logoyi_taki_text}} @endisset">
        </div>
    </div>


    <div class="form-group">
        @if(isset($tour->days[0]))

            @foreach($tour->days as $key => $day)
                <div id="@if($loop->last){{'newlink'}}@endif">
                    <div class="feed" id="{{$loop->index + 1}}-feed">
                        <label for="inputAddress">Day {{$loop->index + 1}} Name</label>
                        <input class="form-control" type="text" name="dayName[]"
                               value="{{$day->name ? $day->name : ''}}" size="50">
                        <label for="inputAddress" class="mt-1">Day {{$loop->index + 1}} Description</label>
                        <input class="form-control mt-1" type="text" name="dayDesc[]"
                               value="{{$day->description ? $day->description : ''}}" size="50">
                        <input class="form-control mt-1" type="hidden" name="dayId[]"
                               value="{{$day->id ? $day->id : ''}}" size="50">
                        <label for="inputAddress" class="mt-1">Day {{$loop->index + 1}} Image</label>
                        <div class="mt-1" id="deleteTourDay" onclick="delete_feed({{$loop->index + 1}})"
                             style="display: inline-block; background-color: #cc0000; color: #fff; padding: 10px; cursor: pointer;">
                            Delete Day {{$loop->index + 1}}</div>
                        <input type="file" name="dayImg[]">
                        @isset($day->img)
                            <a target="_blank" href="{{$day->dayImage()}}"> view image </a>
                        @endisset
                    </div>
                </div>
            @endforeach

        @else
            <div id="newlink">
                <div class="feed">
                    <label for="inputAddress">Day Name</label>
                    <input class="form-control" type="text" name="dayName[]" value="" size="50">
                    <label for="inputAddress" class="mt-1">Day Description</label>
                    <input class="form-control mt-1" type="text" name="dayDesc[]" value="" size="50">
                    <input class="form-control mt-1" type="hidden" name="dayId[]" value="" size="50">
                    <label for="inputAddress" class="mt-1">Day Image</label>
                    <input type="file" name="dayImg[]">
                </div>
            </div>

        @endif

        <p id="addnew">
            <a id="addNewButton" href="javascript:add_feed()" data-index="@if(isset($tour->days)){{count($tour->days)}}@else{{0}}@endif">
                Add New </a>
        </p>
    </div>
    <button type="submit" class="btn btn-primary">@isset($tour) Update @else Create @endisset</button>
    {!! Form::close() !!}
</div>


<style>
    .feed {
        padding: 5px 0
    }
</style>
<!-- Template. This whole data will be added directly to working form above -->
<div id="newlinktpl" style="display:none">
    <div class="feed" id="index-feed">
        <label for="inputAddress" class="mt-1">Day Name</label>
        <input type="text" class="form-control" name="dayName[]" value="" size="50">
        <label for="inputAddress" class="mt-1">Day Description</label>
        <input type="text" class="form-control mt-1" name="dayDesc[]" value="" size="50">
        <input class="form-control mt-1" type="hidden" name="dayId[]" value="" size="50">
        <label for="inputAddress" class="mt-1">Day Image</label>
        <div class="mt-1" id="deleteTourDay"  onclick="delete_feed(index())"
             style="display: inline-block; background-color: #cc0000; color: #fff; padding: 10px; cursor: pointer;">
            Delete Day
        </div>
        <input type="file" name="dayImg[]">
    </div>
</div>

<script type="text/javascript">
    // function validate(frm)
    // {
    //     var ele = frm.elements['dayName[]'];
    //     if (! ele.length)
    //     {
    //         alert(ele.value);
    //     }
    //     for(var i=0; i<ele.length; i++)
    //     {
    //         alert(ele[i].value);
    //     }
    //     return true;
    // }

    function index() {
        var index = document.getElementById('addNewButton').getAttribute("data-index");
        index = parseInt(index) + 1;
        console.log(index);
        document.getElementById('deleteTourDay').innerHTML= 'day ' + index;
        console.log(index);
        return index;
    }

    function add_feed() {
        var index = document.getElementById('addNewButton').getAttribute("data-index");
        index = parseInt(index) + 1;
        document.getElementById('addNewButton').setAttribute("data-index", index);
        var div1 = document.createElement('div');

       div1.innerHTML = document.getElementById('newlinktpl').innerHTML;
        div1.innerHTML = div1.innerHTML.replace("index-feed", index + '-feed');
        div1.innerHTML = div1.innerHTML.replace("delete_feed(index())", "delete_feed("+index +")");
        div1.innerHTML = div1.innerHTML.replace("Delete Day", "Delete Day"+index );
        div1.innerHTML = div1.innerHTML.replace("Day Name", "Day "+index+" Name" );
        div1.innerHTML = div1.innerHTML.replace("Day Description", "Day "+index+" Description" );
        console.log(div1.innerHTML);
        document.getElementById('newlink').appendChild(div1);
    }

    function delete_feed(e = null) {

        if (e != 1) {
            var deleteDiv = document.getElementById(e + '-feed');
            deleteDiv.remove();
        }

    }
</script>