<?php

use Illuminate\Database\Seeder;
use App\Specialties;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialties::truncate();

        Specialties::create(['specialtiCode'=>'05.00.00', 'specialtiName'=>'Науки о Земле']);
        Specialties::create(['specialtiCode'=>'05.01.01', 'specialtiName'=>'Гидрометнаблюдатель']);
        Specialties::create(['specialtiCode'=>'08.00.00', 'specialtiName'=>'Техника и технологии строительства']);
        Specialties::create(['specialtiCode'=>'08.01.01', 'specialtiName'=>'Изготовитель арматурных сеток и каркасов']);
        Specialties::create(['specialtiCode'=>'08.01.02', 'specialtiName'=>'Монтажник трубопроводов']);
        Specialties::create(['specialtiCode'=>'08.01.03', 'specialtiName'=>'Трубоклад']);
        Specialties::create(['specialtiCode'=>'08.01.04', 'specialtiName'=>'Кровельщик']);
        Specialties::create(['specialtiCode'=>'09.00.00', 'specialtiName'=>'Информатика и вычислительная техника']);
        Specialties::create(['specialtiCode'=>'09.01.01', 'specialtiName'=>'Наладчик аппаратного и программного обеспечения']);
        Specialties::create(['specialtiCode'=>'09.01.02', 'specialtiName'=>'Наладчик компьютерных сетей']);
        Specialties::create(['specialtiCode'=>'09.01.03', 'specialtiName'=>'Мастер по обработке цифровой информации']);
        Specialties::create(['specialtiCode'=>'11.00.00', 'specialtiName'=>'Электроника, радиотехника и системы связи']);
        Specialties::create(['specialtiCode'=>'11.01.01', 'specialtiName'=>'Монтажник радиоэлектронной аппаратуры и приборов']);
        Specialties::create(['specialtiCode'=>'09.02.01', 'specialtiName'=>'Компьютерные системы и комплексы']);
        Specialties::create(['specialtiCode'=>'09.02.02', 'specialtiName'=>'Компьютерные сети']);
        Specialties::create(['specialtiCode'=>'09.02.03', 'specialtiName'=>'Программирование в компьютерных системах']);
    }
}
