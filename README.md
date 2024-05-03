# BMO

BMO is a simple social media network built with HTML, CSS, Tailwind CSS and Laravel 10

## Features

- **User Authentication**: Users can sign up, log in, and log out securely.
- **Profile Management**: Users can edit their profile information, including name, email, password, avatar, and delete their profile.
- **Post Creation**: Users can create posts with markdown options.
- **Post Interactions**: Users can like, comment on posts, and delete their own posts.
- **Follow/Unfollow**: Users can follow and unfollow other users to customize their feed.
- **Feed**: The user's feed displays posts from followed accounts, providing a personalized experience.
- **Popular Posts**: The app features a section to display popular posts based on engagement metrics.
- **Responsive Design**: The application is designed to be responsive, ensuring a seamless experience across devices.

## Technologies Used

- **Laravel 10**: Laravel is a powerful PHP framework known for its elegant syntax and developer-friendly features.
- **Tailwind CSS**: Tailwind CSS is a utility-first CSS framework that helps in rapidly building custom designs.
- **HTML**: Used for structuring the web pages.
- **CSS**: Used for styling the web pages.
- **Vite**: Vite is a build tool that focuses on providing a faster development experience for modern web projects.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/mennakhalilselim/BMO
    ```

2. Navigate to the project directory:

    ```bash
    cd BMO
    ```

3. Install dependencies:

    ```bash
    composer install
    npm install
    ```

4. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Set up your database in the `.env` file.

7. Run migrations to create the necessary tables:

    ```bash
    php artisan migrate
    ```

8. Start the laravel development server:

    ```bash
    php artisan serve
    ```

8. Start the Vite development server:

    ```bash
    npm run dev
    ```

## Usage

1. Register a new account or log in with existing credentials.
2. Explore the app's features such as creating posts, interacting with posts, managing your profile, and following other users.
3. Enjoy a personalized feed based on the accounts you follow.

