<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="kitsoft">
    <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.ico">
    <title>Polaris, Venta de Productos</title>
 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/less/bootstrap-submenu.min.css">
 
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" defer></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" defer></script>
  
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-submenu.js" defer></script>
  <script src="<?php echo base_url();?>assets/less/docs.js" defer></script>



</head>
<body>
  <div class="container">
    <div class="jumbotron">
  <h1>Bootstrap-submenu</h1>
  <p class="lead">Bootstrap Sub-Menus.</p>

  <div class="btn-toolbar">
    <a class="btn btn-primary m-b pull-left" href="https://github.com/vsn4ik/bootstrap-submenu/archive/v2.0.4.zip" download>
      <span class="fa fa-cloud-download fa-lg"></span>
      <span>Download</span>
    </a>

    <a id="gh-view-link" class="btn btn-default" href="https://github.com/vsn4ik/bootstrap-submenu" target="_blank">
      <span class="fa fa-github fa-lg"></span>
      <span>View on GitHub</span>
    </a>
  </div>
</div>

    <h2 id="installation">Installation</h2>

<pre><code class="hljs xml">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"&gt;
  &lt;link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"&gt;
  &lt;link rel="stylesheet" href="dist/css/bootstrap-submenu.min.css"&gt;

  &lt;script src="https://code.jquery.com/jquery-3.1.1.min.js" defer&gt;&lt;/script&gt;
  &lt;script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer&gt;&lt;/script&gt;
  &lt;script src="dist/js/bootstrap-submenu.min.js" defer&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
  ...
&lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Enable Bootstrap-submenu via JavaScript:</p>

<pre><code class="hljs javascript">// For v2 [data-toggle="dropdown"] is required for [data-submenu].
// For v2 .dropdown-submenu &gt; [data-toggle="dropdown"] is forbidden.
$('[data-submenu]').submenupicker();</code></pre>

    <hr>
    <h2 id="html-examples">Examples</h2>

<h3>Dropdown</h3>

<h4>With button</h4>
<div class="row">
  <div class="col-sm-4 col-sm-offset-2 m-b">
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-submenu>
        Dropdown <span class="caret"></span>
      </button>

      <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>

    </div>
  </div>

  <div class="col-sm-4 m-b">
    <div class="dropdown pull-right">
      <button class="btn btn-default" type="button" data-toggle="dropdown" data-submenu>
        Dropdown <span class="caret"></span>
      </button>

      <ul class="dropdown-menu dropdown-menu-right">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
    </div>
  </div>
</div>

<h4>With button-group</h4>
<div class="row">
  <div class="col-sm-4 col-sm-offset-2 m-b">
    <div class="btn-group">
      <button class="btn btn-default" type="button">Dropdown</button>
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-submenu>
        <span class="caret"></span>
      </button>

      <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
    </div>
  </div>

  <div class="col-sm-4 m-b">
    <div class="btn-group pull-right">
      <button class="btn btn-default" type="button">Dropdown</button>
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-submenu>
        <span class="caret"></span>
      </button>

      <ul class="dropdown-menu dropdown-menu-right">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
    </div>
  </div>
</div>

<h3>Dropup</h3>

<h4>With button</h4>
<div class="row">
  <div class="col-sm-4 col-sm-offset-2 m-b">
    <div class="dropup">
      <button class="btn btn-default" type="button" data-toggle="dropdown" data-submenu>
        Dropup <span class="caret"></span>
      </button>

      <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
    </div>
  </div>

  <div class="col-sm-4 m-b">
    <div class="dropup pull-right">
      <button class="btn btn-default" type="button" data-toggle="dropdown" data-submenu>
        Dropup <span class="caret"></span>
      </button>

      <ul class="dropdown-menu dropdown-menu-right">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
    </div>
  </div>
</div>

<h4>With button-group</h4>
<div class="row">
  <div class="col-sm-4 col-sm-offset-2 m-b">
    <div class="btn-group dropup">
      <button class="btn btn-default" type="button">Dropup</button>
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-submenu>
        <span class="caret"></span>
      </button>

      <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
    </div>
  </div>

  <div class="col-sm-4 m-b">
    <div class="btn-group dropup pull-right">
      <button class="btn btn-default" type="button">Dropup</button>
      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-submenu>
        <span class="caret"></span>
      </button>

      <ul class="dropdown-menu dropdown-menu-right">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
    </div>
  </div>
</div>

<h3>Navbar</h3>
<nav class="navbar navbar-default">
  <div class="navbar-header">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <a class="navbar-brand">Project Name</a>
  </div>

  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown" data-submenu>
          Dropdown<span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown" data-submenu>
          Dropdown 2<span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown" data-submenu>
          Dropdown 3<span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
      </li>
    </ul>
  </div>
</nav>

<h3>Pills</h3>
<ul class="nav nav-pills">
  <li class="active"><a tabindex="0">Regular link</a></li>
  <li class="dropdown">
    <a tabindex="0" data-toggle="dropdown" data-submenu>
      Dropdown<span class="caret"></span>
    </a>

    <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
  </li>
  <li class="dropdown">
    <a tabindex="0" data-toggle="dropdown" data-submenu>
      Dropdown 2<span class="caret"></span>
    </a>

    <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
  </li>
  <li class="dropdown">
    <a tabindex="0" data-toggle="dropdown" data-submenu>
      Dropdown 3<span class="caret"></span>
    </a>

    <ul class="dropdown-menu">
  <li class="dropdown-submenu">
  <a tabindex="0">Action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another sub action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
    <li><a tabindex="0">Something else here</a></li>
    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
    <li class="dropdown-submenu">
      <a tabindex="0">Another action</a>

      <ul class="dropdown-menu">
        <li><a tabindex="0">Sub action</a></li>
        <li><a tabindex="0">Another sub action</a></li>
        <li><a tabindex="0">Something else here</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="dropdown-header">Dropdown header</li>
<li class="dropdown-submenu">
  <a tabindex="0">Another action</a>

  <ul class="dropdown-menu">
    <li><a tabindex="0">Sub action</a></li>
    <li><a tabindex="0">Another sub action</a></li>
    <li><a tabindex="0">Something else here</a></li>
  </ul>
</li>
<li><a tabindex="0">Something else here</a></li>
<li class="divider"></li>
<li><a tabindex="0">Separated link</a></li>
</ul>
  </li>
</ul>

    <hr>
    
<footer>
  <p class="text-center text-muted">&copy; Vasily A., 2014&ndash;2017</p>
</footer>
  </div>

  <div class="scroll-top-wrapper">
    <button id="scroll-top" class="btn btn-primary btn-sm hidden" type="button">
      <span class="fa fa-caret-up fa-2x"></span>
    </button>
  </div>
</body>
</html>
