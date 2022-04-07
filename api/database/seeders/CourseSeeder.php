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
                'title'                => 'Младшая мед.сестра в косметологии',
                'slug'                 => 'kurs-kosmetologii-s-med-obrazovaniem',
                'category_id'          => 1,
                'course_description'   => 'Услуги косметологов в настоящее время особенно востребованы: в наше время принято ухаживать за собой, прибегая к помощи профессионалов. Косметолог -подготовленный специалист, знающий секреты правильного ухода за кожей, он отвечает за её красоту и здоровое состояние. Центр дополнительного образования “Орхидея” предлагает программу по курсу медицинской косметологии для слушателей с различными уровнями подготовки.',
                'course_duration'      => '288 ак. часов',
                'course_price'         => '52 000',
                'course_old_price'     => '56 000',
                'course_credit_info'   => 'Кредит, рассрочка. Идет набор в группу!',
                'course_medicine_info' => 'Наличие мед. образования',
                'course_thumb'         => 'https://www.suzan.ru/images/banners/kos-med-orh.jpg',
                'course_video'         => '',
                'advantages'           => '',
                'course_program'       => '',
                'course_program_pdf'   => '',
                'course_contract_url'  => '',
                'limit_users'          => '',
                'course_type'          => ''
            ]
        ];
        
        foreach ($courses as $course)
        {
            Course::create($course);
        }
    }
}