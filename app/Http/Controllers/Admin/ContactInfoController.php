<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\contactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactInfoController extends Controller
{
    /**
     * Store or update the contact info in the new table.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'addresses' => 'nullable|array',
            'addresses_ar' => 'nullable|array',
            'mobiles' => 'nullable|array',
            'social_links.facebook' => 'nullable|string',
            'social_links.linkedin' => 'nullable|string',
            'social_links.x' => 'nullable|string',
            'social_links.whatsapp' => 'nullable|string',
        ]);

        // Only keep the allowed social links
        $social_links = [
            'facebook' => $request->input('social_links.facebook', ''),
            'linkedin' => $request->input('social_links.linkedin', ''),
            'x' => $request->input('social_links.x', ''),
            'whatsapp' => $request->input('social_links.whatsapp', ''),
        ];
        $data['social_links'] = $social_links;

        $contactInfo = contactInfo::first();
        if (!$contactInfo) {
            $contactInfo = contactInfo::create($data);
        } else {
            $contactInfo->update($data);
        }
        return response()->json(['success' => true, 'contact_info' => $contactInfo]);
    }

    /**
     * Get the contact info for editing.
     */
    public function getContactInfo()
    {
        $contact = contactInfo::first();
        $data = [
            'addresses' => $contact ? $contact->addresses : [],
            'addresses_ar' => $contact ? $contact->addresses_ar : [],
            'mobiles' => $contact ? $contact->mobiles : [],
            'social_links' => [
                'facebook' => $contact && isset($contact->social_links['facebook']) ? $contact->social_links['facebook'] : '',
                'linkedin' => $contact && isset($contact->social_links['linkedin']) ? $contact->social_links['linkedin'] : '',
                'x' => $contact && isset($contact->social_links['x']) ? $contact->social_links['x'] : '',
                'whatsapp' => $contact && isset($contact->social_links['whatsapp']) ? $contact->social_links['whatsapp'] : '',
            ],
        ];
        return response()->json($data);
    }
}
