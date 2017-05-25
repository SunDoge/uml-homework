<?php

use Illuminate\Database\Seeder;
use Faker\Generator;

class UmlHomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Member::truncate();
        App\Movie::truncate();
        App\Session::truncate();

        DB::table('members')->insert([
            'id' => 2013,
            'account' => 'user',
            'password' => bcrypt('12345'),
            'nickname' => 'doger',
            'sex' => 'm',
            'email' => 'user@scut.com',
            'phone' => '1230000',
            'address' => 'C10',
        ]);

        $_movies = [
            ['X战警：逆转未来', '布莱恩·辛格', '休·杰克曼 迈克尔·法斯宾德', 120, 129, '动作/科幻', '故事的设定发生在当下，变种人族群遭到了前所未有的毁灭性打击，而这一切的根源是“魔形女”瑞文。。。。', '略'],
            ['澳门风云', '王晶', '周润发/谢霆锋/杜汶泽', 90, 93, '喜剧/动作', '影片讲述的是外号“赢尽天下无敌手”的石一坚和他的朋友家人一起布下并利用局从犯罪集团的手中逃脱的故事', '略'],
            ['冰雪奇缘', '克里斯·巴克', '克里斯汀·贝尔/伊迪娜·门泽尔', 100, 102, '动画/冒险', '影片讲述一个严冬咒语令王国被冰天雪地永久覆盖，安娜和山民克里斯托夫以及他的驯鹿搭档组队出发，为寻找姐姐拯救王国展开一段冒险', '略'],
            ['超凡蜘蛛侠2', '马克·韦布', '安德鲁·加菲尔德/艾玛·斯通', 120, 142, '科幻/奇幻', '影片讲述了彼得·帕克的生活依然很忙，而格温毕业后考虑去牛津大学继续深造。“电光人”出现后，彼得的生活更不得安宁、、、', '略'],
            ['催眠大师', '陈正道', '徐峥/莫文蔚', 90, 102, '剧情/悬疑', '影片讲述了知名心理治疗师徐瑞宁和棘手的女病人任小妍之间发生的故事。', '略'],
            ['终结者：创世纪', '阿兰·泰勒', '艾米莉亚·克拉克/杰·科特尼', 100, 130, '动作/科幻', '超级电脑“天网”阻止人类抵抗领袖John Connor诞生的行动失败，时隔13年后，在“审判日”到来之前。。。', '略'],
            ['人再囧途之泰囧', '徐峥', '徐峥/王宝强/黄渤', 100, 105, '喜剧', '商业成功人士徐朗用了五年时间发明了一种叫“油霸”的神奇产品\',\'商业成功人士徐朗用了五年时间发明了一种叫“油霸”的神奇产品、、', '略'],
            ['夏日大作战', '细田守', '神木隆之介/谷村美月', 120, 114, '喜剧/动画', '高中生小矶健二夏日的一天，他应邀来到美丽的学姐——阵内夏希的家乡打工。结果发现。。。', '略']
        ];

        $keys = [
            'name',
            'director',
            'stars',
            'price',
            'runtime',
            'genres',
            'summary',
            'post',
        ];

        $movies = [];

        foreach ($_movies as $i => $movie) {
            $movies[] = [
                $keys[0] => $movie[0],
                $keys[1] => $movie[1],
                $keys[2] => $movie[2],
                $keys[3] => $movie[3],
                $keys[4] => $movie[4],
                $keys[5] => $movie[5],
                $keys[6] => $movie[6],
                $keys[7] => $movie[7],
            ];
        }
//        dd($movies);
        DB::table('movies')->insert($movies);
//        foreach ($_movies as $movie) {
//            DB::table('movies')->insert($movie);
//        }

        factory(App\Session::class, 50)->create();

        $sessions = \App\Session::all();

        foreach ($sessions as $session) {
            $ticket = new \App\Ticket();
            for ($r = 1; $r <= 5; $r++) {
                for ($c = 1; $c <= 8; $c++) {
                    $ticket->session_id = $session->id;
                    $ticket->seat = ['r' => $r, 'c' => $c];
                    $ticket->save();
                }
            }
        }
    }
}
