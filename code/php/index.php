<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practise</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script language="javascript">
        $.ajax({
            url : '../php/ajax_index.php',
            type : 'post',
            data: {
                getCookie: 1
            },
            dataType : 'json',
            success : function (result){
                $('#txtInputArray').val(result[0]);
                $('#arrOption').val(result[1]);
            }
        });

        function findNumber()
        {
            $.ajax({
                url : '../php/ajax_index.php',
                type : 'post',
                data: {
                    txtInputArray: $('#txtInputArray').val(),
                    arrOption: $('#arrOption').val()
                },
                dataType : 'text',
                success : function (result){
                    $('#resResult').html(result);
                }
            });
        }

        function drawRectangleStar()
        {
            $.ajax({
                url : '../php/ajax_index.php',
                type : 'post',
                data: {
                    txtHeight: $('#txtHeight').val(),
                    txtWidth: $('#txtWidth').val()
                },
                dataType : 'text',
                success : function (result){
                    $('#resResult2').html(result);
                }
            });
        }
    </script>
</head>
<body>
<header>
    <h2>This is my homework</h2>
</header>

<article>
    <form id="frmSubmit">
        <h1>Find number + Cookie</h1>

        <div><label for="txtInputArray" class="col-2 col-s-12">Array (seperated with comma):</label>
            <input type="text" class="col-5 col-s-12" id="txtInputArray" name="txtInputArray" value=""><br/>
        </div><br/>

        <div><label for="arrOption" class="col-2 col-s-12">Options:</label>
            <select class="col-5 col-s-12" id="arrOption" name="arrOption">
                <option value="1">Max value</option>
                <option value="2">Min value</option>
                <option value="3">Positive number</option>
                <option value="4">Negative number</option>
            </select><br/>
        </div><br/>

        <input type="button" id="btnSubmit" class="submit-button" value="Submit" onclick="findNumber()"><br/>
        <p id="resResult" class="resMessage"></p>
    </form>

    <hr>

    <form id="frmSubmit2">
        <h1>Rectangle star</h1>

        <div><label for="txtHeight" class="col-2 col-s-12">Height:</label>
            <input type="text" class="col-5 col-s-12" id="txtHeight" name="txtHeight" value=""><br/>
        </div><br/>

        <div><label for="txtWidth" class="col-2 col-s-12">Width:</label>
            <input type="text" class="col-5 col-s-12" id="txtWidth" name="txtWidth" value=""><br/>
        </div><br/>

        <input type="button" id="btnSubmit2" class="submit-button" value="Submit" onclick="drawRectangleStar()"><br/>
        <pre id="resResult2" class="resMessage"></pre>
    </form>
</article>

<footer>
</footer>

</body>
</html>