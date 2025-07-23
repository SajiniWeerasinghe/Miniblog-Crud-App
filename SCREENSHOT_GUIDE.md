# 📸 How to Take Screenshots for MiniBlog

## Step-by-Step Screenshot Guide

### 1. Start the Application

```bash
npm run build
php artisan serve
```

### 2. Open Browser

Navigate to `http://localhost:8000`

### 3. Take Screenshots

#### Landing Page (Default Login Form)

-   **Filename**: `landing-page.png`
-   **What to capture**: Full page showing the MiniBlog title, login form, and glassmorphism design
-   **Browser size**: 1440x900 or 1920x1080
-   **Notes**: Make sure the purple theme and gradient backgrounds are visible

#### Registration Form

-   **Filename**: `registration-form.png`
-   **What to capture**: Click "Create Account" button to show registration form
-   **Browser size**: Same as above
-   **Notes**: Capture the form switching animation if possible

#### Dashboard (Authenticated User)

-   **Filename**: `dashboard.png`
-   **What to capture**:
    1. First, register/login to access dashboard
    2. Capture the welcome header, create post section, and posts feed
-   **Browser size**: Same as above
-   **Notes**: Create a test post first to show the posts feed with content

#### Create Post Form

-   **Filename**: `create-post.png`
-   **What to capture**: Focus on the "Create New Post" section with form fields
-   **Browser size**: Same as above
-   **Notes**: You can partially fill the form to show it in action

#### Posts Feed

-   **Filename**: `posts-feed.png`
-   **What to capture**: The "Latest Posts" section with sample blog posts
-   **Browser size**: Same as above
-   **Notes**: Create 2-3 sample posts to show the card layout

#### Mobile View

-   **Filename**: `mobile-view.png`
-   **What to capture**:
    1. Open browser developer tools (F12)
    2. Switch to mobile view (iPhone 12 or similar)
    3. Capture both login form and dashboard on mobile
-   **Browser size**: 390x844 (iPhone 12)
-   **Notes**: Show responsive design working properly

### 4. Screenshot Settings

-   **Format**: PNG
-   **Quality**: High (avoid compression)
-   **File size**: Keep under 2MB each
-   **Naming**: Use exact filenames as listed above

### 5. Tools for Screenshots

-   **Windows**: Snipping Tool, Snagit, or browser built-in screenshot
-   **Mac**: Command+Shift+4 or Command+Shift+5
-   **Browser**: Right-click → "Save as image" or use developer tools

### 6. After Taking Screenshots

Save all screenshots in the `screenshots/` directory with the exact filenames mentioned above. The README.md is already configured to display them automatically.
