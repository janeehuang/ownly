<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">

    <title>Ownly</title>

    <style type="text/css">
        body {
            margin-top: 1.0em;
            background-color: #FFFFFF;
            font-family: Helvetica, Arial, FreeSans, san-serif;
            color: #000000;
        }
        #container {
            margin: 0 auto;
            width: 700px;
        }
        h1 { font-size: 3.8em; color: #000000; margin-bottom: 3px; }
        h1 .small { font-size: 0.4em; }
        h1 a { text-decoration: none }
        h2_red { font-size: 1.5em; color: #FF0000; }
        h2_green { font-size: 1.5em; color: #BBFF00; }
        h2_yellow { font-size: 1.5em; color: #FFFF00; }
        h2_black { font-size: 1.5em; color: #000000; }
        h3 { text-align: center; color: #000000; }
        a { color: #000000; }
        .description { font-size: 1.2em; margin-bottom: 30px; margin-top: 30px; font-style: italic;}

        pre { background: #000; color: #000; padding: 15px;}
        hr { border: 0; width: 80%; border-bottom: 1px solid #aaa}
        .footer { text-align:center; padding-top:30px; font-style: italic; }
    </style>
    <link type="text/css" href="css/custom-theme/jquery-ui-1.8.7.custom.css" rel="stylesheet">
    <link type="text/css" href="css/js-listbox-style.css" rel="stylesheet">

    <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.8.7.custom.min.js"></script>
    <script type="text/javascript" src="js-inherit.js"></script>
    <script type="text/javascript" src="js-listbox.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            window.listBoxAllItems = new JSListBox({'containerSelector':'ListBoxAllItems'});
            window.listBoxSelectedItems = new JSListBox({'containerSelector':'ListBoxSelectedItems'});

            var allItems = [];
            allItems.push(new MyListBoxItem("C/C++"));
            allItems.push(new MyListBoxItem("Java"));
            allItems.push(new MyListBoxItem("JavaScript"));
            allItems.push(new MyListBoxItem("C#"));
            allItems.push(new MyListBoxItem("Python"));
            allItems.push(new MyListBoxItem("Ruby"));

            window.listBoxAllItems.addItems(allItems);
        });

        MyListBoxItem = JSListBox.Item.extend({

            text: "",

            init: function(text) {
                this.text = text;
            },

            render: function() {
                return '<a href="#">' + this.text + '</a>';
            },

            onClick: function() {
                var item = new JSListBox.Item();
                item.value = this.text + " item clicked.";
                window.listBoxSelectedItems.addItem(item);
            },

            onDblClick: function() {
                var item = new JSListBox.Item();
                item.value = this.text + " item double clicked.";
                item.enabled = false;
                window.listBoxSelectedItems.addItem(item);
            }

        });
    </script>
</head>

<body>
<a href="http://github.com/mpalmerlee/jQuery-UI-Listbox"><img style="position: absolute; top: 0; right: 0; border: 0;" src="http://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>

<div id="container">



    <h1><a href="http://github.com/mpalmerlee/jQuery-UI-Listbox">Ownly</a>
        <span class="small">by <a href="http://github.com/mpalmerlee">BI</a></span></h1>

    <div class="description">
        jQuery UI Plugin which leverages the jquery ui menu control, styled with your existing jquery ui theme, features hover highlighting, click and double click.  This plugin will not be officially released until jQuery UI version 1.9 is released (which includes the menu as an officially supported widget).
    </div>

    <h2_red>Red</h2_red>
    <p>Leverages jQuery javascript DOM library and jQuery UI

        uses John Resig's Simple JS Inheritance lib:
        http://ejohn.org/blog/simple-javascript-inheritance/</p>
    <h2_yellow>Yellow</h2_yellow>
    <p>js-listbox.js
        Written by Matt Palmerlee
        Mastered Software
        http://www.masteredsoftware.com/</p>
    <h2_green>Green</h2_green>
    <p>Written by Matt Palmerlee
        <br>Mastered Software
        <br>http://www.masteredsoftware.com/
        <br>
        <br>      </p>


    <h2_black>About Us.</h2_black>
    <p>
        You can download this project in either
        <a href="http://github.com/mpalmerlee/jQuery-UI-Listbox/zipball/master">zip</a> or
        <a href="http://github.com/mpalmerlee/jQuery-UI-Listbox/tarball/master">tar</a> formats.
    </p>
    <p>You can also clone the project with <a href="http://git-scm.com">Git</a>
        by running:
    </p>
    <p></p>

    <div class="footer">
        get the source code on GitHub : <a href="http://github.com/mpalmerlee/jQuery-UI-Listbox">mpalmerlee/jQuery-UI-Listbox</a>
    </div>




</div>

<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
<script type="text/javascript">
    try {
        var pageTracker = _gat._getTracker("UA-7797548-4");
        pageTracker._trackPageview();
    } catch(err) {}</script>


</body></html>