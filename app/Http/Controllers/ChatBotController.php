<?php

/*namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index(Request $request)
    {
        $symptoms = $request->input('symptoms');
        $prompt = "I have a dog with the following symptoms: $symptoms. What could be the diagnosis and treatment?";

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer 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',
                'Content-Type' => 'application/json'
            ]
        ]);

        $response = $client->post('https://api.openai.com/v1/engines/davinci-codex/completions', [
            'json' => [
                'prompt' => $prompt,
                'max_tokens' => 1024,
                'temperature' => 0.7,
                'stop' => ['\n']
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $output = $data['choices'][0]['text'];

        return view('freeConsultation', ['symptoms' => $symptoms, 'output' => $output]);
    }*/
  
namespace App\Http\Controllers;
  
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
  
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
  
        $botman->hears('{message}', function($botman, $message) {
  
            if ($message == 'hi') {
                $this->askName($botman);
            }else{
                $botman->reply("write 'hi' for testing...");
            }
  
        });
  
        $botman->listen();
    }
  
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say('Nice to meet you '.$name);
        });
    }

}
