# Weather Application

## Project Overview

This project integrates the Geoapify Places API and OpenWeatherMap API to deliver weather forecasts for six major cities in Japan. The application features a streamlined, user-friendly interface designed to provide users with both current weather conditions and 5-day forecasts for each city.

## Why This Implementation is the Best

1. Simplified UI/UX Design

-   User Approach: The interface is designed with simplicity and clarity in mind. By prioritizing ease of use and minimizing complexity, the application ensures a smooth and intuitive user experience.

-   Visual: The sky blue color theme enhances readability and visually cues users to weather-related content. This design choice not only makes the application aesthetically pleasing but also helps users quickly grasp the information.

-   City Display: The main page prominently lists the six cities in Japan. Each city is displayed in a straightforward layout, with clickable links leading to dedicated pages for detailed weather forecasts. This clear navigation path improves the overall user experience.

-   Responsive Design: The application is fully responsive, ensuring optimal performance and usability across a variety of devices, including desktops, tablets, and smartphones.

2. Robust Code Implementation

-   Efficient API Integration: The application integrates the Geoapify and OpenWeatherMap APIs efficiently, ensuring smooth data retrieval and display. The code is optimized to handle API responses quickly and accurately.

-   Modular Code Structure: The codebase is organized into distinct modules, each responsible for a specific functionality such as API integration, data parsing, and UI rendering. This modular approach follows best practices in software development and facilitates easier maintenance and scalability.

-   Error Handling: Robust error handling is implemented to manage potential issues like API failures or network disruptions. Users are presented with clear and friendly messages in case of any problems, maintaining a positive user experience.

## How to Use the Application

1. Setup: Clone the repository and install the required dependencies.

```bash
git clone <repository-url>
cd <project-directory>
npm install
composer update
```

2. API Keys: Insert your Geoapify Places API key and OpenWeatherMap API key into the configuration file.

```bash
env
WEATHER_API_URL=https://api.openweathermap.org/data/2.5/forecast
WEATHER_API_KEY="your_openweathermap_api_key"

PLACE_API_URL=https://api.geoapify.com
PLACE_API_KEY="your_geoapify_api_key"

```

3. Run the Application: Open 2 terminals for laravel and vue

-   Laravel

```bash
php artisan serve
```

-   Vue

```bash
npm run dev
```

4. Access the Application: Open your web browser and navigate to http://127.0.0.1:8000 (or the URL specified in your configuration) to view the application.
