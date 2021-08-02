# Javascript library to send sms with http/rest/JSON

This C# sms library enables you to **send** and **receive** from Javascript with http requests. The library uses HTTP Post requests and JSON encoded content to send the text messages to the mobile network. It connects to the HTTP SMS API of [Ozeki SMS gateway](https://ozeki-sms-gateway.com).

The Ozeki SMS Gateway is a powerful yet easy to master gateway software. It is very reliable, and it runs in an environment controlled by the user. It means that it offers outstanding safety for your data. It provides an HTTP SMS API, that allows you to connect to it from local or remote programs. The reason why companies use Ozeki SMS Gateway as their first point of access to the mobile network, is because it provides service provider independence and direct access to the mobile network through wireless connections.

Download: [Ozeki SMS Gateway download page](https://ozeki-sms-gateway.com/p_727-download-sms-gateway.html)

Tutorial: [Javascript send sms sample and tutorial](https://ozeki-sms-gateway.com/p_837-javascript-send-sms-with-the-http-rest-api-code-sample.html)

## How to  send SMS from Javascript

1. [Download Ozeki SMS Gateway](https://ozeki-sms-gateway.com/p_727-download-sms-gateway.html)
2. [Connect Ozeki SMS Gateway to the mobile network](https://ozeki-sms-gateway.com/p_70-mobile-network.html)
3. [Create an HTTP SMS API user](https://ozeki-sms-gateway.com/p_2102-create-an-http-sms-api-user-account.html)
4. Download and Install WampServer
5. Download then extract the SendSms.js.zip file
6. Put the contents of the zip file into the \www\ folder of the wampserver: C:\wamp64\www
7. Launch Ozeki SMS Gateway app
8. Open the website by typing http://localhost/SendSms.php into your browser
9. Send the SMS
10.Check the logs to see if the SMS sent 

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

## Manual / API reference
To get a better understanding of the above **SMS code sample**, it is a good idea to visit the webpage that explains this code in a more detailed way. You can find videos, explanations and downloadable content on this URL.

Link: [How to send sms from Javascript](https://ozeki-sms-gateway.com/p_837-javascript-send-sms-with-the-http-rest-api-code-sample.html)

## How to send sms through your Android mobile phone

If you wish to [send SMS through your Android mobile phone from C#](https://android-sms-gateway.com/), you need to [install Ozeki SMS Gateway on your Android](https://ozeki-sms-gateway.com/p_2847-how-to-install-ozeki-sms-gateway-on-android.html) mobile phone. It is recommended to use an Android mobile phone with a minimum of 4GB RAM and a quad core CPU. Most devices today meet these specs. The advantage of using your mobile, is that it is quick to setup and it often allows you to [send sms free of charge](https://android-sms-gateway.com/p_246-how-to-send-sms-free-of-charge.html).
[Android SMS Gateway](https://android-sms-gateway.com)

## Get started now

Don't waste any time, download the repository now, and send your first SMS!

