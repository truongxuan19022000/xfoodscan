<?php

namespace Database\Seeders;

use App\Enums\Ask;
use Dipokhalder\EnvEditor\EnvEditor;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Str;
use App\Enums\ItemType;
use App\Enums\Status;
use Illuminate\Support\Facades\File;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public array $items = [
        [
            'name'        => 'Bánh Xếp Gà',
            'category'    => 1,
            'tax_id'      => 2,
            'price'       => '65000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Cảnh báo: Có chứa gluten và bột mì.',
            'description' => 'Bánh xếp nhân gà thơm ngon, dùng kèm nước tương đặc biệt.'
        ],
        [
            'name'        => 'Nem Rán',
            'category'    => 1,
            'tax_id'      => 2,
            'price'       => '40000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Cảnh báo: Có chứa gluten và bột mì.',
            'description' => 'Nem rán giòn tan với nhân thịt heo và rau củ.'
        ],
        [
            'name'        => 'Hoành Thánh Chiên Phô Mai',
            'category'    => 1,
            'tax_id'      => 2,
            'price'       => '50000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Cảnh báo: Có chứa sữa và phô mai.',
            'description' => 'Hoành thánh chiên giòn rụm với nhân phô mai béo ngậy.'
        ],
        [
            'name'        => 'Bánh Xếp Rau Củ',
            'category'    => 1,
            'tax_id'      => 2,
            'price'       => '60000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Cảnh báo: Có chứa lactose.',
            'description' => 'Bánh xếp nhân rau củ tươi ngon, thanh đạm.'
        ],
        [
            'name'        => 'Phở Bò Đặc Biệt',
            'category'    => 2,
            'tax_id'      => 1,
            'price'       => '85000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Cảnh báo: Có chứa thịt bò.',
            'description' => 'Phở bò truyền thống với đầy đủ tái, nạm, gầu, bò viên.'
        ],
        [
            'name'        => 'Bánh Mì Thịt Nướng',
            'category'    => 2,
            'tax_id'      => 1,
            'price'       => '35000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Allergen - i). Contains cereals and products thereof containing gluten. ii). Contains milk and products thereof (including lactose4. iii). Wheat.',
            'description' => 'A flame-grilled whopper patty, topped with American cheese, fresh slices of tomato and crisp lettuce, and finished with a zesty BBQ sauce and golden crispy onions.'
        ],
        [
            'name'        => 'Bánh Mì Kẹp Thịt Bò Hai Tầng',
            'category'    => 2,
            'tax_id'      => 2,
            'price'       => '87500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Lúa mì.',
            'description' => 'Hai miếng thịt bò nướng lửa đặc trưng kết hợp với thịt xông khói và hai lớp phô mai Mỹ tan chảy trong nhân bánh mì mè nướng.'
        ],
        [
            'name'        => 'Bánh Burger Phô Mai Classic',
            'category'    => 2,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Lúa mì.',
            'description' => 'Hai lớp phô mai Mỹ tan chảy kẹp trong bánh mì mè nướng thơm phức.'
        ],
        [
            'name'        => 'Burger Bò Sốt Tiêu Đen',
            'category'    => 2,
            'tax_id'      => 1,
            'price'       => '62500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Lúa mì.',
            'description' => 'Thịt bò nướng lửa hoàn hảo, phủ thêm thịt xông khói giòn rụm, hành tây caramen ngọt ngào, rau rocket tươi và sốt mayo tiêu đen bí truyền.'
        ],
        [
            'name'        => 'Burger Bò Nướng Đặc Biệt',
            'category'    => 2,
            'tax_id'      => 1,
            'price'       => '50000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Lúa mì.',
            'description' => 'Một miếng thịt bò nướng lửa, phủ cà chua, xà lách tươi, sốt mayo, dưa chuột muối, một chút tương cà và hành tây cắt lát trên nền bánh mì mè mềm.'
        ],
        [
            'name'        => 'Burger Chay Vị Thịt Xông Khói',
            'category'    => 3,
            'tax_id'      => 2,
            'price'       => '87500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa hạt và các sản phẩm từ hạt. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Hạt điều.',
            'description' => 'Miếng patty thực vật nướng lửa trong ổ bánh mì cổ điển, xếp lớp với phô mai thuần chay và thịt xông khói chay, phủ sốt mayo không trứng và tương cà.'
        ],
        [
            'name'        => 'Burger Chay Truyền Thống',
            'category'    => 3,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa hạt và các sản phẩm từ hạt. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Hạt điều.',
            'description' => 'Burger thực vật nướng lửa với cà chua, xà lách tươi, sốt mayo thuần chay, dưa muối, tương cà và hành tây trên bánh mì mè.'
        ],
        [
            'name'        => 'Burger Chay Phô Mai Giòn',
            'category'    => 3,
            'tax_id'      => 1,
            'price'       => '62500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa hạt và các sản phẩm từ hạt. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Hạt điều.',
            'description' => 'Miếng patty thuần chay giòn rụm phủ phô mai chay, thịt xông khói chay, xà lách, sốt mayo thuần chay và bánh mì mè nướng.'
        ],
        [
            'name'        => 'Bánh Mì Gà Chay Hoàng Gia',
            'category'    => 3,
            'tax_id'      => 2,
            'price'       => '75000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa hạt và các sản phẩm từ hạt. ii). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose). iii). Hạt điều.',
            'description' => 'Patty thuần chay giòn tan phủ xà lách tươi, sốt mayo chay và kẹp trong bánh mì mè nướng.'
        ],
        [
            'name'        => 'Bánh Mì Gà Sốt BBQ',
            'category'    => 4,
            'tax_id'      => 1,
            'price'       => '112500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Bánh mì gà BBQ đậm đà được làm từ thịt gà nấu chậm mọng nước và salad bắp cải giòn trên bánh mì brioche nướng.'
        ],
        [
            'name'        => 'Bánh Mì Heo Quay Sốt BBQ',
            'category'    => 4,
            'tax_id'      => 1,
            'price'       => '112500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Thịt heo nấu chậm xé phay thấm đẫm sốt BBQ ngọt thanh, kèm salad bắp cải trong bánh mì brioche nướng.'
        ],
        [
            'name'        => 'Bánh Mì Gà Nướng Nấm',
            'category'    => 4,
            'tax_id'      => 2,
            'price'       => '87500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Bánh mì phô mai kẹp nhân gà, nấm và ớt chuông, được nướng với bơ để tạo độ giòn.'
        ],
        [
            'name'        => 'Gà Nướng Áp Chảo Classic',
            'category'    => 4,
            'tax_id'      => 1,
            'price'       => '100000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Bánh mì gà nướng đơn giản với thịt gà ướp đậm đà, xà lách, cà chua và sốt mayo. Bánh mì nướng bơ vàng giòn khiến món ăn trở nên đặc biệt!'
        ],
        [
            'name'        => 'Bánh Mì Bít Tết Áp Chảo',
            'category'    => 4,
            'tax_id'      => 1,
            'price'       => '87500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Bánh mì bít tết mọng nước, xếp chồng các lát thịt bò mềm, cà chua, xà lách, hành tây caramen, sốt mayo tỏi và mù tạt.'
        ],
        [
            'name'        => 'Gà Sốt Kem Cà Chua Cay',
            'category'    => 5,
            'tax_id'      => 1,
            'price'       => '100000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Gà nấu sốt kem cà chua thảo mộc với một chút vị cay nồng nàn.'
        ],
        [
            'name'        => 'Gà Cung Bảo (Kung Pao)',
            'category'    => 5,
            'tax_id'      => 1,
            'price'       => '100000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Gà xào Kung Pao cực kỳ gây nghiện với sự kết hợp hoàn hảo giữa vị mặn, ngọt và cay!'
        ],
        [
            'name'        => 'Gà Sốt Mật Ong Mè',
            'category'    => 5,
            'tax_id'      => 2,
            'price'       => '87500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Những miếng gà chiên giòn quyện trong nước sốt mật ong mè ngọt ngào và đậm đà.'
        ],
        [
            'name'        => 'Gà Sốt Chua Ngọt',
            'category'    => 5,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Gà sốt chua ngọt với gà chiên giòn, dứa và ớt chuông, hương vị giống hệt quán ăn yêu thích nhưng không dùng màu thực phẩm.'
        ],
        [
            'name'        => 'Gà Nướng Phô Mai Cà Chua',
            'category'    => 5,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc và các sản phẩm từ ngũ cốc có chứa gluten. ii). Chứa trứng và các sản phẩm từ trứng. iii). Lúa mì.',
            'description' => 'Ức gà nướng hoàn hảo, phủ phô mai mozzarella tươi và cà chua băm nhuyễn thơm mùi tỏi.'
        ],
        [
            'name'        => 'Bò Xào Bông Cải Xanh',
            'category'    => 6,
            'tax_id'      => 2,
            'price'       => '100000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Các chất hoặc sản phẩm gây dị ứng - i). Với muối nitrit. ii). Với nitrat. iii). Với cả muối nitrit và nitrat.',
            'description' => 'Bông cải xanh giòn và hành tây ngọt xào cùng thịt bò, bóng bẩy với nước sốt nâu ngon nhất.'
        ],
        [
            'name'        => 'Bò Xào Rau Củ Thập Cẩm',
            'category'    => 6,
            'tax_id'      => 1,
            'price'       => '87500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Các chất hoặc sản phẩm gây dị ứng - i). Với muối nitrit. ii). Với nitrat. iii). Với cả muối nitrit và nitrat.',
            'description' => 'Thịt bò thái mỏng với đậu hà lan, cà rốt và bông cải xanh, xào nhanh với sốt gừng mè cay nhẹ đầy dinh dưỡng.'
        ],
        [
            'name'        => 'Bò Né Hành Tây Ớt Chuông',
            'category'    => 6,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Các chất hoặc sản phẩm gây dị ứng - i). Với muối nitrit. ii). Với nitrat. iii). Với cả muối nitrit và nitrat.',
            'description' => 'Những lát bít tết mềm mọng nước trộn với ớt chuông và nhiều hành tây trong nước sốt đậm đà.'
        ],
        [
            'name'        => 'Bò Xào Tứ Xuyên',
            'category'    => 6,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Các chất hoặc sản phẩm gây dị ứng - i). Với muối nitrit. ii). Với nitrat. iii). Với cả muối nitrit và nitrat.',
            'description' => 'Thịt bò quyện trong nước sốt cay nồng làm từ nhiều lớp ớt, tỏi, gừng và tiêu Tứ Xuyên với một chút vị ngọt.'
        ],
        [
            'name'        => 'Mực Xào Cung Bảo (Kung Pao)',
            'category'    => 7,
            'tax_id'      => 2,
            'price'       => '137500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - i). Cá. ii). Lưu huỳnh đioxit và sulfit. iii). Đậu nành. iv). Sữa (lactose). v). Ngũ cốc chứa gluten. vi). Lúa mì. vii). Trứng. viii). Mè.',
            'description' => 'Mực xào Kung Pao với đậu phộng rang giòn, ớt cay và tiêu Tứ Xuyên tê đầu lưỡi trong nước sốt mặn ngọt.'
        ],
        [
            'name'        => 'Cá Hồi Xào Rau Củ',
            'category'    => 7,
            'tax_id'      => 1,
            'price'       => '87500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - i). Cá. ii). Lưu huỳnh đioxit và sulfit. iii). Đậu nành. v). Ngũ cốc chứa gluten. vi). Lúa mì. vii). Trứng. viii). Mè.',
            'description' => 'Cá hồi thái miếng cùng đậu hà lan, cà rốt và bông cải xanh, xào nhanh với sốt gừng mè cay nhẹ.'
        ],
        [
            'name'        => 'Tôm Xào Bông Cải Xanh',
            'category'    => 7,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa động vật giáp xác. ii). Chứa hạt mè.',
            'description' => 'Bông cải xanh giòn và hành tây ngọt xào cùng tôm tươi, quyện sốt nâu đậm đà.'
        ],
        [
            'name'        => 'Tôm Xào Tứ Xuyên',
            'category'    => 7,
            'tax_id'      => 2,
            'price'       => '100000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa động vật giáp xác. ii). Chứa hạt mè.',
            'description' => 'Sốt Tứ Xuyên cay nồng, đậm đà phủ lên những con tôm nhỏ mềm ngọt.'
        ],
        [
            'name'        => 'Salad Caesar Truyền Thống',
            'category'    => 8,
            'tax_id'      => 1,
            'price'       => '87500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa hạt. ii). Chứa sữa (bao gồm lactose). iii). Hạt điều.',
            'description' => 'Salad Caesar giòn rụm với nước sốt Caesar truyền thống và bánh mì vụn chiên tỏi.'
        ],
        [
            'name'        => 'Salad Cá Ngừ Tươi',
            'category'    => 8,
            'tax_id'      => 1,
            'price'       => '100000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - i). Cá. ii). Lưu huỳnh đioxit. iii). Đậu nành. iv). Sữa. v). Ngũ cốc chứa gluten. vi). Lúa mì. vii). Trứng. viii). Mè.',
            'description' => 'Cá ngừ tươi, cần tây giòn, hành tím, củ cải đỏ và thảo mộc tươi trộn trong nước sốt chanh béo ngậy.'
        ],
        [
            'name'        => 'Salad Rau Củ Thập Cẩm',
            'category'    => 8,
            'tax_id'      => 2,
            'price'       => '62500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa hạt. ii). Chứa sữa (bao gồm lactose). iii). Hạt điều.',
            'description' => 'Một bát đầy bắp cải, cà chua và cà rốt trộn với nước sốt sữa chua béo ngậy, mật ong, muối và tiêu.'
        ],
        [
            'name'        => 'Salad Lê Hầm Phô Mai',
            'category'    => 8,
            'tax_id'      => 1,
            'price'       => '75000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa hạt. ii). Chứa sữa (bao gồm lactose). iii). Hạt điều.',
            'description' => 'Salad lê hầm và phô mai dê ăn kèm rau xanh hỗn hợp và nước sốt giấm hẹ lê.'
        ],
        [
            'name'        => 'Salad Cá Hồi Nướng',
            'category'    => 8,
            'tax_id'      => 1,
            'price'       => '37500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - i). Cá. ii). Lưu huỳnh đioxit. iii). Đậu nành. iv). Sữa. v). Ngũ cốc chứa gluten. vi). Lúa mì. vii). Trứng. viii). Mè.',
            'description' => 'Cá hồi nướng tơi, cần tây giòn, hành tím và thảo mộc tươi trộn trong nước sốt chanh kem.'
        ],
        [
            'name'        => 'Súp Nui Gà Hầm',
            'category'    => 9,
            'tax_id'      => 2,
            'price'       => '75000',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Chất gây dị ứng - i). Ngũ cốc chứa gluten. ii). Sữa (lactose). iii). Cần tây. iv). Trứng.',
            'description' => 'Món súp nui gà này giống như một cái ôm ấm áp. Với thịt gà mềm, rau củ và nui, đây là món ăn an ủi tuyệt vời nhất vào ngày se lạnh.'
        ],
        [
            'name'        => 'Súp Trứng (Trứng Vân Mây)',
            'category'    => 9,
            'tax_id'      => 1,
            'price'       => '62500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Chất gây dị ứng - i). Ngũ cốc chứa gluten. ii). Sữa (lactose). iii). Cần tây. iv). Trứng.',
            'description' => 'Súp trứng là nước dùng nóng, sánh nhẹ với hương vị gà đậm đà và những dải trứng đẹp mắt bên trong.'
        ],
        [
            'name'        => 'Súp Chua Cay Chay',
            'category'    => 9,
            'tax_id'      => 1,
            'price'       => '50000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Chất gây dị ứng - i). Ngũ cốc chứa gluten. ii). Sữa (lactose). iii). Cần tây. iv). Trứng.',
            'description' => 'Với nấm, đậu phụ và trứng, súp chua cay được làm sánh bằng bột bắp để nước dùng bóng mượt đẹp mắt.'
        ],
        [
            'name'        => 'Súp Hoành Thánh Tôm Thịt',
            'category'    => 9,
            'tax_id'      => 2,
            'price'       => '62500',
            'type'        => ItemType::NON_VEG,
            'featured'    => Ask::YES,
            'caution'     => 'Chất gây dị ứng - i). Ngũ cốc chứa gluten. ii). Sữa (lactose). iii). Cần tây. iv). Trứng.',
            'description' => 'Một món ăn cổ điển nhẹ nhàng với những viên hoành thánh nhân thịt lợn trong nước dùng gà đậm đà!'
        ],
        [
            'name'        => 'Khoai Tây Đút Lò Muối Biển',
            'category'    => 10,
            'tax_id'      => 1,
            'price'       => '37500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc có chứa gluten. ii). Lúa mì.',
            'description' => 'Bên ngoài nâu vàng và giòn rụm, được bao phủ bởi một lớp muối biển.'
        ],
        [
            'name'        => 'Khoai Tây Chiên Pháp',
            'category'    => 10,
            'tax_id'      => 1,
            'price'       => '25000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc có chứa gluten. ii). Lúa mì.',
            'description' => 'Ăn kèm với sốt mayo và tương ớt xanh.'
        ],
        [
            'name'        => 'Khoai Tây Nghiền Bơ Tỏi',
            'category'    => 10,
            'tax_id'      => 1,
            'price'       => '37500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc có chứa gluten. ii). Lúa mì.',
            'description' => 'Làm từ khoai tây Idaho, bơ và tỏi thơm nồng.'
        ],
        [
            'name'        => 'Hành Tây Vòng Chiên Giòn',
            'category'    => 10,
            'tax_id'      => 2,
            'price'       => '25000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc có chứa gluten. ii). Lúa mì.',
            'description' => 'Phục vụ kèm sốt mayo và tương ớt xanh.'
        ],
        [
            'name'        => 'Bánh Khoai Tây Áp Chảo',
            'category'    => 10,
            'tax_id'      => 1,
            'price'       => '37500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa ngũ cốc có chứa gluten. ii). Lúa mì.',
            'description' => 'Bánh khoai tây bào chiên xém cạnh, dùng bột mì và trứng làm chất kết dính.'
        ],
        [
            'name'        => 'Trà Đào Cam Sả',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '45000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Allergen - i). Contains milk and products thereof (including lactose).',
            'description' => 'Black tea infused with cinnamon, clove and other warming spices is combined with steamed milk and topped with foam for the perfect balance of sweet and spicy.'
        ],[
            'name'        => 'Cà Phê Espresso',
            'category'    => 11,
            'tax_id'      => 2,
            'price'       => '25000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Dòng Espresso đặc trưng với hương vị đậm đà, mượt mà và hậu vị ngọt thanh như caramel.'
        ],
        [
            'name'        => 'Nước Chanh Nhà Làm',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '37500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Vị chua ngọt hoàn hảo, là thức uống giải nhiệt lý tưởng nhất cho ngày hè.'
        ],
        [
            'name'        => 'Cà Phê Sữa Đá (Cold Brew)',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '37500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => 'LMIV - Chất gây dị ứng - i). Chứa sữa và các sản phẩm từ sữa (bao gồm lactose).',
            'description' => 'Lớp foam lạnh mịn màng đối lập hoàn hảo với vị cà phê Cold Brew đậm đà, mang đến hương thơm lôi cuốn.'
        ],
        [
            'name'        => 'Mojito Việt quất',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '50000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Sự kết hợp sảng khoái giữa lá bạc hà tươi, chanh, đường và nước soda.'
        ],
        [
            'name'        => 'Mojito Thái lan',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '50000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Sự kết hợp sảng khoái giữa lá bạc hà tươi, chanh, đường và nước soda.'
        ],
        [
            'name'        => 'Mojito Cam sả',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '50000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Sự kết hợp sảng khoái giữa lá bạc hà tươi, chanh, đường và nước soda.'
        ],
        [
            'name'        => 'Mojito Trăng khuyết',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '50000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Sự kết hợp sảng khoái giữa lá bạc hà tươi, chanh, đường và nước soda.'
        ],
        [
            'name'        => 'Nước Ngọt (Chai)',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '25000',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Nước ngọt đóng chai dung tích 0.5 lít.'
        ],
        [
            'name'        => 'Nước Ngọt (Lon)',
            'category'    => 11,
            'tax_id'      => 1,
            'price'       => '37500',
            'type'        => ItemType::VEG,
            'featured'    => Ask::YES,
            'caution'     => '',
            'description' => 'Nước ngọt đóng lon dung tích 0.5 lít.'
        ],
    ];

    public function run()
    {
        $envService = new EnvEditor();
        if ($envService->getValue('DEMO')) {
            // 1. Lấy danh sách tất cả các file trong thư mục ảnh seeder
            $imagePath = public_path('/images/seeder/item');
            
            // Kiểm tra xem thư mục có tồn tại không
            $files = File::exists($imagePath) ? File::files($imagePath) : [];
            foreach ($this->items as $item) {
                $itemObject = Item::create([
                    'name'             => $item['name'],
                    'slug'             => Str::slug($item['name']),
                    'item_category_id' => $item['category'],
                    'price'            => $item['price'],
                    'status'           => Status::ACTIVE,
                    'tax_id'           => $item['tax_id'],
                    'item_type'        => $item['type'],
                    'order'            => 1,
                    'is_featured'      => $item['featured'],
                    'caution'          => $item['caution'],
                    'description'      => $item['description']
                ]);
                // 2. Nếu có file trong thư mục, bốc ngẫu nhiên 1 file
                if (count($files) > 0) {
                    // Lấy ngẫu nhiên một đối tượng file
                    $randomFile = $files[array_rand($files)];
                    
                    // Thêm vào media collection
                    $itemObject->addMedia($randomFile->getRealPath())
                            ->preservingOriginal()
                            ->toMediaCollection('item');
                }
            }
        }
    }
}
