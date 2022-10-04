<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="180">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <link href="fonts/segoeuii.ttf" rel="stylesheet">
    <script src="js/javascript.js"></script>


<!--SEARCH field highliter script code START-->
    <style>
        .highlight{
            color:blue;
            font-weight: 1000;
        }
        .modal_search{
            width: 100%;
            border-color: antiquewhite;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script>
    $(function() {
        $(".modal_search").each(function() {
            var textModal = $('#textModal_' + this.id),
                html = textModal.html();
            $(this).on("keyup", function() {
                var reg = new RegExp($(this).val() || "&fakeEntity;", 'gi');
                textModal.html(html.replace(reg, function(str, index) {
                    var t = html.slice(0, index+1),
                        lastLt = t.lastIndexOf("<"),
                        lastGt = t.lastIndexOf(">"),
                        lastAmp = t.lastIndexOf("&"),
                        lastSemi = t.lastIndexOf(";");
                    //console.log(index, t, lastLt, lastGt, lastAmp, lastSemi);
                    if(lastLt > lastGt) return str; // inside a tag
                    if(lastAmp > lastSemi) return str; // inside an entity
                    return "<span class='highlight'>" + str + "</span>";
                }));
            });
        })

    })
    </script>
<!--SEARCH field highliter script code END-->

    <title>Spaustuvės užsakymų sistema emsis v 1.4</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
