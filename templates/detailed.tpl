{include file="head.tpl" }

<body>
    {include file="header.tpl" title='TaskApp'}

    <div class="text-center card mx-auto " style="width: 18rem;">
        <h1 class="text-center card-header">{$task->title}</h1>
        {if $task->completed eq 1}
            <div class="card-body list-group-item-success">
    
            {else}
                <div class="card-body ">
                {/if}
                <h5 class="card-title">Description</h5>
                <p class="card-text">{$task->description}</p>
                <h5 class="card-title">Priority</h5>
                <p>{$task->priority}</p>
                <a href="{$home_location}home" class="btn btn-primary btn-block">Go back</a>
            </div>
        </div>

        {include file="bootstrap_js.tpl" }