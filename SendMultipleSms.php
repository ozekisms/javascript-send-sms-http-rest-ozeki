<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Allow-Headers: Authorization, Accept, Content-Type");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Send Multiple SMS with Ozeki SMS Gateway</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="SendMultipleSms.css">
    </head>
    <body style="height: 100vh; width: 100vw; padding: 0; margin: 0;">

        <div class="form-group form-container">
            <b>ToAddress:</b>
            <input class="form-control" type="text" id="ToAddress" placeholder="+36201111111">
            <b>Text:</b>
            <input class="form-control" type="text" id="Text" placeholder="Hello world!">
            <button class="btn btn-primary" id="btnAdd">
                <b>ADD</b>
            </button>
            <div class="card messages-container">
                <ul class="list-group log" id="message_container">
                    <li class="list-group-item"><b>Messages:</b></li>
                </ul> 
            </div>
            <button class="btn btn-primary" id="btnSend">
                    <b>SEND</b>
            </button>
        </div>

        <div class="card log-container">
            <ul class="list-group log" id="container">
                <li class="list-group-item"><b>Logs:</b></li>
            </ul> 
        </div>

        <script type="module">
            import { Configuration, Message, MessageApi } from "./Ozeki.Libs.Rest.js";

            var messages = new Array();

            var btnSend = document.getElementById("btnSend");
            var btnAdd = document.getElementById("btnAdd");
                        
            var configuration = new Configuration();
            configuration.Username = 'http_user';
            configuration.Password = 'qwe123';
            configuration.ApiUrl = 'http://127.0.0.1:9509/api';

            var api = new MessageApi(configuration);

            btnAdd.addEventListener("click", function() {
                if (document.getElementById("ToAddress").value != '' && document.getElementById("Text").value != '') {

                    var msg = new Message();
                    msg.ToAddress = document.getElementById("ToAddress").value;
                    msg.Text = document.getElementById("Text").value;

                    document.getElementById("ToAddress").value = '';
                    document.getElementById("Text").value = '';

                    messages.push(msg);
                    
                    document.getElementById('message_container').innerHTML += `<li class="list-group-item">${msg}</li>`;
                } 
            });

            btnSend.addEventListener("click", async function() {
                let result = await api.Send(messages);

                messages = new Array();

                document.getElementById('message_container').innerHTML = `<li class="list-group-item"><b>Messages:</b></li>`;
                
                document.getElementById('container').innerHTML += `<li class="list-group-item">${result}</li>`;
            });
        </script>
    </body>
</html>