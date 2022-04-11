<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title'         => 'Младшая мед.сестра в косметологии',
                'category_id'   => 1,
                'description'   => 'Услуги косметологов в настоящее время особенно востребованы: в наше время принято ухаживать за собой, прибегая к помощи профессионалов. Косметолог -подготовленный специалист, знающий секреты правильного ухода за кожей, он отвечает за её красоту и здоровое состояние. Центр дополнительного образования “Орхидея” предлагает программу по курсу медицинской косметологии для слушателей с различными уровнями подготовки.',
                'duration'      => '288 ак. часов',
                'price'         => '52 000',
                'old_price'     => '56 000',
                'credit_info'   => 'Кредит, рассрочка. Идет набор в группу!',
                'medicine_info' => 'Наличие мед. образования',
                'thumb'         => 'https://www.suzan.ru/images/banners/kos-med-orh.jpg',
                'video'         => '',
                'advantages'    => '',
                'program'       => '',
                'program_pdf'   => '',
                'contract_url'  => '',
                'limit_users'   => '',
                'type'          => 'Оффлайн',
            ]
        ];
        
        foreach ($courses as $course)
        {
            Course::create($course);
        }
    }
}