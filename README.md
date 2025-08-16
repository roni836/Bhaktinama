# PujaPandit - Online Pandit Booking Platform

PujaPandit is a comprehensive web platform built with Laravel that connects users with verified pandits for religious ceremonies, pujas, and spiritual consultations.

## Features

- 🕉️ **Pandit Services**
  - Book pandits for various ceremonies
  - View pandit profiles and availability
  - Rate and review services

- 👤 **User Features**
  - User registration and authentication
  - Booking management
  - Service scheduling
  - Payment integration

- 🏛️ **Temple Directory**
  - Browse temples
  - View temple schedules
  - Book temple services

- 📱 **Admin Dashboard**
  - Manage pandits and bookings
  - User management
  - Content management
  - Analytics and reports

## Tech Stack

- Laravel 10.x
- MySQL 8.0
- PHP 8.1+
- Tailwind CSS
- Alpine.js

## Installation

1. **Clone the repository**
```bash
git clone https://github.com/yourusername/Bhaktinama-2.git
cd pujapandit
```

2. **Install dependencies**
```bash
composer install
npm install
npm run build
```

3. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure Database**
- Update `.env` with your database credentials
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pujapandit
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run Migrations and Seeders**
```bash
php artisan migrate --seed
```

6. **Start the Development Server**
```bash
php artisan serve
```

## Database Schema

Key tables include:
- users
- pandits
- bookings
- temples
- services
- payments

## API Routes

- `POST /api/bookings` - Create new booking
- `GET /api/pandits` - List all pandits
- `GET /api/temples` - List all temples
- More routes documented in `routes/api.php`

## Common Commands

```bash
# Clear all caches
php artisan optimize:clear

# Create new migration
php artisan make:migration create_table_name

# Run tests
php artisan test
```

## Contribution
Feel free to fork the repository and submit pull requests. Please follow PSR coding standards and include tests where applicable.

## Support

For support, email support@pujapandit.com or join our Slack channel.

## License

Licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Authors

- Your Name - Initial work - [YourGithub](https://github.com/yourusername)

## Acknowledgments

- Laravel Team
- All contributors
- Temple associations for their guidance
