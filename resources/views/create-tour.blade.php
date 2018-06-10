<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<div class="container">
    <form action="{{ route('tourStore') }}" method="post">
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName4">Name</label>
                <input type="text" class="form-control" id="inputName4" placeholder="Name" name="name">
            </div>

            <div class="form-group col-md-6">
                <label for="inputDescription4">Description</label>
                <input type="text" class="form-control" id="inputDescription4" placeholder="Description" name="description">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAge">Age</label>
                <input type="number" class="form-control" id="inputAge" placeholder="Age" name="age">
            </div>
            <div class="form-group col-md-4">
                <label for="inputAvailability">Availability</label>
                <input type="text" class="form-control" id="inputAvailability" placeholder="Availability" name="availability">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPrice">price</label>
                <input type="text" class="form-control" id="inputPrice" placeholder="Price" name="price">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputDeparture">departure</label>
                <input type="text" class="form-control" id="inputDeparture" placeholder="Departure" name="departure">
            </div>
            <div class="form-group col-md-4">
                <label for="inputDepartureTime">Departure Time</label>
                <input type="text" class="form-control" id="inputDepartureTime" placeholder="Departure_time" name="departure_time">
            </div>
            <div class="form-group col-md-4">
                <label for="returnTime">Return Time</label>
                <input type="text" class="form-control" id="returnTime" placeholder="Return_Time" name="return_time">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="returnIncluded">included</label>
                <input type="text" class="form-control" id="returnIncluded" placeholder="Included" name="included">
            </div>
            <div class="form-group col-md-6">
                <label for="not_included">not_included</label>
                <input type="text" class="form-control" id="not_included" placeholder="Not included" name="not_included">
            </div>
        </div>

        <div class="form-group">
            <div id="newlink">
                <div class="feed">
                    <label for="inputAddress">Day Name</label>
                    <input class="form-control" type="text" name="dayName[]" value="" size="50">
                    <label for="inputAddress" class="mt-1">Day Description</label>
                    <input class="form-control mt-1" type="text" name="dayDesc[]" value="" size="50">
                </div>
            </div>
            <p id="addnew">
                <a href="javascript:add_feed()">Add New </a>
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>


<style>
    .feed {padding: 5px 0}
</style>
<!-- Template. This whole data will be added directly to working form above -->
<div id="newlinktpl" style="display:none">
    <div class="feed">
        <label for="inputAddress" class="mt-1">Day Name</label>
        <input type="text" class="form-control" name="dayName[]" value=""  size="50">
        <label for="inputAddress" class="mt-1">Day Description</label>
        <input type="text" class="form-control mt-1" name="dayDesc[]" value=""  size="50">
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
    function add_feed()
    {
        var div1 = document.createElement('div');
        // Get template data
        div1.innerHTML = document.getElementById('newlinktpl').innerHTML;
        // append to our form, so that template data
        //become part of form
        document.getElementById('newlink').appendChild(div1);
    }
</script>