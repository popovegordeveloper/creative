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
        \App\Models\Category::create(['name' => 'Одежда и обувь', 'slug' => \Illuminate\Support\Str::slug('Одежда и обувь')]); //1
        \App\Models\Category::create(['name' => 'Аксессуары', 'slug' => \Illuminate\Support\Str::slug('Аксессуары')]); //2
        \App\Models\Category::create(['name' => 'Детям', 'slug' => \Illuminate\Support\Str::slug('Детям')]); //3
        \App\Models\Category::create(['name' => 'Украшения', 'slug' => \Illuminate\Support\Str::slug('Украшения')]); //4
        \App\Models\Category::create(['name' => 'Для дома', 'slug' => \Illuminate\Support\Str::slug('Для дома')]); //5
        \App\Models\Category::create(['name' => 'Сувениры и подарки', 'slug' => \Illuminate\Support\Str::slug('Сувениры и подарки')]); //6
        \App\Models\Category::create(['name' => 'Куклы и игрушки', 'slug' => \Illuminate\Support\Str::slug('Куклы и игрушки')]); //7
        \App\Models\Category::create(['name' => 'Красота и уход', 'slug' => \Illuminate\Support\Str::slug('Красота и уход')]); //8
        \App\Models\Category::create(['name' => 'Еда', 'slug' => \Illuminate\Support\Str::slug('Еда')]); //9

        \App\Models\Category::create(['name' => 'Мужская одежда', 'parent_category_id' => 1, 'slug' => \Illuminate\Support\Str::slug('Мужская одежда')]); //10
        \App\Models\Category::create(['name' => 'Толстовки и худи', 'parent_category_id' => 10, 'slug' => \Illuminate\Support\Str::slug('Толстовки и худи')]); //11
        \App\Models\Category::create(['name' => 'Костюмы, комплекты', 'parent_category_id' => 10, 'slug' => \Illuminate\Support\Str::slug('Костюмы, комплекты')]); //12
        \App\Models\Category::create(['name' => 'Свитеры', 'parent_category_id' => 10, 'slug' => \Illuminate\Support\Str::slug('Свитеры')]); //13
        \App\Models\Category::create(['name' => 'Верхняя одежда', 'parent_category_id' => 10, 'slug' => \Illuminate\Support\Str::slug('Верхняя одежда')]); //14
        \App\Models\Category::create(['name' => 'Рубашки, футболки', 'parent_category_id' => 10, 'slug' => \Illuminate\Support\Str::slug('Рубашки, футболки')]); //15

        \App\Models\Category::create(['name' => 'Женская одежда', 'parent_category_id' => 1, 'slug' => \Illuminate\Support\Str::slug('Женская одежда')]); //16
        \App\Models\Category::create(['name' => 'Костюмы, комплекты', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Костюмы, комплекты')]); //17
        \App\Models\Category::create(['name' => 'Верхняя одежда', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Верхняя одежда')]); //18
        \App\Models\Category::create(['name' => 'Свитеры', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Свитеры')]); //19
        \App\Models\Category::create(['name' => 'Брюки', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Брюки')]); //20
        \App\Models\Category::create(['name' => 'Толстовки и худи', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Толстовки и худи')]); //21
        \App\Models\Category::create(['name' => 'Шорты', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Шорты')]); //22
        \App\Models\Category::create(['name' => 'Купальники и пляжная одежда', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Купальники и пляжная одежда')]); //23
        \App\Models\Category::create(['name' => 'Спортивная одежда', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Спортивная одежда')]); //24
        \App\Models\Category::create(['name' => 'Платья', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Платья')]); //25
        \App\Models\Category::create(['name' => 'Топы и рубашки', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Топы и рубашки')]); //26
        \App\Models\Category::create(['name' => 'Нижнее бельё', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Нижнее бельё')]); //27
        \App\Models\Category::create(['name' => 'Носки и колготки', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Носки и колготки')]); //28
        \App\Models\Category::create(['name' => 'Одежда для дома', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Одежда для дома')]); //29
        \App\Models\Category::create(['name' => 'Юбки', 'parent_category_id' => 16, 'slug' => \Illuminate\Support\Str::slug('Юбки')]); //30

        \App\Models\Category::create(['name' => 'Обувь', 'parent_category_id' => 1, 'slug' => \Illuminate\Support\Str::slug('Обувь')]); //31
        \App\Models\Category::create(['name' => 'Для детей', 'parent_category_id' => 31, 'slug' => \Illuminate\Support\Str::slug('Для детей')]); //32
        \App\Models\Category::create(['name' => 'Аксессуары для обуви', 'parent_category_id' => 31, 'slug' => \Illuminate\Support\Str::slug('Аксессуары для обуви')]); //33
        \App\Models\Category::create(['name' => 'Для женщин', 'parent_category_id' => 31, 'slug' => \Illuminate\Support\Str::slug('Для женщин')]); //34
        \App\Models\Category::create(['name' => 'Для мужчин', 'parent_category_id' => 31, 'slug' => \Illuminate\Support\Str::slug('Для мужчин')]); //35

        \App\Models\Category::create(['name' => 'Брелоки и ключницы', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Брелоки и ключницы')]); //36
        \App\Models\Category::create(['name' => 'Очки и футляры', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Очки и футляры')]); //37
        \App\Models\Category::create(['name' => 'Головные уборы', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Головные уборы')]); //38
        \App\Models\Category::create(['name' => 'Перчатки, варежки', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Перчатки, варежки')]); //39
        \App\Models\Category::create(['name' => 'Аксессуары для волос', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Аксессуары для волос')]); //40
        \App\Models\Category::create(['name' => 'Пояса, ремни', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Пояса, ремни')]); //41
        \App\Models\Category::create(['name' => 'Нашивки и значки', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Нашивки и значки')]); //42
        \App\Models\Category::create(['name' => 'Галстуки, бабочки', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Галстуки, бабочки')]); //43
        \App\Models\Category::create(['name' => 'Другое', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Другое')]); //44
        \App\Models\Category::create(['name' => 'Часы', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Часы')]); //45
        \App\Models\Category::create(['name' => 'Свадебные аксессуары', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Свадебные аксессуары')]); //46
        \App\Models\Category::create(['name' => 'Сумки, рюкзаки', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Сумки, рюкзаки')]); //47
        \App\Models\Category::create(['name' => 'Шарфы, палантины', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Шарфы, палантины')]); //48
        \App\Models\Category::create(['name' => 'Кошельки', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Кошельки')]); //49
        \App\Models\Category::create(['name' => 'Носки, чулки', 'parent_category_id' => 2, 'slug' => \Illuminate\Support\Str::slug('Носки, чулки')]); //50

        \App\Models\Category::create(['name' => 'Одежда для новорожденных', 'parent_category_id' => 3, 'slug' => \Illuminate\Support\Str::slug('Одежда для новорожденных')]); //51
        \App\Models\Category::create(['name' => 'Детская обувь', 'parent_category_id' => 3, 'slug' => \Illuminate\Support\Str::slug('Детская обувь')]); //52
        \App\Models\Category::create(['name' => 'Аксессуары', 'parent_category_id' => 3, 'slug' => \Illuminate\Support\Str::slug('Аксессуары')]); //53
        \App\Models\Category::create(['name' => 'Одежда для девочек', 'parent_category_id' => 3, 'slug' => \Illuminate\Support\Str::slug('Одежда для девочек')]); //54
        \App\Models\Category::create(['name' => 'Одежда для мальчиков', 'parent_category_id' => 3, 'slug' => \Illuminate\Support\Str::slug('Одежда для мальчиков')]); //55

        \App\Models\Category::create(['name' => 'Броши', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Броши')]); //56
        \App\Models\Category::create(['name' => 'Украшения на шею', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Украшения на шею')]); //57
        \App\Models\Category::create(['name' => 'Украшения для волос', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Украшения для волос')]); //58
        \App\Models\Category::create(['name' => 'Кольца', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Кольца')]); //59
        \App\Models\Category::create(['name' => 'Браслеты', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Браслеты')]); //60
        \App\Models\Category::create(['name' => 'Запонки, зажимы', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Запонки, зажимы')]); //61
        \App\Models\Category::create(['name' => 'Хранение украшений', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Хранение украшений')]); //62
        \App\Models\Category::create(['name' => 'Серьги', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Серьги')]); //63
        \App\Models\Category::create(['name' => 'Комплекты', 'parent_category_id' => 4, 'slug' => \Illuminate\Support\Str::slug('Комплекты')]); //64

        \App\Models\Category::create(['name' => 'Другое', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Другое')]); //65
        \App\Models\Category::create(['name' => 'Для сада', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Для сада')]); //66
        \App\Models\Category::create(['name' => 'Аксессуары для электроники', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Аксессуары для электроники')]); //67
        \App\Models\Category::create(['name' => 'Канцелярские товары', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Канцелярские товары')]); //68
        \App\Models\Category::create(['name' => 'Цветы и флористика', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Цветы и флористика')]); //69
        \App\Models\Category::create(['name' => 'Домашний текстиль, рукоделие', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Домашний текстиль, рукоделие')]); //70
        \App\Models\Category::create(['name' => 'Посуда', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Посуда')]); //71
        \App\Models\Category::create(['name' => 'Мебель', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Мебель')]); //72
        \App\Models\Category::create(['name' => 'Свет', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Свет')]); //73
        \App\Models\Category::create(['name' => 'Кухня', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Кухня')]); //74
        \App\Models\Category::create(['name' => 'Детская комната', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Детская комната')]); //75
        \App\Models\Category::create(['name' => 'Декор для дома', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Декор для дома')]); //76
        \App\Models\Category::create(['name' => 'Ванная комната', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Ванная комната')]); //77
        \App\Models\Category::create(['name' => 'Прихожая', 'parent_category_id' => 5, 'slug' => \Illuminate\Support\Str::slug('Прихожая')]); //78

        \App\Models\Category::create(['name' => 'Подарочные наборы', 'parent_category_id' => 6, 'slug' => \Illuminate\Support\Str::slug('Подарочные наборы')]); //78
        \App\Models\Category::create(['name' => 'Оружие', 'parent_category_id' => 6, 'slug' => \Illuminate\Support\Str::slug('Оружие')]); //79
        \App\Models\Category::create(['name' => 'Другое', 'parent_category_id' => 6, 'slug' => \Illuminate\Support\Str::slug('Другое')]); //80
        \App\Models\Category::create(['name' => 'Игры, развлечения, спорт', 'parent_category_id' => 6, 'slug' => \Illuminate\Support\Str::slug('Игры, развлечения, спорт')]); //81
        \App\Models\Category::create(['name' => 'Аксессуары для фотосессий', 'parent_category_id' => 6, 'slug' => \Illuminate\Support\Str::slug('Аксессуары для фотосессий')]); //82
        \App\Models\Category::create(['name' => 'Аксессуары для праздника', 'parent_category_id' => 6, 'slug' => \Illuminate\Support\Str::slug('Аксессуары для праздника')]); //83
        \App\Models\Category::create(['name' => 'Открытки', 'parent_category_id' => 6, 'slug' => \Illuminate\Support\Str::slug('Открытки')]); //84

        \App\Models\Category::create(['name' => 'Игрушки животные', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Игрушки животные')]); //85
        \App\Models\Category::create(['name' => 'Сказочные персонажи', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Сказочные персонажи')]); //86
        \App\Models\Category::create(['name' => 'Развивающие игрушки', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Развивающие игрушки')]); //87
        \App\Models\Category::create(['name' => 'Куклы Тильды', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Куклы Тильды')]); //88
        \App\Models\Category::create(['name' => 'Ароматизированные куклы', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Ароматизированные куклы')]); //89
        \App\Models\Category::create(['name' => 'Портретные куклы', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Портретные куклы')]); //90
        \App\Models\Category::create(['name' => 'Народные куклы', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Народные куклы')]); //91
        \App\Models\Category::create(['name' => 'Кукольный театр', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Кукольный театр')]); //92
        \App\Models\Category::create(['name' => 'Куклы тыквоголовки', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Куклы тыквоголовки')]); //93
        \App\Models\Category::create(['name' => 'Миниатюра', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Миниатюра')]); //94
        \App\Models\Category::create(['name' => 'Человечки', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Человечки')]); //95
        \App\Models\Category::create(['name' => 'Техника', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Техника')]); //96
        \App\Models\Category::create(['name' => 'Коллекционные куклы', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Коллекционные куклы')]); //97
        \App\Models\Category::create(['name' => 'Кукольный дом', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Кукольный дом')]); //98
        \App\Models\Category::create(['name' => 'Мишки Тедди', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Мишки Тедди')]); //99
        \App\Models\Category::create(['name' => 'Одежда для кукол', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Одежда для кукол')]); //100
        \App\Models\Category::create(['name' => 'Куклы-младенцы', 'parent_category_id' => 7, 'slug' => \Illuminate\Support\Str::slug('Куклы-младенцы')]); //101

        \App\Models\Category::create(['name' => 'Хранение косметики', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Хранение косметики')]); //102
        \App\Models\Category::create(['name' => 'Уход за телом', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Уход за телом')]); //103
        \App\Models\Category::create(['name' => 'Парфюмерия', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Парфюмерия')]); //104
        \App\Models\Category::create(['name' => 'Декоративная косметика', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Декоративная косметика')]); //105
        \App\Models\Category::create(['name' => 'Уход за детьми', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Уход за детьми')]); //106
        \App\Models\Category::create(['name' => 'Косметика', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Косметика')]); //107
        \App\Models\Category::create(['name' => 'Уход за лицом', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Уход за лицом')]); //108
        \App\Models\Category::create(['name' => 'Уход за волосами', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Уход за волосами')]); //109
        \App\Models\Category::create(['name' => 'Товары для душа', 'parent_category_id' => 8, 'slug' => \Illuminate\Support\Str::slug('Товары для душа')]); //110

        \App\Models\Category::create(['name' => 'Десерты', 'parent_category_id' => 9, 'slug' => \Illuminate\Support\Str::slug('Десерты')]); //111
        \App\Models\Category::create(['name' => 'Приправы и соусы', 'parent_category_id' => 9, 'slug' => \Illuminate\Support\Str::slug('\'Приправы и соусы')]); //112
        \App\Models\Category::create(['name' => 'Кулинария', 'parent_category_id' => 9, 'slug' => \Illuminate\Support\Str::slug('Кулинария')]); //113
        \App\Models\Category::create(['name' => 'Мёд', 'parent_category_id' => 9, 'slug' => \Illuminate\Support\Str::slug('Мёд')]); //114
        \App\Models\Category::create(['name' => 'Снеки', 'parent_category_id' => 9, 'slug' => \Illuminate\Support\Str::slug('Снеки')]); //115
        \App\Models\Category::create(['name' => 'Напитки', 'parent_category_id' => 9, 'slug' => \Illuminate\Support\Str::slug('Напитки')]); //116
    }
}
