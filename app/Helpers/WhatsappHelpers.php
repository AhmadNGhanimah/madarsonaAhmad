<?php

use App\Models\Lead;
use Illuminate\Support\Facades\Http;

if (!function_exists('ping')) {
    function ping()
    {
        $response = Http::get(config('app.whatsapp_api_url') . "/ping");
        if ($response->successful()) {
            return optional($response->object())->success;
        }
        return false;

    }
}

if (!function_exists('getChats')) {
    function getChats()
    {
        $response = Http::get(config('app.whatsapp_api_url') . "/client/getChats/" . config('app.whatsapp_session_id'));
        if ($response->successful()) {
            return optional($response->object())->chats;
        }
        return [];
    }
}

if (!function_exists('getChatById')) {
    function getChatById($chat_id): ?object
    {
        $response = Http::post(config('app.whatsapp_api_url') . "/client/getChatById/" . config('app.whatsapp_session_id'),
            ['chatId' => $chat_id,]);
        if ($response->successful()) {
            $chat = optional($response->object())->chat;
            $lead = Lead::updateOrcreate(['serialized' => $chat->id->_serialized], [
                'name' => $chat->name,
                'phone' => $chat->id->user,
                'serialized' => $chat->id->_serialized,
                'unread_count' => $chat->unreadCount,
                'timestamp' => $chat->timestamp ?? null,
            ]);
            return $lead;
        }
        return null;
    }
}

if (!function_exists('getChatMessages')) {
    function getChatMessages($chat_id)
    {
        $response = Http::post(config('app.whatsapp_api_url') . "/chat/fetchMessages/" . config('app.whatsapp_session_id'), [
            'chatId' => $chat_id,
            'searchOptions' => [
                'limit' => 'Infinity'
            ]
        ]);

        if ($response->successful()) {
            return optional($response->object())->messages;
        }
        return [];
    }
}

if (!function_exists('getMessageMedia')) {
    function getMessageMedia($chat_id, $message_id)
    {
        try {
            $response = Http::post(config('app.whatsapp_api_url') . "/message/downloadMedia/" . config('app.whatsapp_session_id'), [
                'chatId' => $chat_id,
                'messageId' => $message_id,
            ]);

            if ($response->successful()) {
                return optional($response->object())->messageMedia;
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}

if (!function_exists('sendSeen')) {
    function sendSeen($chat_id): void
    {
        $response = Http::post(config('app.whatsapp_api_url') . "/client/sendSeen/" . config('app.whatsapp_session_id'), [
            'chatId' => $chat_id,
        ]);

    }
}
