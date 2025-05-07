<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Prism\Prism\Prism;
use Prism\Prism\Enums\Provider;

class CreatePost extends Component
{
    public string $title = '';
    public string $postText = '';
    public string $summary = '';
    public string $summaryError = '';

    public function render()
    {
        return view('livewire.create-post');
    }

    public function generateSummary()
    {
        $query = view('prompts.summaryQuery', [
            'postText' => $this->postText,
        ])->render();

        $this->summaryError = '';

        // $aiQuery = Http::withToken(config('services.openai.apiKey'))
        //     ->asJson()
        //     ->acceptJson()
        //     ->post('https://api.openai.com/v1/chat/completions', [
        //         'model'    => 'gpt-4o',
        //         'messages' => [
        //             ['role' => 'user', 'content' => $query]
        //         ]
        //     ]);

        // info('OpenAI result:');
        // info($aiQuery->json());

        // if ($aiQuery->json('error')) {
        //     $this->summaryError = $aiQuery->json('error.message');
        // } else {
        //     $this->summary = $aiQuery->json('choices.0.message.content');
        // }

        // ================================

        // Claude version
        // $aiQuery = Http::withHeaders([
        //         'x-api-key' => config('services.anthropic.apiKey'),
        //         'anthropic-version' => '2023-06-01',
        //     ])
        //     ->asJson()
        //     ->acceptJson()
        //     ->post('https://api.anthropic.com/v1/messages', [
        //         'model'    => 'claude-3-7-sonnet-20250219',
        //         'max_tokens' => 1024,
        //         'messages' => [
        //             ['role' => 'user', 'content' => $query]
        //         ]
        //     ]);

        // info('Anthropic result:');
        // info($aiQuery->json());
    
        // if ($aiQuery->json('error')) {
        //     $this->summaryError = $aiQuery->json('error.message');
        // } else {
        //     $this->summary = $aiQuery->json('content.0.text');
        // }

        // Prism version
        try {
            $response = Prism::text()
                ->using(Provider::OpenAI, 'gpt-4o')
                // ->using(Provider::Anthropic, 'claude-3-7-sonnet-20250219')
                ->withPrompt($query)
                ->asText();

            $this->summary = $response->text;
        } catch (\Exception $e) {
            $this->summaryError = $e->getMessage();
        }
    }
}
