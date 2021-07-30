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
        <title>Receive SMS with Ozeki SMS Gateway</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="ReceiveSms.css">
    </head>
    <body>

        <div class="form-container">
            <button class="btn btn-primary" id="btnDownloadIncoming">
                <b>DownloadIncoming</b>
            </button>
        </div>

        <div class="card log-container">
            <ul class="log" id="container">
                <li class="list-group-item"><b>Logs:</b></li>
            </ul> 
        </div>

        <script type="module">
            import { Configuration, MessageApi } from "./Ozeki.Libs.Rest.js";

            var btnDownloadIncoming = document.getElementById("btnDownloadIncoming");

            var configuration = new Configuration();
            configuration.Username = 'http_user';
            configuration.Password = 'qwe123';
            configuration.ApiUrl = 'http://192.168.0.14:9509/api';

            var api = new MessageApi(configuration);

            btnDownloadIncoming.addEventListener("click", async function() {
                
                let result = await api.DownloadIncoming();

                document.getElementById('container').innerHTML += `<li class="list-group-item">${result}</li>`;
                
                for (let i = 0; i < result.MessageCount; i++)
                {
                    document.getElementById('container').innerHTML += `<li class="list-group-item">${result.Messages[i]}</li>`;
                }
            });
            
        </script>
    </body>
</html>