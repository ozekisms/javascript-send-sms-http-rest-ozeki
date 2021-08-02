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
        <title>Delete SMS with Ozeki SMS Gateway</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="DeleteSms.css">
    </head>
    <body>

        <div class="form-container">
            <b>ID:</b>
            <input class="form-control" type="text" id="ID" placeholder="fcfaf789-1bb9-bad2-9486-f68be5e1d065">
            <b>Folder:</b>
            <select class="form-select" id="folder">
                <option value="inbox">Inbox</option>
                <option value="outbox">Outbox</option>
                <option value="sent">Sent</option>
                <option value="notsent">NotSent</option>
                <option value="deleted">Deleted</option>
            </select>
            <button class="btn btn-primary" id="btnDelete">
                <b>DELETE</b>
            </button>
        </div>

        <div class="card log-container">
            <ul class="log" id="container">
                <li class="list-group-item"><b>Logs:</b></li>
            </ul> 
        </div>

        <script type="module">
            import { Configuration, Message, MessageApi, Folder } from "./Ozeki.Libs.Rest.js";

            var btnDelete = document.getElementById("btnDelete");
                        
            var configuration = new Configuration();
            configuration.Username = 'http_user';
            configuration.Password = 'qwe123';
            configuration.ApiUrl = 'http://127.0.0.1:9509/api';

            var api = new MessageApi(configuration);

            btnDelete.addEventListener("click", async function() {
                if (document.getElementById("ID").value != '') {
                    var msg = new Message();
                    msg.ID = document.getElementById("ID").value;
                    
                    var folder;

                    var folderName = document.getElementById('folder').value;

                    if (folderName == 'inbox') {
                        folder = Folder.Inbox;
                    } else if (folderName == 'outbox') {
                        folder = Folder.Outbox;
                    } else if (folderName == 'sent') {
                        folder = Folder.Sent;
                    } else if (folderName == 'notsent') {
                        folder = Folder.NotSent;
                    } else {
                        folder = Folder.Deleted;
                    }

                    let result = await api.Delete(folder, msg);

                    document.getElementById('ID').value = '';
                    document.getElementById('folder').value = 'inbox';

                    document.getElementById('container').innerHTML += `<li class="list-group-item">${result}</li>`;
                }
            });
        </script>
    </body>
</html>