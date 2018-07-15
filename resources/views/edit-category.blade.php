<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<div class="container">

    {!! Form::open(['action' =>['CategoriesController@postEditCategory',$category->id],
    'file' =>'true',
    'enctype' => 'multipart/form-data']) !!}
    {{csrf_field()}}

    <div class="form-group">
        <div id="newlink">
            <div class="feed">
                <label for="inputAddress">Category Name</label>
                <input class="form-control" type="text" name="name" value="{{$category->name}}" size="50">
                <label for="inputAddress" class="mt-1">Category Image</label>
                <input type="file" name="img">
                @if($category->img)
                    <a target="_blank" href="{{$category->categoryImg()}}"> view image </a>
                @endif
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    {!! Form::close() !!}
</div>


<style>
    .feed {padding: 5px 0}
</style>

