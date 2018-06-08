<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<div class="container">
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName4">Name</label>
                <input type="text" class="form-control" id="inputName4" placeholder="Name">
            </div>

            <div class="form-group col-md-6">
                <label for="inputDescription4">Description</label>
                <input type="text" class="form-control" id="inputDescription4" placeholder="Description">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAge">Age</label>
                <input type="number" class="form-control" id="inputAge" placeholder="Age">
            </div>
            <div class="form-group col-md-4">
                <label for="inputAvailability">Availability</label>
                <input type="number" class="form-control" id="inputAvailability" placeholder="Availability">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPrice">price</label>
                <input type="number" class="form-control" id="inputPrice" placeholder="Price">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputDeparture">departure</label>
                <input type="text" class="form-control" id="inputDeparture" placeholder="departure">
            </div>
            <div class="form-group col-md-4">
                <label for="inputDepartureTime">Departure Time</label>
                <input type="text" class="form-control" id="inputDepartureTime" placeholder="departure time">
            </div>
            <div class="form-group col-md-4">
                <label for="returnTime">Return Time</label>
                <input type="text" class="form-control" id="returnTime" placeholder="Return Time">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="returnIncluded">included</label>
                <input type="text" class="form-control" id="returnIncluded" placeholder="included">
            </div>
            <div class="form-group col-md-6">
                <label for="not_included">not_included</label>
                <input type="text" class="form-control" id="not_included" placeholder="Not included">
            </div>
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
    function validate(frm)
    {
        var ele = frm.elements['dayName[]'];
        if (! ele.length)
        {
            alert(ele.value);
        }
        for(var i=0; i<ele.length; i++)
        {
            alert(ele[i].value);
        }
        return true;
    }
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