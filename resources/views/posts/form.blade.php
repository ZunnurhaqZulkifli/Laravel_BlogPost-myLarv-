<div class="form-group text-light">
    <label>Title</label>
    <input type="text" name="title" class="form-control text-light"
        value="{{ old('title', $post->title ?? null) }}"/>
</div>
<br>
<div class="form-group text-light">
    <label>Content</label>
    <input type="text" name="content" class="form-control text-light"
        value="{{ old('content', $post->content ?? null) }}"/>
</div>

<div class="form-group text-light mt-4">
    <label>Thumbnail</label>
    <input type="file" name="thumbnail" class="form-control-file"/>
</div>

<br>

@errors

@enderrors 