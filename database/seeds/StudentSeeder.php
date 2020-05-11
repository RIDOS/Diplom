<?php

use Illuminate\Database\Seeder;
use App\students;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        students::truncate();
        students::create([
            'userId' => '2',
            'studentName' => 'Гузаиров Рамиль Андреевич',
            'typeOfLearning' => 'Комерция',
            'progress' => '',
            'img' => '-',
            'portfolio' => '',
            'yearGraduation' => '2020-02-02',
        ]);

        students::create([
            'userId' => '4',
            'studentName' => 'Шляпин Павел Иванович',
            'typeOfLearning' => 'Комерция',
            'progress' => '',
            'img' => '-',
            'portfolio' => '',
            'yearGraduation' => '2020-02-02',
        ]);

        students::create([
            'userId' => '5',
            'studentName' => 'Валеева Гульсум Ганиева',
            'typeOfLearning' => 'Бюджет',
            'progress' => '',
            'img' => '-',
            'portfolio' => '',
            'yearGraduation' => '2020-02-02',
        ]);
    }
}
