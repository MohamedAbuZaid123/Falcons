<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class HomePageContentSeeder extends Seeder
{
    public function run()
    {
        // Section 1 Data
        $homeS1 = [
            'title_en' => 'great design , better service',
            'title_ar' => 'تصميم رائع ، خدمة أفضل',
            'boxes' => [
                [
                    'icon' => 'HomeS1Icon1.svg',
                    'text_en' => 'int&ext services',
                    'text_ar' => 'خدمات داخلية وخارجية'
                ],
                [
                    'icon' => 'HomeS1Icon2.svg',
                    'text_en' => 'excellent workers',
                    'text_ar' => 'عمال ممتازون'
                ],
                [
                    'icon' => 'HomeS1Icon3.svg',
                    'text_en' => 'quick response',
                    'text_ar' => 'استجابة سريعة'
                ],
                [
                    'icon' => 'HomeS1Icon4.svg',
                    'text_en' => 'quality instrument',
                    'text_ar' => 'أدوات عالية الجودة'
                ]
            ]
        ];

        // Section 2 Data
        $homeS2 = [
            'title_en' => 'Welcome to Three Falcons',
            'title_ar' => 'مرحبًا بكم في رواء',
            'descriptions_en' => [
                'Three Falcons Development, a forward-thinking real estate company since 2000 , is committed to building integrated communities that elevate lifestyles With over 30 projects across egypt , including residential and commercial developments all around egypt with a strong presence in Badr city , el sheikh zayed , October , New cairo , Heliopolis and Al sharqia Governorate.',
                'We believe that purchasing a property is not just a financial decision, but a personal journey. That\'s why we focus on building trust, providing clarity and offering personalized support.'
            ],
            'descriptions_ar' => [
                'شركة رواء للتطوير العقاري، شركة رائدة منذ عام 2000، ملتزمة ببناء مجتمعات متكاملة تعزز أنماط الحياة. مع أكثر من 30 مشروعًا في جميع أنحاء مصر، بما في ذلك المشاريع السكنية والتجارية في مدينة بدر، الشيخ زايد، أكتوبر، القاهرة الجديدة، مصر الجديدة، ومحافظة الشرقية.',
                'نؤمن أن شراء العقار ليس مجرد قرار مالي، ولكنه رحلة شخصية. لذلك نركز على بناء الثقة، وتوفير الوضوح، وتقديم الدعم الشخصي.'
            ],
            'quote_en' => ' Cost Less & More Fast ',
            'quote_ar' => ' التكلفة أقل أكثر سرعة ',
            'icons' => [
                [
                    'icon' => 'HomeS2P2Icon1.svg',
                    'label_en' => 'Design',
                    'label_ar' => 'تصميم'
                ],
                [
                    'icon' => 'HomeS2P2Icon2.svg',
                    'label_en' => 'Build',
                    'label_ar' => 'بناء'
                ],
                [
                    'icon' => 'HomeS2P2Icon3.svg',
                    'label_en' => 'Interior',
                    'label_ar' => 'تصميم داخلى'
                ],
                [
                    'icon' => 'HomeS2P2Icon4.svg',
                    'label_en' => 'Exterior',
                    'label_ar' => 'تصميم خارجي'
                ]
            ]
        ];

        // Section 3 Data
        $homeS3 =[
            "title_en"=> "our projects",
            "title_ar"=>"مشاريعنا",

            "boxes"=> [[

                "title_en"=> "Int-Ext Residents",
                "title_ar"=> "مشاريع داخلية وخارجية",
                "image"=> "svg/Home/HomeS2P2Icon2.svg",
                "desc_en"=> "We Build Inside - Out Homes That Blend Comfort, Quality, Elegance, Like Modern Apartment Designs, Marble Flooring, And Facades.",
                "desc_ar"=> "نحن نبني منازل من الداخل والخارج تجمع بين الراحة والجودة
                  والأناقة، مثل تصميمات الشقق الحديثة وأرضيات الرخام والواجهات.",
                ]
              ,
            [
                "title_en"=> "Commercial",
                "title_ar"=> "تجارية",
                "image"=> "svg/Home/HomeS2P2Icon2.svg",
                "desc_en"=> " Functional , modern spaces tailored to your business vision , like clinics , offices , cafes .",
                "desc_ar"=> "ساحات عملية وحديثة مصممة خصيصًا لتتناسب مع رؤية عملك، مثل
                  العيادات والمكاتب والمقاهي.",


            ]]
            ];
            $aboutS1 =[
                "question_en"=> "who we are ?",
                "question_ar"=>"من نحن ؟",
                "title_en"=> "Welcome to Three Falcons",
                "title_ar"=>"مرحبا بكم في Three Falcons",
               'descriptions_en' => [
                'Three Falcons Development, a forward-thinking real estate company since 2000 , is committed to building integrated communities that elevate lifestyles With over 30 projects across egypt , including residential and commercial developments all around egypt with a strong presence in Badr city , el sheikh zayed , October , New cairo , Heliopolis and Al sharqia Governorate.',
                'We believe that purchasing a property is not just a financial decision, but a personal journey. That’s why we focus on building trust, providing clarity and offering personalized support.'
                ],
                'descriptions_ar' => [
                'Three Falcons للتطوير العقاري، شركة عقارية رائدة تأسست عام ٢٠٠٠، ملتزمة ببناء مجتمعات متكاملة ترتقي بأنماط الحياة. ',
                'أكثر من ٣٠ مشروعًا في جميع أنحاء مصر، تشمل مشاريع سكنية وتجارية في جميع أنحاء مصر، مع حضور قوي في مدينة بدر، والشيخ زايد، وأكتوبر، والقاهرة الجديدة، ومصر الجديدة، ومحافظة الشرقية. ',
                'نؤمن بأن شراء عقار ليس مجرد قرار مالي، بل هو رحلة شخصية. ولذلك، نركز على بناء الثقة، وتوفير الوضوح، وتقديم الدعم الشخصي. ',
                ],
                "image"=> "AboutS1Img.webp",
                ];
                $aboutS2 = [
                    "header_en" => "Innovating for a Better Tomorrow.",
                    "header_ar" => "الابتكار من أجل غد أفضل.",
                    'boxes' => [
                        [
                            'image' => 'HomeS1Icon1.svg',
                            'title_en' => 'Vision',
                            'title_ar' => 'رؤيتنا',
                            'descriptions_en' => 'We deliver innovative residential and commercial developments that elevate lifestyles and ensure lasting market impact.',
                            'descriptions_ar' => 'نحن نقدم مشاريع سكنية وتجارية مبتكرة تعمل على الارتقاء بأنماط الحياة وضمان التأثير الدائم على السوق.'
                        ],
                        [
                            'image' => 'HomeS1Icon1.svg',
                            'title_en' => 'Mission',
                            'title_ar' => 'مهمتنا',
                            'descriptions_en' => 'Add value by delivering high-quality, trusted developments that enhance lives through innovation, sustainability, and tailored solutions.',
                            'descriptions_ar' => 'إضافة القيمة من خلال تقديم تطورات عالية الجودة وموثوقة تعمل على تحسين الحياة من خلال الابتكار والاستدامة والحلول المخصصة.'
                        ],
                        [
                            'image' => 'AboutS5Img.svg',
                            'title_en' => 'objective',
                            'title_ar' => 'هدفنا',
                            'descriptions_en' => [
                                'Grow with impactful residential and commercial projects.',
                                'Ensure client satisfaction through quality and transparency.',
                                'Lead in sustainable and future-ready real estate solutions.',
                                'Expand our market presence locally and regionally.'
                            ],
                            'descriptions_ar' => [
                                'نمو مستمر مع مشاريع سكنية وتجارية مؤثرة',
                                'ضمان رضا العملاء من خلال الجودة والشفافية.',
                                'الريادة في حلول العقارات المستدامة والجاهزة للمستقبل.',
                                'توسيع حضورنا في السوق المحلي والإقليمي.'
                            ]
                        ]
                    ]
                ];


        // Insert data
        PageContent::updateOrCreate(
            ['page' => 'home', 'section' => 'homeS3'],
            ['content' => json_encode($homeS3, JSON_UNESCAPED_UNICODE)]
        );


        $this->command->info('Home page content seeded successfully!');
    }
}
