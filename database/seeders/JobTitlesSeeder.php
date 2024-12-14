<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_titles')->truncate();
        DB::table('job_titles')->insert([
            ['name_en' => 'All', 'name_ar' => 'الكل'],
            ['name_en' => 'Islamic Education', 'name_ar' => 'تربية اسلامية'],
            ['name_en' => 'Arabic Language', 'name_ar' => 'لغة عربية'],
            ['name_en' => 'English Language', 'name_ar' => 'لغة انجليزية'],
            ['name_en' => 'Jordan History', 'name_ar' => 'تاريخ الأردن'],
            ['name_en' => 'Mathematics', 'name_ar' => 'رياضيات'],
            ['name_en' => 'Physics', 'name_ar' => 'فيزياء'],
            ['name_en' => 'Chemistry', 'name_ar' => 'كيمياء'],
            ['name_en' => 'Biology', 'name_ar' => 'أحياء'],
            ['name_en' => 'Earth Science', 'name_ar' => 'علوم أرض'],
            ['name_en' => 'General Science', 'name_ar' => 'علوم عامة'],
            ['name_en' => 'Computer Science', 'name_ar' => 'حاسوب'],
            ['name_en' => 'Vocational Education', 'name_ar' => 'تربية مهنية'],
            ['name_en' => 'Art Education', 'name_ar' => 'تربية فنية'],
            ['name_en' => 'Secretary', 'name_ar' => 'سكرتاريا'],
            ['name_en' => 'Administrative Assistant', 'name_ar' => 'مساعد / مساعدة إداري'],
            ['name_en' => 'Floor Supervisor', 'name_ar' => 'مشرف / مشرفة طابق'],
            ['name_en' => 'Principal', 'name_ar' => 'مدير / مديرة'],
            ['name_en' => 'Data Entry', 'name_ar' => 'ادخال بيانات'],
            ['name_en' => 'Accountant', 'name_ar' => 'محاسب'],
            ['name_en' => 'Human Resources', 'name_ar' => 'موارد بشرية'],
            ['name_en' => 'Drivers', 'name_ar' => 'سائقين'],
            ['name_en' => 'Bus Escort', 'name_ar' => 'مرافقة باص'],
            ['name_en' => 'Cleaning Staff', 'name_ar' => 'عاملات نظافة'],
            ['name_en' => 'Math', 'name_ar' => 'Math'],
            ['name_en' => 'Science', 'name_ar' => 'Science'],
            ['name_en' => 'French', 'name_ar' => 'فرنسي'],
            ['name_en' => 'Quran Memorization', 'name_ar' => 'تحفيظ القرآن الكريم'],
            ['name_en' => 'Class Teacher', 'name_ar' => 'معلم صف'],
            ['name_en' => 'Child Education', 'name_ar' => 'تربية طفل'],
            ['name_en' => 'Guidance Counselor', 'name_ar' => 'مرشد / مرشدة'],
            ['name_en' => 'Physical Education', 'name_ar' => 'تربية رياضية'],
            ['name_en' => 'Librarian', 'name_ar' => 'مكتبات'],
            ['name_en' => 'Financial Literacy', 'name_ar' => 'ثقافة مالية'],
            ['name_en' => 'Nursing', 'name_ar' => 'تمريض'],
            ['name_en' => 'Graphic Design', 'name_ar' => 'جرافيك ديزاين'],
            ['name_en' => 'Pharmacy', 'name_ar' => 'صيدلة'],
            ['name_en' => 'Architectural Engineering', 'name_ar' => 'هندسة معمارية'],
            ['name_en' => 'Civil Engineering', 'name_ar' => 'هندسة مدنية'],
            ['name_en' => 'Energy Engineering', 'name_ar' => 'هندسة طاقة'],
            ['name_en' => 'Industrial Engineering', 'name_ar' => 'هندسة صناعية'],
            ['name_en' => 'Computer Engineering', 'name_ar' => 'هندسة حاسوب'],
            ['name_en' => 'Software Engineering', 'name_ar' => 'هندسة برمجيات'],
            ['name_en' => 'Mechatronics Engineering', 'name_ar' => 'هندسة ميكاترونيكس'],
            ['name_en' => 'Autotronics Engineering', 'name_ar' => 'هندسة اوتوترونيكس'],
            ['name_en' => 'Geography', 'name_ar' => 'جغرافيا'],
            ['name_en' => 'Social Studies', 'name_ar' => 'اجتماعيات'],
            ['name_en' => 'Information Technology', 'name_ar' => 'تكنولوجيا معلومات'],
            ['name_en' => 'Learning Disabilities', 'name_ar' => 'صعوبات تعلم'],
            ['name_en' => 'Music', 'name_ar' => 'موسيقى'],
            ['name_en' => 'Head of Department', 'name_ar' => 'رئيس قسم'],
            ['name_en' => 'Laboratory Technician', 'name_ar' => 'فني مختبر'],
            ['name_en' => 'Admissions and Registration', 'name_ar' => 'القبول والتسجيل'],
            ['name_en' => 'Special Education', 'name_ar' => 'تربية خاصة'],
            ['name_en' => 'Telecommunications Engineering', 'name_ar' => 'هندسة اتصالات'],
            ['name_en' => 'Guidance and Mental Health', 'name_ar' => 'الارشاد والصحة النفسية'],
            ['name_en' => 'Supervisor', 'name_ar' => 'مشرفة'],
            ['name_en' => 'Class Teacher', 'name_ar' => 'معلم صف'],
            ['name_en' => 'Bus Escort', 'name_ar' => 'مرافقة باص'],
            ['name_en' => 'Receptionist', 'name_ar' => 'استقبال'],
            ['name_en' => 'School Principal', 'name_ar' => 'مدير مدرسة'],
            ['name_en' => 'Secretary', 'name_ar' => 'سكرتاريا'],
            ['name_en' => 'Telecommunications Engineering', 'name_ar' => 'هندسة اتصالات'],
            ['name_en' => 'Kindergarten Teacher', 'name_ar' => 'معلمة رياض اطفال'],
        ]);
    }
}

