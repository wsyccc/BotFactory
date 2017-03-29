<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
        <link rel="icon" href="/pix/icons/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
        <script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/home">BotFactory</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/home">Homepage</a></li>
            <li><a href="/parts">Parts</a></li>
            <li><a href="/assembly">Assembly</a></li>
            <li><a href="/history">History</a></li>
            <li><a href="/about">About</a></li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="/roles/actor/Guest">Guest</a></li>
                    <li><a href="/roles/actor/Worker">Worker</a></li>
                    <li><a href="/roles/actor/Supervisor">Supervisor</a></li>
                    <li><a href="/roles/actor/Boss">Boss</a></li>
              </ul>
            </li>

          </ul>
          
        </div>
      </div>
    </nav>
        <div id="container">
            {content}
            <p class="footer"><strong>BotFactory brought to you by Team Apple.</strong></p>
        </div>

    </body>
</html>