{include file="head.tpl"}

<body>
    {include file="header.tpl" title='TaskApp'}
    <div class="container w-50">
        <form action="{$home_location}edit/{$task->id}" method="post">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input class="form-control" value="{$task->title}" id="title" name="input_title" aria-describedby="emailHelp">
                <small class="form-text text-muted">Titulo de la Tarea</small>
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input class="form-control" value="{$task->description}" id="description" name="input_description">
                <small class="form-text text-muted">Descripcion de la Tarea</small>
            </div>
            <div class="form-group">
                <label for="priority">Prioridad</label>
                <input type="number" value="{$task->priority}" min="1" max="10" class="form-control" id="priority" name="input_priority">
                <small class="form-text text-muted">Prioridad de la Tarea del 1 al 10</small>
            </div>
            {if $task->completed eq 1}
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="input_completed" name="input_completed">
                    <label class="form-check-label" for="completed">En realidad no estaba completada</label>
                </div>
            {/if}
            <div class="text-center"> <button type="submit" class="btn-lg btn btn-primary">Finalizar</button></div>
        </form>
    </div>
    {include file="bootstrap_js.tpl"}