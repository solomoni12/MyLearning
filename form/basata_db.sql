-- Create Users table
CREATE TABLE Users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL,
    profile_details TEXT,
    contact_info VARCHAR(255)
);

-- Create Content table
CREATE TABLE Content (
    contentID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    media_type VARCHAR(50) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    approval_status VARCHAR(50),
    FOREIGN KEY (userID) REFERENCES Users(userID)
);

-- Create ReviewPanel table
CREATE TABLE ReviewPanel (
    panelID INT AUTO_INCREMENT PRIMARY KEY,
    memberID INT,
    panel_role VARCHAR(50),
    FOREIGN KEY (memberID) REFERENCES Users(userID)
);

-- Create ReviewPanel_Content junction table
CREATE TABLE ReviewPanel_Content (
    panelID INT,
    contentID INT,
    FOREIGN KEY (panelID) REFERENCES ReviewPanel(panelID),
    FOREIGN KEY (contentID) REFERENCES Content(contentID),
    PRIMARY KEY (panelID, contentID)
);

-- Create License table
CREATE TABLE License (
    licenseID INT AUTO_INCREMENT PRIMARY KEY,
    contentID INT,
    issue_date DATE,
    expiry_date DATE,
    FOREIGN KEY (contentID) REFERENCES Content(contentID)
);

-- Create MediaChannels table
CREATE TABLE MediaChannels (
    channelID INT AUTO_INCREMENT PRIMARY KEY,
    channel_name VARCHAR(100) NOT NULL,
    channel_type VARCHAR(50) NOT NULL
);

-- Create Content_MediaChannels junction table
CREATE TABLE Content_MediaChannels (
    contentID INT,
    channelID INT,
    FOREIGN KEY (contentID) REFERENCES Content(contentID),
    FOREIGN KEY (channelID) REFERENCES MediaChannels(channelID),
    PRIMARY KEY (contentID, channelID)
);

-- Create ReportsAnalytics table
CREATE TABLE ReportsAnalytics (
    reportID INT AUTO_INCREMENT PRIMARY KEY,
    report_type VARCHAR(100) NOT NULL,
    data TEXT,
    generated_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




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
