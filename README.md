## Mediable Demonstration Application

This repository serves as a demonstration of [Mediable](https://github.com/tomshaw/mediable).

### Setup Instructions

Run the following command before running composer install.

```bash
git clone git@github.com:tomshaw/mediable.git packages/mediable
```

Run the included database migration.

> This creates an attachments table that stores upload information.

```bash
php artisan migrate
```

Make sure your `.env` `APP_URL` is correctly set.

```env
APP_URL=https://mydomain.com
```

Make sure files are accessible from the web.

```bash
php artisan storage:link
```