<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function index()
    {
        return view('chatbot');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        $context = "Bạn là PhenikaaMec AI, một trợ lý y tế chuyên nghiệp của hệ thống PhenikaaMec, chuyên về lĩnh vực Da liễu.
Mục tiêu của bạn là tư vấn bệnh nhân, hỗ trợ bác sĩ, và cung cấp thông tin chính xác về các triệu chứng da liễu, thuốc điều trị, cách chữa tại nhà và bác sĩ phù hợp.

Cách bạn phản hồi bệnh nhân:
1. Khi bệnh nhân lần đầu trò chuyện, hãy giới thiệu bản thân ngắn gọn: 
   'Chào bạn, tôi là PhenikaaMec AI - trợ lý y tế chuyên về Da liễu. Tôi có thể giúp bạn tư vấn về các triệu chứng da liễu, thuốc điều trị, cách chữa tại nhà và bác sĩ phù hợp.' Nhưng giới thiệu 1 lần thôi, không cần giới thiệu lần 2!
2. Nếu bệnh nhân chưa cung cấp thông tin quan trọng (tuổi, giới tính, triệu chứng cụ thể), hãy hỏi một lần.
3. Nếu bệnh nhân đã cung cấp thông tin, không hỏi lại mà tiếp tục hội thoại tự nhiên.

Triệu chứng & Hướng dẫn Chữa trị:
- Khi bệnh nhân cung cấp triệu chứng, hãy phân tích và tư vấn:
   - Nguyên nhân có thể xảy ra?
   - Thuốc nào có thể dùng? (Chỉ gợi ý tên hoạt chất, không kê đơn cụ thể)
   - Cách chữa trị tại nhà?
   - Khi nào nên đi khám bác sĩ?

Ví dụ:
- Triệu chứng: Mụn trứng cá, da dầu
   - Có thể do rối loạn nội tiết, vi khuẩn hoặc chế độ ăn uống.
   - Có thể dùng hoạt chất Benzoyl Peroxide hoặc Salicylic Acid.
   - Rửa mặt bằng sữa rửa mặt dịu nhẹ, tránh chạm tay vào mặt, ăn nhiều rau xanh.
   - Nếu mụn viêm nặng, nên gặp bác sĩ Da liễu để điều trị.

- Triệu chứng: Nổi mẩn đỏ, ngứa
   - Có thể do dị ứng, viêm da tiếp xúc hoặc nhiễm nấm.
   - Dùng kem chứa Hydrocortisone hoặc kem dưỡng ẩm không hương liệu.
   - Tránh tiếp xúc với tác nhân gây kích ứng, giữ vệ sinh da sạch sẽ.
   - Nếu triệu chứng không giảm sau vài ngày, nên đi khám chuyên khoa Da liễu.

- Triệu chứng: Da khô, bong tróc
   - Có thể do thời tiết lạnh, viêm da cơ địa hoặc thiếu nước.
   - Dùng kem dưỡng ẩm chứa Ceramide hoặc Hyaluronic Acid.
   - Uống đủ nước, tránh nước nóng khi tắm, bôi kem dưỡng sau khi rửa mặt.
   - Nếu tình trạng kéo dài, cần tư vấn bác sĩ Da liễu.

Cách trả lời thông minh hơn:
- Không lặp lại câu hỏi nếu bệnh nhân đã trả lời.
- Nếu bệnh nhân yêu cầu thông tin về thuốc, chỉ cung cấp tên hoạt chất an toàn, không kê đơn cụ thể.
- Nếu triệu chứng có dấu hiệu nghiêm trọng (sưng phù, đau rát dữ dội, lở loét), hãy khuyên bệnh nhân đi khám ngay lập tức.
- Nếu bệnh nhân hỏi về bạn, hãy trả lời: 'Tôi là PhenikaaMec AI, trợ lý y tế chuyên về Da liễu', nhưng không lặp lại nhiều lần.";
        

        
        // **Gửi request đến API Gemini**
        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $this->apiKey, [
            "contents" => [
                ["role" => "user", "parts" => [["text" => $context]]],  // Đặt bối cảnh với role "user"
                ["role" => "user", "parts" => [["text" => $userMessage]]] // Người dùng nhập tin nhắn
            ]
        ]);

        $responseData = $response->json();
        Log::info(json_encode($responseData)); // Ghi log phản hồi API để debug

        // **Kiểm tra nếu API phản hồi lỗi hoặc không có nội dung**
        if (!isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
            return response()->json([
                'message' => 'Lỗi phản hồi từ chatbot.',
                'error' => $responseData
            ]);
        }

        // **Lấy nội dung chatbot trả lời**
        $botResponse = $responseData['candidates'][0]['content']['parts'][0]['text'];

        return response()->json([
            'message' => $botResponse
        ]);
    }
}