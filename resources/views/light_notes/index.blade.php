<!DOCTYPE html>
<html>
@extends('app')
@section('content')
    <section class="container">
<head>
    <meta charset="utf-8">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ownly To You.</title>

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}


        <title>Ownly</title>

        <style type="text/css">
            body {
                margin-top: 1.0em;
                background-color: #FFFFFF;
                font-family:'Lato';
                color: #000000;
            }
            #container {
                margin: 0 auto;
                width: 1000px;
            }
            h1 { font-size: 3.8em; color: #000000; margin-bottom: 3px; }
            h1 .small { font-size: 0.4em; }
            h1 a { text-decoration: none }
            h2_red { font-size: 1.5em; color: #FF0000; }
            h2_green { font-size: 1.5em; color: #BBFF00; }
            h2_yellow { font-size: 1.5em; color: #FFFF00; }
            h2_black { font-size: 1.5em; color: #000000; }
            h3 { text-align: center; color: #000000; }
            td { text-align: left}

            a { color: #000000; }
            .description { font-size: 1.2em; margin-bottom: 30px; margin-top: 30px; }

            pre { background: #000; color: #000; padding: 15px;}
            hr { border: 0; width: 80%; border-bottom: 1px solid #aaa}
            .footer { text-align:center; padding-top:30px; font-style: italic; }
        </style>
    </head>
    <link type="text/css" href="css/custom-theme/jquery-ui-1.8.7.custom.css" rel="stylesheet">
    <link type="text/css" href="css/js-listbox-style.css" rel="stylesheet">

    <script type="text/javascript" src="jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.8.7.custom.min.js"></script>
    <script type="text/javascript" src="js-inherit.js"></script>
    <script type="text/javascript" src="js-listbox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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

<body id="app-layout">
<nav class="navbar navbar-default">

<div id="container">



    <h1><a href="http://github.com/mpalmerlee/jQuery-UI-Listbox">Ownly</a>
        <span class="small">by <a href="https://www.facebook.com/jane.huang.3348390">JY</a></span></h1>

    <div class="description">
        <a href="{{ url('light_notes/create')  }}" role="btn" class="btn btn-primary pull-right" >新增</a>

    </div>

    <h2_red>Red</h2_red>

    <p>@foreach($rs_level['red'] as $var_red)
        <table class="table table-hover">
            <tr>
                <td width="15%">{{$var_red->hap_time}}</td>
                <td width="20%">{{$var_red->title}}</td>
                <td width="25%">{{$var_red->content}}</td>
                <td width="20%"><a href="{{ url('light_notes/'.$var_red->id.'/edit')  }}" role="btn" class="btn btn-warning">編輯</a></td>
                <td width="20%"><form action="{{ url('light_notes/'.$var_red->id) }}" method="get">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" role="btn" class="btn btn-danger" value="刪除">
                    </form>
                </td>
            </tr>

        </table>
        @endforeach</p>
        <h2_yellow>Yellow</h2_yellow>
        <p>@foreach($rs_level['yellow'] as $var_yellow)
            <table class="table table-hover">
                <tr>
                    <td width="15%">{{$var_yellow->hap_time}}</td>
                    <td width="20%">{{$var_yellow->title}}</td>
                    <td width="25%">{{$var_yellow->content}}</td>
                    <td width="20%"><a href="{{ url('light_notes/'.$var_yellow->id.'/edit')  }}" role="btn" class="btn btn-warning">編輯</a></td>

                    <td width="20%"><form action="{{ url('light_notes/'.$var_yellow->id) }}" method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" role="btn" class="btn btn-danger" value="刪除">
                        </form>
                    </td>
                </tr>
            </table>
            @endforeach</p>
            <h2_green>Green</h2_green>
            <p>@foreach($rs_level['green'] as $var_green)
                <table class="table table-hover">
                    <tr>
                        <td width="15%">{{$var_green->hap_time}}</td>
                        <td width="20%">{{$var_green->title}}</td>
                        <td width="25%">{{$var_green->content}}</td>
                        <td width="20%"><a href="{{ url('light_notes/'.$var_green->id.'/edit')  }}" role="btn" class="btn btn-warning">編輯</a></td>

                        <td width="20%"><form action="{{ url('light_notes/'.$var_green->id) }}" method="get">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                                <input type="submit" role="btn" class="btn btn-danger" value="刪除">
                            </form>
                        </td>
                    </tr>
                </table>
                @endforeach</p>
            <br>
            <br>


            <h2_black>About Us.</h2_black>

            <p><h4>Computer Programming ： Jane Huang. &nbsp;&nbsp;&nbsp;&nbsp; Email:janeahuangts@gmail.com</h4>

                </p>
            <br>
            <p> <h4>Marketing Dept. ： Yuly Chang. &nbsp;&nbsp;&nbsp;&nbsp;  Email:zhoylun219@gmail.com</h4>
            </p>

            <p></p>

            <div class="footer">
               中國文化大學資訊傳播學系 A07組
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

</nav>
</body>
    </section>
@stop</html>