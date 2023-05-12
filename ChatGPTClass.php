<?php
class ChatGPT {
    private $endpoint;
    private $apiKey;
    private $languageModel;
    private $systemMessage;

    public function __construct($apiKey, $languageModel, $systemMessage, $endpoint = 'https://api.openai.com/v1/') {
        $this->endpoint = $endpoint;
        $this->apiKey = $apiKey;
        $this->languageModel = $languageModel;
        $this->systemMessage = $systemMessage;
    }

    public function sendMessage($question, $sessionId = null) {
        $headers = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json',
        ];

        $data = [
            'messages' => [
                ['role' => 'system', 'content' => $this->systemMessage],
                ['role' => 'user', 'content' => $question]
            ],
            'model' => $this->languageModel,
        ];

        if ($sessionId) {
            $data['session_id'] = $sessionId;
        }

        $ch = curl_init($this->endpoint . 'chat/completions');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("Curl request error: $error");
        }

        curl_close($ch);

        return $response;
    }    
}
?>