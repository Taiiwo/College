def index(ref):
    page = """
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.amber-deep_purple.min.css" />
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
    .waterfall-demo-header-nav .mdl-navigation__link:last-of-type  {
        padding-right: 0;
    }
    .material-icons{
        line-height: 45px;
    }
    </style>
    <title>Hockley Watch Emporium</title>
</head>
<body>
    <!-- Uses a header that contracts as the page scrolls down. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
      <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <a class="mdl-navigation__link" href="index.html">
              <span class="mdl-layout-title">Hockley Watch Emporium</span>
          </a>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                      mdl-textfield--floating-label mdl-textfield--align-right">
            <label class="mdl-button mdl-js-button mdl-button--icon"
                   for="waterfall-exp">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" name="sample"
                     id="waterfall-exp" />
            </div>
          </div>
        </div>
        <!-- Bottom row, not visible on scroll -->
        <div class="mdl-layout__header-row">
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation -->
          <nav class="waterfall-demo-header-nav mdl-navigation">
              <a class="mdl-navigation__link" href="mens.html">Browse Men's Watches</a>
              <a class="mdl-navigation__link" href="womens.html">Browse Women's Watches</a>
              <a class="mdl-navigation__link" href="order.py">Make an Order</a>
              <a class="mdl-navigation__link" href="contact.html">Contact Us</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">
            <a class="mdl-navigation__link" href="index.html">HWE | Menu</a>
          </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="mens.html">Browse Men's Watches</a>
            <a class="mdl-navigation__link" href="womens.html">Browse Women's Watches</a>
            <a class="mdl-navigation__link" href="order.py">Make an Order</a>
            <a class="mdl-navigation__link" href="contact.html">Contact Us</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">
            <div id="contactWrapper">
                <div class="mdl-card mdl-shadow--2dp demo-card-wide contactForm">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Contact Us</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        Here at HWE, we're happy to hear any likely complaints
                        that you will probably have after using our service.
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="sample1" />
                            <label class="mdl-textfield__label" for="sample1">Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="sample1" />
                            <label class="mdl-textfield__label" for="sample1">Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <textarea class="mdl-textfield__input" type="text" id="sample1"></textarea>
                            <label class="mdl-textfield__label" for="sample1">Message...</label>
                        </div>
                    </div>
                </div>
                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored sendForm">
                    <i class="material-icons">send</i>
                </button>
            </div>
        </div>
      </main>
    </div>
</body>
</html>
"""
    return page
