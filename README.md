# MiniBlog - Laravel CRUD Application

A modern, elegant blogging platform built with Laravel 11 and styled with Tailwind CSS v4. Features a beautiful glassmorphism design with a custom purple theme and smooth user experience.

## ✨ Features

-   **Modern UI/UX**: Glassmorphism design with gradient backgrounds and smooth animations
-   **Custom Theme**: Beautiful purple color scheme (#B13BFF) with gradient effects
-   **Authentication**: Secure user registration and login system
-   **CRUD Operations**: Create, read, update, and delete blog posts
-   **Responsive Design**: Fully responsive layout that works on all devices
-   **Tabbed Interface**: Elegant login/register form switching
-   **Real-time Validation**: Form validation with visual feedback
-   **Modern Typography**: Clean, readable typography with proper hierarchy

## 🚀 Tech Stack

-   **Backend**: Laravel 11
-   **Frontend**: Tailwind CSS v4, Vite
-   **Database**: MySQL
-   **Build Tools**: Vite for asset compilation
-   **Icons**: Heroicons (SVG icons)

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

-   PHP >= 8.2
-   Composer
-   Node.js >= 18
-   npm or yarn

## 🛠️ Installation

1. **Clone the repository**

    ```bash
    git clone <your-repo-url>
    cd simple-user-crud-app
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database configuration**

    The application is configured to use SQLite by default. The database file is located at `database/database.sqlite`.

    If you prefer MySQL or PostgreSQL, update your `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=miniblog
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run database migrations**

    ```bash
    php artisan migrate
    ```

7. **Build frontend assets**
    ```bash
    npm run build
    ```

## 🏃‍♂️ Running the Application

### Development Mode

1. **Start the Laravel development server**

    ```bash
    php artisan serve
    ```

2. **Start the Vite development server (in another terminal)**

    ```bash
    npm run dev
    ```

3. **Access the application**

    Open your browser and navigate to `http://localhost:8000`

### Production Mode

1. **Build assets for production**

    ```bash
    npm run build
    ```

2. **Serve the application**
    ```bash
    php artisan serve
    ```

## 🎨 Design Features

### Color Palette

-   **Primary**: #B13BFF (Custom purple theme)
-   **Gradients**: Purple, indigo, teal, and emerald combinations
-   **Glass Effects**: Backdrop blur with transparency

### UI Components

-   **Glassmorphism Cards**: Translucent containers with backdrop blur
-   **Gradient Buttons**: Multi-color gradient buttons with hover effects
-   **Animated Forms**: Smooth transitions and focus states
-   **Responsive Layout**: Mobile-first design approach

## 📱 User Interface

### Landing Page

-   **Hero Section**: Large title with gradient text effect
-   **Authentication**: Tabbed login/register interface
-   **Responsive**: Adapts to all screen sizes

### Dashboard (Authenticated Users)

-   **Welcome Header**: Personalized greeting with glassmorphism design
-   **Create Post**: Elegant form for creating new blog posts
-   **Posts Feed**: Beautiful card layout for displaying posts
-   **Post Actions**: Edit and delete functionality with confirmation

### Form Features

-   **Smart Validation**: Real-time form validation
-   **Visual Feedback**: Color changes and animations on focus/hover
-   **Accessible**: Proper labels and keyboard navigation

## 🗂️ Project Structure

```
├── app/
│   ├── Http/Controllers/     # Application controllers
│   └── Models/              # Eloquent models
├── database/
│   ├── migrations/          # Database migrations
│   └── database.sqlite      # SQLite database file
├── resources/
│   ├── css/
│   │   └── app.css         # Tailwind CSS with custom theme
│   ├── js/
│   │   └── app.js          # JavaScript entry point
│   └── views/
│       └── home.blade.php  # Main application view
├── routes/
│   └── web.php             # Web routes
└── vite.config.js          # Vite configuration
```

## 🔧 Configuration

### Tailwind CSS Theme

The application uses a custom Tailwind CSS theme defined in `resources/css/app.css`:

```css
@theme {
    --color-primary-50: #faf5ff;
    --color-primary-100: #f3e8ff;
    --color-primary-500: #b13bff;
    --color-primary-600: #9333ea;
    /* ... other color variations */
}
```

### Vite Configuration

Asset compilation is handled by Vite with Tailwind CSS integration:

```javascript
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
```

## 🚀 Deployment

### Production Checklist

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Run `npm run build`

### Recommended Hosting

-   **Shared Hosting**: Compatible with most shared hosting providers
-   **VPS**: Ubuntu/CentOS with Nginx/Apache
-   **Cloud**: AWS, DigitalOcean, Heroku, Vercel

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 🐛 Bug Reports

If you discover any bugs, please create an issue on GitHub with:

-   Description of the bug
-   Steps to reproduce
-   Expected behavior
-   Screenshots (if applicable)

## 📞 Support

For support and questions:

-   Create an issue on GitHub
-   Check existing documentation
-   Review Laravel documentation for framework-specific questions

## 🎯 Future Enhancements

-   [ ] Comment system for blog posts
-   [ ] Post categories and tags
-   [ ] User profile management
-   [ ] Image upload for posts
-   [ ] Search functionality
-   [ ] Email notifications
-   [ ] Social media sharing
-   [ ] Dark mode toggle
-   [ ] Rich text editor
-   [ ] Post likes and reactions

---

**Built with ❤️ using Laravel and Tailwind CSS**

### About Laravel

This project is built on Laravel, a web application framework with expressive, elegant syntax. Laravel is accessible, powerful, and provides tools required for large, robust applications.

For more information about Laravel, visit [laravel.com](https://laravel.com).
