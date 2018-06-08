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

        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
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