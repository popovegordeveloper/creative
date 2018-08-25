<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create(['name' => 'Одежда и обувь']); //1
        \App\Models\Category::create(['name' => 'Аксессуары']); //2
        \App\Models\Category::create(['name' => 'Детям']); //3
        \App\Models\Category::create(['name' => 'Украшения']); //4
        \App\Models\Category::create(['name' => 'Для дома']); //5
        \App\Models\Category::create(['name' => 'Сувениры и подарки']); //6
        \App\Models\Category::create(['name' => 'Куклы и игрушки']); //7
        \App\Models\Category::create(['name' => 'Красота и уход']); //8
        \App\Models\Category::create(['name' => 'Еда']); //9

        \App\Models\Category::create(['name' => 'Мужская одежда', 'parent_category_id' => 1]); //10
        \App\Models\Category::create(['name' => 'Толстовки и худи', 'parent_category_id' => 10]); //11
        \App\Models\Category::create(['name' => 'Костюмы, комплекты', 'parent_category_id' => 10]); //12
        \App\Models\Category::create(['name' => 'Свитеры', 'parent_category_id' => 10]); //13
        \App\Models\Category::create(['name' => 'Верхняя одежда', 'parent_category_id' => 10]); //14
        \App\Models\Category::create(['name' => 'Рубашки, футболки', 'parent_category_id' => 10]); //15

        \App\Models\Category::create(['name' => 'Женская одежда', 'parent_category_id' => 1]); //16
        \App\Models\Category::create(['name' => 'Костюмы, комплекты', 'parent_category_id' => 16]); //17
        \App\Models\Category::create(['name' => 'Верхняя одежда', 'parent_category_id' => 16]); //18
        \App\Models\Category::create(['name' => 'Свитеры', 'parent_category_id' => 16]); //19
        \App\Models\Category::create(['name' => 'Брюки', 'parent_category_id' => 16]); //20
        \App\Models\Category::create(['name' => 'Толстовки и худи', 'parent_category_id' => 16]); //21
        \App\Models\Category::create(['name' => 'Шорты', 'parent_category_id' => 16]); //22
        \App\Models\Category::create(['name' => 'Купальники и пляжная одежда', 'parent_category_id' => 16]); //23
        \App\Models\Category::create(['name' => 'Спортивная одежда', 'parent_category_id' => 16]); //24
        \App\Models\Category::create(['name' => 'Платья', 'parent_category_id' => 16]); //25
        \App\Models\Category::create(['name' => 'Топы и рубашки', 'parent_category_id' => 16]); //26
        \App\Models\Category::create(['name' => 'Нижнее бельё', 'parent_category_id' => 16]); //27
        \App\Models\Category::create(['name' => 'Носки и колготки', 'parent_category_id' => 16]); //28
        \App\Models\Category::create(['name' => 'Одежда для дома', 'parent_category_id' => 16]); //29
        \App\Models\Category::create(['name' => 'Юбки', 'parent_category_id' => 16]); //30

        \App\Models\Category::create(['name' => 'Обувь', 'parent_category_id' => 1]); //31
        \App\Models\Category::create(['name' => 'Для детей', 'parent_category_id' => 31]); //32
        \App\Models\Category::create(['name' => 'Аксессуары для обуви', 'parent_category_id' => 31]); //33
        \App\Models\Category::create(['name' => 'Для женщин', 'parent_category_id' => 31]); //34
        \App\Models\Category::create(['name' => 'Для мужчин', 'parent_category_id' => 31]); //35

        \App\Models\Category::create(['name' => 'Брелоки и ключницы', 'parent_category_id' => 2]); //36
        \App\Models\Category::create(['name' => 'Очки и футляры', 'parent_category_id' => 2]); //37
        \App\Models\Category::create(['name' => 'Головные уборы', 'parent_category_id' => 2]); //38
        \App\Models\Category::create(['name' => 'Перчатки, варежки', 'parent_category_id' => 2]); //39
        \App\Models\Category::create(['name' => 'Аксессуары для волос', 'parent_category_id' => 2]); //40
        \App\Models\Category::create(['name' => 'Пояса, ремни', 'parent_category_id' => 2]); //41
        \App\Models\Category::create(['name' => 'Нашивки и значки', 'parent_category_id' => 2]); //42
        \App\Models\Category::create(['name' => 'Галстуки, бабочки', 'parent_category_id' => 2]); //43
        \App\Models\Category::create(['name' => 'Другое', 'parent_category_id' => 2]); //44
        \App\Models\Category::create(['name' => 'Часы', 'parent_category_id' => 2]); //45
        \App\Models\Category::create(['name' => 'Свадебные аксессуары', 'parent_category_id' => 2]); //46
        \App\Models\Category::create(['name' => 'Сумки, рюкзаки', 'parent_category_id' => 2]); //47
        \App\Models\Category::create(['name' => 'Шарфы, палантины', 'parent_category_id' => 2]); //48
        \App\Models\Category::create(['name' => 'Кошельки', 'parent_category_id' => 2]); //49
        \App\Models\Category::create(['name' => 'Носки, чулки', 'parent_category_id' => 2]); //50

        \App\Models\Category::create(['name' => 'Одежда для новорожденных', 'parent_category_id' => 3]); //51
        \App\Models\Category::create(['name' => 'Детская обувь', 'parent_category_id' => 3]); //52
        \App\Models\Category::create(['name' => 'Аксессуары', 'parent_category_id' => 3]); //53
        \App\Models\Category::create(['name' => 'Одежда для девочек', 'parent_category_id' => 3]); //54
        \App\Models\Category::create(['name' => 'Одежда для мальчиков', 'parent_category_id' => 3]); //55

        \App\Models\Category::create(['name' => 'Броши', 'parent_category_id' => 4]); //56
        \App\Models\Category::create(['name' => 'Украшения на шею', 'parent_category_id' => 4]); //57
        \App\Models\Category::create(['name' => 'Украшения для волос', 'parent_category_id' => 4]); //58
        \App\Models\Category::create(['name' => 'Кольца', 'parent_category_id' => 4]); //59
        \App\Models\Category::create(['name' => 'Браслеты', 'parent_category_id' => 4]); //60
        \App\Models\Category::create(['name' => 'Запонки, зажимы', 'parent_category_id' => 4]); //61
        \App\Models\Category::create(['name' => 'Хранение украшений', 'parent_category_id' => 4]); //62
        \App\Models\Category::create(['name' => 'Серьги', 'parent_category_id' => 4]); //63
        \App\Models\Category::create(['name' => 'Комплекты', 'parent_category_id' => 4]); //64

        \App\Models\Category::create(['name' => 'Другое', 'parent_category_id' => 5]); //65
        \App\Models\Category::create(['name' => 'Для сада', 'parent_category_id' => 5]); //66
        \App\Models\Category::create(['name' => 'Аксессуары для электроники', 'parent_category_id' => 5]); //67
        \App\Models\Category::create(['name' => 'Канцелярские товары', 'parent_category_id' => 5]); //68
        \App\Models\Category::create(['name' => 'Цветы и флористика', 'parent_category_id' => 5]); //69
        \App\Models\Category::create(['name' => 'Домашний текстиль, рукоделие', 'parent_category_id' => 5]); //70
        \App\Models\Category::create(['name' => 'Посуда', 'parent_category_id' => 5]); //71
        \App\Models\Category::create(['name' => 'Мебель', 'parent_category_id' => 5]); //72
        \App\Models\Category::create(['name' => 'Свет', 'parent_category_id' => 5]); //73
        \App\Models\Category::create(['name' => 'Кухня', 'parent_category_id' => 5]); //74
        \App\Models\Category::create(['name' => 'Детская комната', 'parent_category_id' => 5]); //75
        \App\Models\Category::create(['name' => 'Декор для дома', 'parent_category_id' => 5]); //76
        \App\Models\Category::create(['name' => 'Ванная комната', 'parent_category_id' => 5]); //77
        \App\Models\Category::create(['name' => 'Прихожая', 'parent_category_id' => 5]); //78

        \App\Models\Category::create(['name' => 'Подарочные наборы', 'parent_category_id' => 6]); //78
        \App\Models\Category::create(['name' => 'Оружие', 'parent_category_id' => 6]); //79
        \App\Models\Category::create(['name' => 'Другое', 'parent_category_id' => 6]); //80
        \App\Models\Category::create(['name' => 'Игры, развлечения, спорт', 'parent_category_id' => 6]); //81
        \App\Models\Category::create(['name' => 'Аксессуары для фотосессий', 'parent_category_id' => 6]); //82
        \App\Models\Category::create(['name' => 'Аксессуары для праздника', 'parent_category_id' => 6]); //83
        \App\Models\Category::create(['name' => 'Открытки', 'parent_category_id' => 6]); //84

        \App\Models\Category::create(['name' => 'Игрушки животные', 'parent_category_id' => 7]); //85
        \App\Models\Category::create(['name' => 'Сказочные персонажи', 'parent_category_id' => 7]); //86
        \App\Models\Category::create(['name' => 'Развивающие игрушки', 'parent_category_id' => 7]); //87
        \App\Models\Category::create(['name' => 'Куклы Тильды', 'parent_category_id' => 7]); //88
        \App\Models\Category::create(['name' => 'Ароматизированные куклы', 'parent_category_id' => 7]); //89
        \App\Models\Category::create(['name' => 'Портретные куклы', 'parent_category_id' => 7]); //90
        \App\Models\Category::create(['name' => 'Народные куклы', 'parent_category_id' => 7]); //91
        \App\Models\Category::create(['name' => 'Кукольный театр', 'parent_category_id' => 7]); //92
        \App\Models\Category::create(['name' => 'Куклы тыквоголовки', 'parent_category_id' => 7]); //93
        \App\Models\Category::create(['name' => 'Миниатюра', 'parent_category_id' => 7]); //94
        \App\Models\Category::create(['name' => 'Человечки', 'parent_category_id' => 7]); //95
        \App\Models\Category::create(['name' => 'Техника', 'parent_category_id' => 7]); //96
        \App\Models\Category::create(['name' => 'Коллекционные куклы', 'parent_category_id' => 7]); //97
        \App\Models\Category::create(['name' => 'Кукольный дом', 'parent_category_id' => 7]); //98
        \App\Models\Category::create(['name' => 'Мишки Тедди', 'parent_category_id' => 7]); //99
        \App\Models\Category::create(['name' => 'Одежда для кукол', 'parent_category_id' => 7]); //100
        \App\Models\Category::create(['name' => 'Куклы-младенцы', 'parent_category_id' => 7]); //101

        \App\Models\Category::create(['name' => 'Хранение косметики', 'parent_category_id' => 8]); //102
        \App\Models\Category::create(['name' => 'Уход за телом', 'parent_category_id' => 8]); //103
        \App\Models\Category::create(['name' => 'Парфюмерия', 'parent_category_id' => 8]); //104
        \App\Models\Category::create(['name' => 'Декоративная косметика', 'parent_category_id' => 8]); //105
        \App\Models\Category::create(['name' => 'Уход за детьми', 'parent_category_id' => 8]); //106
        \App\Models\Category::create(['name' => 'Косметика', 'parent_category_id' => 8]); //107
        \App\Models\Category::create(['name' => 'Уход за лицом', 'parent_category_id' => 8]); //108
        \App\Models\Category::create(['name' => 'Уход за волосами', 'parent_category_id' => 8]); //109
        \App\Models\Category::create(['name' => 'Товары для душа', 'parent_category_id' => 8]); //110

        \App\Models\Category::create(['name' => 'Десерты', 'parent_category_id' => 9]); //111
        \App\Models\Category::create(['name' => 'Приправы и соусы', 'parent_category_id' => 9]); //112
        \App\Models\Category::create(['name' => 'Кулинария', 'parent_category_id' => 9]); //113
        \App\Models\Category::create(['name' => 'Мёд', 'parent_category_id' => 9]); //114
        \App\Models\Category::create(['name' => 'Снеки', 'parent_category_id' => 9]); //115
        \App\Models\Category::create(['name' => 'Напитки', 'parent_category_id' => 9]); //116
    }
}
