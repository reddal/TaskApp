{include file="head.tpl"}

<body>
    {include file="header.tpl" title='TaskApp'}
    <div class="text-center card mx-auto alert-warning " style="width: 18rem;">
    <h1> Oh no :c</h1>
    <p> seems like something went wrong</p>
    <p>{$error}</p>
    <a href="{$home_location}home" class="btn btn-primary btn-block">Go back</a>
    </div>