# javascript-send-sms-http-rest-ozeki


### How to use the Ozeki.Libs.Rest library

In order to use the __Ozeki.Libs.Rest library__ in your own project, you need to place the __Ozeki.Libs.Rest.js__ file in your project.
After you've placed this file _(what you can download from this github repository, together with 5 example projects)_, you can import its components with this line:

```javascript
import { Configuration, Message, MessageApi } from 'Ozeki.Libs.Rest.js';
```
When you imported these three components, you are ready to use the __Ozeki.Libs.Rest library__, to send, mark, delete and receive SMS messages.

#### Creating a Configuration

To send your SMS message to the built in API of the __Ozeki SMS Gateway__, your client application needs to know the details of your __Gateway__ and the __http_user__.
We can define a __Configuration__ instance with these lines of codes in JavaScript.

```javascript
var configuration = new Configuration();
configuration.Username = 'http_user';
configuration.Password = 'qwe123';
configuration.ApiUrl = 'http://127.0.0.1:9509/api';
```

#### Creating a Message

After you have initialized your configuration object you can continue by creating a Message object.
A message object holds all the needed data for message what you would like to send.
In JavaScript we create a __Message__ object with the following lines of codes:

```javascript
var msg = new Message();
msg.ToAddress = '+36201111111';
msg.Text = 'Hello world!';
```

#### Creating a MessageApi

You can use the __MessageApi__ class of the __Ozeki.Libs.Rest library__ to create a __MessageApi__ object which has the methods to send, delete, mark and receive SMS messages from the Ozeki SMS Gateway.
To create a __MessageApi__, you will need these lines of codes and a __Configuration__ instance.

```javascript
var api = new MessageApi(configuration);
```

After everything is ready you can begin with sending the previously created __Message__ object:

```javascript
var result = await api.Send(msg);

console.log(result);
```

After you have done all the steps, you check the Ozeki SMS Gateway and you will see the message in the _Sent_ folder of the __http_user__.
