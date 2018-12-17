<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Question::create(['text' => 'Как зарегистрироваться?', 'category_question_id' => 1]);
        \App\Models\Question::create(['text' => 'Как войти в личный профиль?', 'category_question_id' => 1]);
        \App\Models\Question::create(['text' => 'Как настроить профиль и магазин?', 'category_question_id' => 1]);
        \App\Models\Question::create(['text' => 'Как редактировать изделие?', 'category_question_id' => 1]);
        \App\Models\Question::create(['text' => 'Что такое мои заказы?', 'category_question_id' => 1]);

        \App\Models\Question::create(['text' => 'Как зарегистрироваться?', 'category_question_id' => 2]);
        \App\Models\Question::create(['text' => 'Как войти в личный профиль?', 'category_question_id' => 2]);
        \App\Models\Question::create(['text' => 'Как настроить личную страницу?', 'category_question_id' => 2]);
        \App\Models\Question::create(['text' => 'Что такое каталог?', 'category_question_id' => 2]);
        \App\Models\Question::create(['text' => 'Как задать вопрос продавцу?', 'category_question_id' => 2]);
        \App\Models\Question::create(['text' => 'Как купить изделие?', 'category_question_id' => 2]);
    }
}
