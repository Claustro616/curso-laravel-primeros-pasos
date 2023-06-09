@csrf
    <label for="">Titulo</label>
    <input type="text" class="form-control" name="title" value="{{old("title",$post->title)}}">
    <label for="">Slug</label>
    <input type="text" class="form-control"  name="slug" value="{{old("slug",$post->slug)}}">

    <label for="">Categoria</label>
    <select name="category_id" class="form-control" >
        <option value=""></option>
        @foreach ($categories as  $title =>$id)
        <option {{old("category_id",$post->category_id)== $id ? "selected" : ""}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>
    <label for="">Posteado</label>
    <select name="posted" class="form-control" >
        <option {{old("posted",$post->posted)== "yes" ? "selected" : ""}}  value="yes">Si</option>
        <option {{old("posted",$post->posted)== "not" ? "selected" : ""}}  value="not">No</option>

    </select>

    <label for="">Contenido</label>
    <textarea name="content" class="form-control" >
        {{old("content",$post->content)}}
    </textarea>

    <label for="">Descripción</label>
    <textarea name="description" class="form-control" >
        {{old("description",$post->description)}}
    </textarea>
    @if (isset($task) && $task == "edit")
    <label for="">Imagen</label>
    <input type="file" name="image">
    @endif

    <button type="submit" class="btn btn-success mt-3">Enviar</button>
