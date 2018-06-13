<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<div class="container">

    {!! Form::open(['action' =>['CategoriesController@postCreateCategory'],
    'file' =>'true',
    'enctype' => 'multipart/form-data']) !!}
    {{csrf_field()}}

    <div class="form-group">
        <div id="newlink">
            <div class="feed">
                <label for="inputAddress">Category Name</label>
                <input class="form-control" type="text" name="name" value="" size="50">
                <label for="inputAddress" class="mt-1">Category Image</label>
                <input type="file" name="img">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    {!! Form::close() !!}
</div>


<style>
    .feed {padding: 5px 0}
</style>

