<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\UserTicketReply;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function message(Request $request)
    {
        // Логика сохранения сообщения

        $userTicketReply = new UserTicketReply();
        // Заполните свои данные $userTicketReply на основе входящего запроса

        $userTicketReply->save();

        // Отправка события обновления чата
        event(new MessageSend($userTicketReply));

        // Возвращение ответа
        return response()->json(['status' => 'success']);

    }
    public function sendMessage(Request $request)
    {
        // Логика сохранения и отправки сообщения

        $message = $request->input('message');

        // Отправка события чата
        event(new MessageSend($message));

        return response()->json(['status' => 'success']);
    }
}
