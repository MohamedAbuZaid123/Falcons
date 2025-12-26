<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageContentController extends Controller
{
    public function editHomePage()
    {
        $homeS1 = PageContent::firstOrCreate(
            ['page' => 'home', 'section' => 'HomeS1'],
            ['content' => json_encode([])]
        );

        $homeS2 = PageContent::firstOrCreate(
            ['page' => 'home', 'section' => 'HomeS2'],
            ['content' => json_encode([])]
        );

        $homeS3 = PageContent::firstOrCreate(
            ['page' => 'home', 'section' => 'HomeS3'],
            ['content' => json_encode([])]
        );

        $homeS1Data = json_decode($homeS1->content, true);
        $homeS2Data = json_decode($homeS2->content, true);
        $homeS3Data = json_decode($homeS3->content, true);


        return view('admin.homePage.index', [
            'homeS1' => $homeS1Data,
            'homeS2' => $homeS2Data,
            'homeS3' => $homeS3Data
        ]);
    }

    public function updateHomePage(Request $request)
    {
        $homeS1 = $request->input('homeS1', []);
        $homeS2 = $request->input('homeS2', []);
        $homeS3 = $request->input('homeS3', []);

        // Convert multiline descriptions to arrays
        $homeS2['descriptions_en'] = array_filter(array_map('trim', explode("\n", $homeS2['descriptions_en'] ?? '')));
        $homeS2['descriptions_ar'] = array_filter(array_map('trim', explode("\n", $homeS2['descriptions_ar'] ?? '')));

        if (isset($homeS1['boxes'])) {
            foreach ($homeS1['boxes'] as $index => $box) {
                if ($request->hasFile("homeS1.boxes.$index.icon_file")) {
                    $file = $request->file("homeS1.boxes.$index.icon_file");
                    $homeS1['boxes'][$index]['icon'] = $file->store('icons', 'public');
                }
            }
        }

        // ---- Handle HomeS2 ICONS ----
        if (isset($homeS2['icons'])) {
            foreach ($homeS2['icons'] as $index => $iconItem) {
                if ($request->hasFile("homeS2.icons.$index.icon_file")) {
                    $file = $request->file("homeS2.icons.$index.icon_file");
                    $homeS2['icons'][$index]['icon'] = $file->store('icons', 'public');
                }
            }
        }

        if (isset($homeS3['boxes'])) {
            foreach ($homeS3['boxes'] as $index => &$box) {
                if ($request->hasFile("homeS3.boxes.$index.image_file")) {
                    $file = $request->file("homeS3.boxes.$index.image_file");
                    $homeS3['boxes'][$index]['image'] = $file->store('icons', 'public');

            }
        }}

        PageContent::updateOrCreate(
            ['page' => 'home', 'section' => 'HomeS1'],
            ['content' => json_encode($homeS1, JSON_UNESCAPED_UNICODE)]
        );

        PageContent::updateOrCreate(
            ['page' => 'home', 'section' => 'HomeS2'],
            ['content' => json_encode($homeS2, JSON_UNESCAPED_UNICODE)]
        );
        PageContent::updateOrCreate(
            ['page' => 'home', 'section' => 'HomeS3'],
            ['content' => json_encode($homeS3, JSON_UNESCAPED_UNICODE)]
        );

        return back()->with('success', 'Home page updated successfully!');
    }


    public function editAboutPage()
    {
        $aboutS1 = PageContent::firstOrCreate(
            ['page' => 'about', 'section' => 'AboutS1'],
            ['content' => json_encode([])]
        );

        $aboutS2 = PageContent::firstOrCreate(
            ['page' => 'about', 'section' => 'AboutS2'],
            ['content' => json_encode([])]
        );

        $aboutS1Data = json_decode($aboutS1->content, true);
        $aboutS2Data = json_decode($aboutS2->content, true);


        return view('admin.about.index', [
            'aboutS1' => $aboutS1Data,
            'aboutS2' => $aboutS2Data,
        ]);
    }

    public function updateAboutPage(Request $request)
    {
        $aboutS1 = $request->input('aboutS1', []);
        $aboutS2 = $request->input('aboutS2', []);

        $aboutS1['descriptions_en'] = array_filter(array_map('trim', explode("\n", $aboutS1['descriptions_en'] ?? '')));
        $aboutS1['descriptions_ar'] = array_filter(array_map('trim', explode("\n", $aboutS1['descriptions_ar'] ?? '')));

        // Process AboutS2 boxes
        if (isset($aboutS2['boxes'])) {
            foreach ($aboutS2['boxes'] as $index => &$box) {
                if ($index == 2) {
                    // Box 3 (array description)
                    $box['descriptions_en'] = array_filter(array_map('trim', explode("\n", $box['descriptions_en'] ?? '')));
                    $box['descriptions_ar'] = array_filter(array_map('trim', explode("\n", $box['descriptions_ar'] ?? '')));
                } else {
                    // Boxes 1 & 2 (single string)
                    $box['description_en'] = $box['description_en'] ?? '';
                    $box['description_ar'] = $box['description_ar'] ?? '';
                }

                if ($request->hasFile("aboutS2.boxes.$index.image_file")) {
                    $file = $request->file("aboutS2.boxes.$index.image_file");
                    $aboutS2['boxes'][$index]['image'] = $file->store('icons', 'public');

            }
        }

        if ($request->hasFile("aboutS1.image_file")) {
            $file = $request->file("aboutS1.image_file");
            $aboutS1['image'] = $file->store('icons', 'public');

    }

        PageContent::updateOrCreate(
            ['page' => 'about', 'section' => 'AboutS1'],
            ['content' => json_encode($aboutS1, JSON_UNESCAPED_UNICODE)]
        );

        PageContent::updateOrCreate(
            ['page' => 'about', 'section' => 'AboutS2'],
            ['content' => json_encode($aboutS2, JSON_UNESCAPED_UNICODE)]
        );

        return back()->with('success', 'About page updated successfully!');
    }
    }

    public function editHero()
    {
        $pages = ['home', 'about', 'services', 'projects', 'contact'];
        $heroContents = [];

        foreach ($pages as $page) {
            $content = PageContent::where('page', $page)
                        ->where('section', 'hero')
                        ->first();

            $heroContents[$page] = $content ? json_decode($content->content, true) : [
                'title_en' => '',
                'title_ar' => '',
                'descriptions_en' => [],
                'descriptions_ar' => []
            ];

            // Add button for home page
            if ($page === 'home' && !isset($heroContents[$page]['button'])) {
                $heroContents[$page]['button'] = [
                    'text_en' => '',
                    'text_ar' => '',
                    'link' => '#'
                ];
            }
        }

        return view('admin.hero.index', compact('heroContents'));

    }

    public function updateHero(Request $request)
    {
        $pages = ['home', 'about', 'services', 'projects', 'contact'];

        foreach ($pages as $page) {
            $content = [
                'title_en' => $request->input("$page.title_en"),
                'title_ar' => $request->input("$page.title_ar"),
                'descriptions_en' => array_filter(
                    array_map('trim', explode("\n", $request->input("$page.descriptions_en", '')))
                ),
                'descriptions_ar' => array_filter(
                    array_map('trim', explode("\n", $request->input("$page.descriptions_ar", '')))
                )
            ];

            // Preserve existing content if present to avoid dropping logo when updating other fields
            $existing = PageContent::where('page', $page)->where('section', 'hero')->first();
            if ($existing) {
                $existingContent = json_decode($existing->content, true) ?: [];
                $content = array_merge($existingContent, $content);
            }

            // Handle optional logo upload per page
            if ($request->hasFile("$page.logo_file")) {
                $file = $request->file("$page.logo_file");
                $path = $file->store('logos', 'public');
                $content['logo'] = $path;
            }

            if ($page === 'home') {
                $content['button'] = [
                    'text_en' => $request->input("$page.button.text_en"),
                    'text_ar' => $request->input("$page.button.text_ar"),
                    'link' => $request->input("$page.button.link")
                ];
            }

            PageContent::updateOrCreate(
                ['page' => $page, 'section' => 'hero'],
                ['content' => json_encode($content, JSON_UNESCAPED_UNICODE)]
            );
        }

        return back()->with('success', 'All hero sections updated successfully!');
    }

}
