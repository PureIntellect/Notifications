# Spark Notifications

Adds a notification panel to your Laravel Spark Kiosk, allowing you to send notifications to users. Original package created by vmitchell85 and can be found at https://github.com/vmitchell85/spark-kiosk-notify

## Features
 - Send Notifications through Kiosk
 - Select Multiple Users
 - Search for user (via name)


## Installation process

This package comes with predefined views and routes to use with your existing Spark installation.

In order to install the Spark Kiosk Notifications Package into your Spark application:

**1. Install the Vue-Select Package from http://sagalbot.github.io/vue-select/**

`npm install sagalbot/vue-select`

**2. Add the following to providers array in `config\app.php`**

`PureIntellect\Notifications\NotificationsServiceProvider::class,`

**3. Publish the Spark resources (views, VueJS components):**

`php artisan vendor:publish --provider="PureIntellect\Notifications\NotificationsServiceProvider"`

**4. Add the javascript components to your bootstrap.js file**

Add `require('./spark-kiosk-notifications.js');` to your `resources/assets/js/components/bootstrap.js` file.

**5. Compile the Javascript components**

`gulp`

**6. Add the HTML snippets**

File: `resources/views/vendor/spark/kiosk.blade.php`

Place a link to the notifications settings tab:

```html
<!-- Notifications Link -->
<li role="presentation">
    <a href="#notifications" aria-controls="notifications" role="tab" data-toggle="tab">
        <i class="fa fa-fw fa-btn fa-bell"></i>Notifications
    </a>
</li>
```

Inside the `<!-- Tab Panels -->` section, place the code to load the notifications tab:

```html
<!-- Notifications -->
<div role="tabpanel" class="tab-pane" id="notifications">
    @include('notifications::index')
</div>
```

**7. Try it out**

Log into your Spark application and access the new notifications tab located at:

`http://your-spark.url/spark/kiosk#/notifications`
