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
        <title>Send SMS with Ozeki SMS Gateway</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="SendSms.css">
    </head>
    <body>

        <div class="form-group form-container">
            <b>ToAddress:</b>
            <input class="form-control" type="text" id="ToAddress" placeholder="+36201111111">
            <b>Text:</b>
            <input class="form-control" type="text" id="Text" placeholder="Hello world!">
            <button class="btn btn-primary" id="btnSend">
                <b>SEND</b>
            </button>
        </div>

        <div class="log-container">
            <ul class="card log" id="log-container">
                <li class="list-group-item"><b>Logs:</b></li>
            </ul> 
        </div>

        <script type="module">
            import { Configuration, Message, MessageApi } from "./Ozeki.Libs.Rest.js";

            var btnSend = document.getElementById("btnSend");
                        
            var configuration = new Configuration();
            configuration.Username = 'http_user';
            configuration.Password = 'qwe123';
            configuration.ApiUrl = 'http://127.0.0.1:9509/api';

            var api = new MessageApi(configuration);

            btnSend.addEventListener("click", async function() {
                var msg = new Message();
                msg.ToAddress = document.getElementById("ToAddress").value;
                msg.Text = document.getElementById("Text").value;

                let result = await api.Send(msg);

                document.getElementById('log-container').innerHTML += `<li class="list-group-item">${result}</li>`;
            });
        </script>
    </body>
</html>