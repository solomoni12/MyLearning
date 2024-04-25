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
