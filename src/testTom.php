<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/emojionearea/dist/emojionearea.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojione@4.0.0/extras/css/emojione.min.css" />
</head>

<body>
    <div class="row">
        <textarea id="text"></textarea>
    </div>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <textarea id="example1"></textarea>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#text").emojioneArea({
                pickerPosition: "bottom",
                tonesStyle: "bullet"
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/emojione@4.0.0/lib/js/emojione.min.js"></script>

    <script src="node_modules/emojionearea/dist/emojionearea.js"></script>
</body>

</html>