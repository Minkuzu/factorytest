<?php

use App\Controllers\DantriParserController;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\returnSelf;

class DantriParserControllerTest extends TestCase
{
    private $dt;
    public function testViewHome() {
        $mergeDataTest = $this->dt->expects($this->exactly(2))
        ->method('mergeData')
        ->with( $this->logicalOr(
                $this->equalTo(' DantriParser'),
                $this->equalTo('https://dantri.com.vn/kinh-doanh/nganh-bia-ruou-lao-dao-truoc-de-xuat-tang-thue-soc-chuyen-gia-noi-gi-20240703135956780.htm')))
        ->will(returnSelf());
        $this->assertEquals([   'https://dantri.com.vn/kinh-doanh/nganh-bia-ruou-lao-dao-truoc-de-xuat-tang-thue-soc-chuyen-gia-noi-gi-20240703135956780.htm',
                                'Ngành bia, rượu lao đao trước đề xuất tăng thuế "sốc", chuyên gia nói gì?',
                                'Mới đây, Bộ Tài chính công bố dự thảo Luật Thuế tiêu thụ đặc biệt sửa đổi. Trong đó, cơ quan này đề xuất áp thuế tiêu thụ đặc biệt 80% vào năm 2026, tăng dần qua các năm và lên 100% vào năm 2030 đối với rượu từ 20 độ trở lên và bia. Với rượu dưới 20 độ, Bộ đề xuất chịu thuế 50% từ năm 2026 sau đó tăng lên cao nhất 70% vào năm 2023.Hiện Luật Thuế tiêu thụ đặc biệt quy định sắc thuế này đối với rượu từ 20 độ trở lên là 65%, rượu dưới 20 độ là 35% và bia là 65% áp dụng từ năm 2018 đến nay.Tăng thuế để giảm tiêu thụ, doanh nghiệp than khóLý giải đề xuất trên, cơ quan soạn thảo cho rằng mặc dù mặt hàng bia và rượu đã được tăng thuế tiêu thụ đặc biệt theo lộ trình từ năm 2016-2018. Tuy nhiên, sức mua rượu, bia của người Việt Nam vẫn tăng do thu nhập tăng nhanh trong khi giá rượu, bia tăng rất chậm."Do vậy, lộ trình tăng thuế tiêu thụ đặc biệt đối với rượu và bia từ năm 2016-2018 chưa đủ mạnh để tác động đến giảm tiêu dùng rượu bia. Trước mắt, cần tiếp tục tăng thuế để tăng giá bán lẻ rượu, bia lên mức ít nhất tỷ trọng thuế rượu, bia chiếm 40% giá bán lẻ", Bộ Tài chính cho hay.Theo đó, cơ quan quản lý cho rằng cần tiếp tục điều chỉnh tăng mức thuế này theo phương pháp tính thuế tỷ lệ đối với rượu, bia để tăng giá bán rượu, bia ít nhất 10% theo khuyến nghị tăng thuế của WHO và lộ trình tăng theo mức tăng thu nhập và lạm phát.Thực tế, thời gian qua, chính sách quản lý đối với ngành sản xuất và kinh doanh bia, rượu đã có nhiều sửa đổi, chẳng hạn như quy định về thuế tiêu thụ đặc biệt. Nếu như Luật thuế tiêu thụ đặc biệt năm 1998 chia ra mức thuế suất khác nhau đối với các loại bia, rượu thì sau khi gia nhập WTO, Luật Thuế tiêu thụ đặc biệt năm 2008 đã thống nhất chỉ áp một mức thuế chung. (Ảnh: CTV).Mức thuế cũng đã được điều chỉnh tăng dần qua các năm từ 45% (2010) lên 65% (2018) và giữ nguyên đến nay. Ở góc độ của cơ quan quản lý, những thay đổi này được lý giải nhằm mục đích chính là hạn chế tiêu thụ để bảo vệ sức khỏe người dân và giảm thiểu những tác động xã hội tiêu cực khác từ tiêu thụ đồ uống có cồn.Thực tế, từ đầu năm 2023, Bộ Tài chính đã nhiều lần đưa ra dự thảo Luật thuế tiêu thụ đặc biệt (sửa đổi) để lấy ý kiến, trong đó có đề xuất tăng thuế với đồ uống có cồn.Trước đó, thời điểm tháng 4/2019, TPHCM cũng từng có dự kiến đề xuất tăng thuế tiêu thụ đặc biệt đối với rượu bia dựa trên Nghị quyết 52/2017 về thí điểm cơ chế chính sách đặc thù phát triển thành phố. Do đó, ngoài mục tiêu hạn chế việc lạm dụng rượu bia, mục tiêu khác được tính đến là nhằm tăng thu cho ngân sách.Tuy nhiên, ở góc độ doanh nghiệp, đại diện Hiệp hội Bia - Rượu - Nước giải khát (VBA) cho biết việc tăng thuế tiêu thụ đặc biệt với rượu, bia lên mức tuyệt đối sẽ khiến doanh nghiệp trong ngành gặp "khó khăn chưa từng có trong lịch sử"."Hiện nay các doanh nghiệp ngành đồ uống đang gặp rất nhiều khó khăn, có những doanh nghiệp năng lực sản xuất chỉ ở mức dưới 80% so với trước dịch Covid-19, sản lượng sản xuất chỉ đạt 60% so với công suất thiết kế, sản lượng và doanh thu giảm 20-25%, lợi nhuận giảm tới 30%...", đại diện VBA cho hay.Trong văn bản góp ý gửi Bộ Tài chính ngày 1/7, VBA cũng bày tỏ lo ngại việc tăng thuế sẽ làm giảm tính cạnh tranh của các sản phẩm trong nước. Đặc biệt, tăng thuế cao sẽ tạo ra khoảng cách lớn về lợi ích giữa sản phẩm chính thống và bất hợp pháp cho hàng lậu sẽ tăng cao, tiềm ẩn nhiều rủi ro đối với sức khỏe người tiêu dùng. Hiện nay ước sản lượng những sản phẩm bia nhái thương hiệu khoảng 200-300 triệu lít.Theo đó, đối với sản phẩm rượu, bia, cơ quan đại diện doanh nghiệp ngành này cho rằng cần xem xét giảm mức tăng thuế và giãn lộ trình tăng một cách hợp lý để tránh gây "sốc", ổn định thị trường, tạo điều kiện để doanh nghiệp thích nghi với việc tăng thuế trong thời gian tới.Chuyên gia nói gì?Từ góc nhìn của chuyên gia kinh tế, chia sẻ với báo Dân trí, TS Nguyễn Quốc Việt, Phó viện trưởng Viện Nghiên cứu Kinh tế và Chính sách (VEPR), cho rằng nên duy trì ổn định các thể chế/chính sách nhằm tiếp sức doanh nghiệp và kích cầu tiêu dùng trong nước. Thay đổi chính sách cần được nghiên cứu kỹ lưỡng, đảm bảo hài hòa lợi ích nhà nước, doanh nghiệp và người tiêu dùng."Có 2 vấn đề cần xem xét, thứ nhất có nhất thiết phải tăng thuế hay không. Nếu có thì tăng ở thời điểm nào và mức độ nào, nhất là trong bối cảnh doanh nghiệp gặp rất nhiều khó khăn", vị chuyên gia nêu quan điểm.Bên cạnh đó, theo ông Việt, các chính sách cũng cần có lộ trình để hạn chế những rủi ro đầu tư và kinh doanh của doanh nghiệp. "Mỗi doanh nghiệp trong một ngành sẽ gặp nhiều bất lợi do những thay đổi quá đột ngột hoặc quá mạnh của chính sách, đồng thời cũng có thể ảnh hưởng đến môi trường đầu tư của các lĩnh vực khác", ông đánh giá.Trong khi đó, ông Đinh Trọng Thịnh, chuyên gia kinh tế, lại ủng hộ đề xuất tăng thuế tiêu thụ đặc biệt đối với bia, rượu trên 20 độ của Bộ Tài chính bởi theo ông, sắc thuế này đối với mặt hàng bia rượu của Việt Nam đang ở mức thấp so với nhiều nước."Tình trạng gia tăng tiêu dùng đối với rượu, bia lại liên tục tăng qua các năm. Việt Nam là một trong số quốc gia có tốc độ tăng trưởng tiêu dùng rượu, bia trên đầu người cao nhất châu Á", ông nói.Ông Thịnh cho rằng chính sách tăng thuế với rượu, bia là bài toán lâu dài để đảm bảo lượng tiêu thụ ở mức thấp. Về những khó khăn của doanh nghiệp, vị này cho rằng doanh nghiệp sản xuất nên thực hiện tái cấu trúc để đáp ứng yêu cầu của xã hội và vì lợi ích lâu dài của thế hệ mai sau.',
                                ' Thứ năm, 04/07/2024 - 10:03 ',
                                ],
                                $mergeDataTest);
    }
    
    protected function setUp(): void
    {
        $this->dt = $this->createMock(DantriParserController::class);
    }

    protected function tearDown(): void
    {
        $this->dt = null;
    }
}
?>