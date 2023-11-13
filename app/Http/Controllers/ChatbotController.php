<?php

namespace App\Http\Controllers;
use App\Models\Conversation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdminResponse;
use Illuminate\Support\Facades\DB;

class ChatbotController extends Controller
{
    public function index()
    {
        $conversations = DB::table('conversations')
                            ->select('id', 'user', 'question', 'answer', 'created_at', 'updated_at')
                            ->get();
        return view('blog/chat/conversation',['conversations'=>$conversations]);

    }

    public function ask(Request $request)
    {
        $question = $request->input('question');
        $user = $request->input('user');


        // Implement your logic to generate an answer based on the question
        // For example:
        // $answer = $this->generateAnswer($question);

        // Save the conversation
        Conversation::create([
            'user' => $user,
            'question' => $question,
            'greet'=> 'Chào mừng bạn đến với dịch vụ của chúng tôi! Tôi là chatbot tự động, tôi ở đây để giúp bạn. Hãy hỏi tôi bất kỳ điều gì bạn muốn.',
            // 'answer' => 'Nếu bạn muốn biết thông tin về sản phẩm hoặc dịch vụ cụ thể, hãy cung cấp tên sản phẩm hoặc số hiệu, tôi sẽ tìm kiếm thông tin đó cho bạn.' // Replace with your generated answer
        ]);
        return response()->json(['answer' => 'Nếu bạn muốn biết thông tin về sản phẩm hoặc dịch vụ cụ thể, hãy cung cấp tên sản phẩm hoặc số hiệu, tôi sẽ tìm kiếm thông tin đó cho bạn.']);
    }
        public function answer($id)
        {
            $conversation = conversation::find($id);
            $conversation->answer = request('answer');
            $conversation->save();

            return redirect('blog/chat/conversations')->with('success', 'Question answered successfully!');
        }


        public function getAllConversations()
        {
            // $conversations = DB::table('conversations')
            //                 ->select('id', 'user', 'question', 'answer', 'created_at', 'updated_at')
            //                 ->get();
            $conversations = Conversation::whereNull('answer')->get();

            return view('blog.chat.answer_conversation', ['conversations' => $conversations]);
        }

    // public function updateConversation($id, $newAnswer)
    // {
    //     $conversation = Conversation::find($id);
    //     $conversation->answer = $newAnswer;
    //     $conversation->save();
    //     return redirect('blog.chat.conversation')->with('success', 'Question answered successfully!');

    // }
}







