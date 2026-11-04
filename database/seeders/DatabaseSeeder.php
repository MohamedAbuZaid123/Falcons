<?php

namespace Database\Seeders;
use \App\Models\admin\User;
use \App\Models\Project;
use \App\Models\Services;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $faker = Faker::create();


            User::create([
                'name' => 'Test User',
                'email' => 'Test@email.com',
                'mobile' => '01002003000',
                'email_verified_at' => now(),
                'active' => $faker->boolean(),
                'password' => Hash::make('password'), // or bcrypt('password')
                'remember_token' => Str::random(10),
            ]);

        // // Add 4 dummy FAQ entries for Three Falcons project
        // \App\Models\admin\Faq::insert([
        //     [
        //         'question' => 'What services does Three Falcons offer?',
        //         'answer' => 'Three Falcons provides a wide range of digital solutions including web development, mobile app development, UI/UX design, and digital marketing to help businesses grow online.',
        //         'question_ar' => 'ما هي الخدمات التي تقدمها Three Falcons؟',
        //         'answer_ar' => 'تقدم Three Falcons مجموعة واسعة من الحلول الرقمية بما في ذلك تطوير المواقع والتطبيقات وتصميم واجهات المستخدم والتسويق الرقمي لمساعدة الشركات على النمو عبر الإنترنت.',
        //     ],
        //     [
        //         'question' => 'How can I contact Three Falcons for a project inquiry?',
        //         'answer' => 'You can reach out to us through the Contact Us page on our website, or email us directly at info@Three Falcons.com. We aim to respond to all inquiries within 24 hours.',
        //         'question_ar' => 'كيف يمكنني التواصل مع Three Falcons للاستفسار عن مشروع؟',
        //         'answer_ar' => 'يمكنك التواصل معنا من خلال صفحة اتصل بنا على موقعنا أو عبر البريد الإلكتروني info@Three Falcons.com. نسعى للرد على جميع الاستفسارات خلال 24 ساعة.',
        //     ],
        //     [
        //         'question' => 'Does Three Falcons provide support after project delivery?',
        //         'answer' => 'Yes, Three Falcons offers ongoing support and maintenance packages to ensure your project continues to run smoothly after launch.',
        //         'question_ar' => 'هل تقدم Three Falcons الدعم بعد تسليم المشروع؟',
        //         'answer_ar' => 'نعم، تقدم Three Falcons باقات دعم وصيانة مستمرة لضمان استمرار عمل مشروعك بسلاسة بعد الإطلاق.',
        //     ],
        //     [
        //         'question' => 'Can Three Falcons help with branding and design?',
        //         'answer' => 'Absolutely! Our team specializes in branding, logo design, and creating a unique visual identity that aligns with your business goals.',
        //         'question_ar' => 'هل يمكن لThree Falcons المساعدة في العلامة التجارية والتصميم؟',
        //         'answer_ar' => 'بالتأكيد! يتخصص فريقنا في العلامة التجارية وتصميم الشعارات وإنشاء هوية بصرية فريدة تتماشى مع أهداف عملك.',
        //     ],
        // ]);
        // Project::factory(50)->create();
        // Services::factory(50)->create();
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
