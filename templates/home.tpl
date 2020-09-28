{include file="head.tpl"}

<body>
    {include file="header.tpl" title='TaskApp'}

    <div class="container w-50 mb-3">

        <ul class="list-group">

            {foreach from=$tasks item=task}
                {if $task->completed eq 1}
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                        {$task->title} <span> <button type="button" class="btn btn-outline-info"> <a href="detail/{$task->id}">Description</a> </button> <button type="button" class="btn btn-outline-danger"> <a href="delete/{$task->id}">Borrar</a> </button> <button type="button" class="btn btn-outline-secondary"> <a href="editModo/{$task->id}">Editar</a> </button> </span> </li>
                {else}
                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                        {$task->title} <span> <button type="button" class="btn btn-outline-info"> <a href="detail/{$task->id}">Description</a> </button> <button type="button" class="btn btn-outline-danger"> <a href="delete/{$task->id}">Borrar</a> </button> <button type="button" class="btn btn-outline-success"> <a href="completar/{$task->id}">Completar</a> </button> <button type="button" class="btn btn-outline-secondary"> <a href="editModo/{$task->id}">Editar</a> </button> </span> </li>
                {/if}
            {/foreach}


        </ul>
    </div>

    <div class="container w-50">
        <form action="insert" method="post">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input class="form-control" id="title" name="input_title" aria-describedby="emailHelp">
                <small class="form-text text-muted">Titulo de la Tarea</small>
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input class="form-control" id="description" name="input_description">
                <small class="form-text text-muted">Descripcion de la Tarea</small>
            </div>
            <div class="form-group">
                <label for="priority">Prioridad</label>
                <input type="number" min="1" max="10" class="form-control" id="priority" name="input_priority">
                <small class="form-text text-muted">Prioridad de la Tarea del 1 al 10</small>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="input_completed" name="input_completed">
                <label class="form-check-label" for="completed">Completada</label>
            </div>
            <div class="text-center"> <button type="submit" class="btn-lg btn btn-primary">Agregar</button></div>
        </form>
    </div>
    {include file="bootstrap_js.tpl"}