<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename column if it exists
        if (Schema::hasColumn('services', 'images')) {
            Schema::table('services', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
            // Migrate data from images (JSON) to image (string)
            $services = DB::table('services')->get();
            foreach ($services as $service) {
                $firstImage = null;
                if ($service->images) {
                    $images = json_decode($service->images, true);
                    if (is_array($images) && count($images) > 0) {
                        $firstImage = $images[0];
                    }
                }
                DB::table('services')->where('id', $service->id)->update(['image' => $firstImage]);
            }
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('images');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back the images column as JSON, and migrate image back to images as array
        Schema::table('services', function (Blueprint $table) {
            $table->json('images')->nullable();
        });
        $services = DB::table('services')->get();
        foreach ($services as $service) {
            $images = $service->image ? json_encode([$service->image]) : json_encode([]);
            DB::table('services')->where('id', $service->id)->update(['images' => $images]);
        }
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
