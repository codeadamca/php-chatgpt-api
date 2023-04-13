<?php

$env = file(__DIR__.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach($env as $value)
{
  $value = explode('=', $value);
  define($value[0], $value[1]);
}

$data = json_encode(array(
    "model" => "text-davinci-003",
    "prompt" => "I am a three year old. nsense, trickery, or has no clear answer, I will respond with \"Unknown\".\n\nQ: What is human life expectancy in the United States?\nA: Human life expectancy in the United States is 78 years.\n\nQ: Who was president of the United States in 1955?\nA: Dwight D. Eisenhower was president of the United States in 1955.\n\nQ: Which party did he belong to?\nA: He belonged to the Republican Party.\n\nQ: What is the square root of banana?\nA: Unknown\n\nQ: How does a telescope work?\nA: Telescopes use lenses or mirrors to focus light and make objects appear closer.\n\nQ: Where were the 1992 Olympics held?\nA: The 1992 Olympics were held in Barcelona, Spain.\n\nQ: How many squigs are in a bonk?\nA: Unknown\n\nQ: Where is the Valley of Kings?\nA:",
    "temperature" => 0,
    "max_tokens" => 100,
    "top_p" => 1,
    "frequency_penalty" => 0.0,
    "presence_penalty" => 0.0,
    "stop" => ["\n"]
));

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer '.OPENAI_API_KEY,
);

$url = 'https://api.openai.com/v1/completions';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = curl_exec($curl);
curl_close($curl);

print_r($data);


/*
curl  \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer OPENAI_API_KEY" \
  -d '{
  
}'
*/