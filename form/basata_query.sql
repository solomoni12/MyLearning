
-- table craete

php artisan make:migration create_users_table
php artisan make:migration create_content_table
php artisan make:migration create_review_panel_table
php artisan make:migration create_review_panel_content_table
php artisan make:migration create_license_table
php artisan make:migration create_media_channels_table
php artisan make:migration create_content_media_channels_table
php artisan make:migration create_reports_analytics_table



-- model
php artisan make:model User
php artisan make:model Content
php artisan make:model ReviewPanel
php artisan make:model License
php artisan make:model MediaChannel
php artisan make:model ReportAnalytics



-- // In database/migrations/[timestamp]_create_users_table.php

public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('password');
        $table->string('email')->unique();
        $table->string('role');
        $table->text('profile_details')->nullable();
        $table->string('contact_info')->nullable();
        $table->timestamps();
    });
}


-- // In app\Models\Content.php

class Content extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function licenses()
    {
        return $this->hasOne(License::class);
    }

    // Define other relationships
}

