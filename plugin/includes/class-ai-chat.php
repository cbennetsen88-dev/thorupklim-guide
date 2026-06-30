<?php

namespace TKG\Core;

if (!defined('ABSPATH')) {
    exit;
}

class AI_Chat {

    public function __construct() {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function register_routes() {

        register_rest_route('tkg/v1', '/chat', [
            'methods' => 'POST',
            'callback' => [$this, 'handle']
        ]);
    }

    public function handle($request) {

        $message = strtolower((string) $request->get_param('message'));

        $context = $this->get_context();

        $reply = $this->generate_reply($message, $context);

        return [
            'reply' => $reply,
            'context' => $context
        ];
    }

    private function get_context() {

        $hour = (int) date('H');

        return [
            'time' => $hour,
            'mood' => ($hour < 8) ? 'slow' : (($hour < 18) ? 'active' : 'relax')
        ];
    }

    private function generate_reply($msg, $context) {

        if (str_contains($msg, 'strand')) {
            return "🌊 Perfekt timing — tag til Thorup Strand.";
        }

        if (str_contains($msg, 'mad')) {
            return "🍽️ Jeg kan anbefale lokale caféer tæt på dig.";
        }

        if (str_contains($msg, 'plan')) {
            return "🧭 Jeg kan lave en fuld dagsplan hvis du trykker 'Start min dag'.";
        }

        if ($context['mood'] === 'relax') {
            return "🌅 Det er en rolig tid på dagen — perfekt til natur og udsigt.";
        }

        return "🧭 Jeg hjælper med strand, mad, planlægning og oplevelser.";
    }
}
