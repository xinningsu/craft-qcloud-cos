# Craft Qcloud COS
Tencent COS integration for Craft CMS, 腾讯云对象存储整合Craft CMS

This plugin provides a [Tencent COS](https://cloud.tencent.com/product/cos) integration for [Craft CMS](https://craftcms.com/), with this plugin we can create a Tencent COS volume type for Craft CMS.

## Requirements

- PHP 8.0.2 or later
- Craft CMS 4.0 or later

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Tencent COS Volume”. Then press **Install** in its modal window.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project

# tell Composer to load the plugin
composer require xinningsu/craft-qcloud-cos

# tell Craft to install the plugin
./craft plugin/install craft-qcloud-cos
```

## Setup

To create a new Tencent COS filesystem to use with your volumes,

- Login admin, visit **Settings** → **Filesystems**,
- Press **New filesystem**.
- Select “Tencent COS” for the **Filesystem Type**
- Setting and configure as needed.
