# PHP-ChatGPTClass
A highly customizable ChatGPTClass written in PHP.


### Installation

1. Clone the repository
```
git clone [https://github.com/crilleaz/GPT3-Embedded-Chatbot](https://github.com/crilleaz/PHP-ChatGPTClass)
```

2. Import class and use it
```
<?php
require 'ChatGPTClass.php';

$chatGPT = new ChatGPT('YOUR_OPENAI_API_KEY', 'gpt-3.5-turbo', 'You are a helpful assistance bot.');
$response = $chatGPT->sendMessage('who is the president in USA?');
echo $response;

//Print the json content
//$content = json_decode($response, true)['choices'][0]['message']['content'];
//echo $content;
?>


```



### Discord
Crille#6623
