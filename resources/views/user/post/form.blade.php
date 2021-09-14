@if($post->image)
    <img src="{{asset('storage/'.$post->image)}}" alt="icon" width="500px"
         height="500px"/>
@endif


<div class="form-group">
    <label for="name">Post Name</label>

    <input name="name"
           type="text" class="form-control" id="name"
           value="{{old('name',$post->name)}}"
           placeholder="Enter Post Name... ">

</div>


<div class="form-group">
    <label for="description">Descriptions</label>
    <textarea name="description"
              class="form-control" id="description"
              placeholder="Enter Description"
              rows="5" cols="3">

        {{old('description',$post->description)}}


    </textarea>

</div>

<div class="form-group">
    <label for="image">Image</label>
    <input name="image"
           type="file" class="form-control" id="image" placeholder="Upload Image">
</div>
