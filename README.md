<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## [展示網站](https://72741d526484.ap.ngrok.io)

## 介紹

* 此項目主要是在實作 `Laravel 8`  搭配 `Vue` 框架、 `Tailwind` CSS 的功能練習

### 實作
* [Community](#Community)
* [TodoList](#TodoList)
* 目前正在努力的嘗試增加更多功能當中


### 使用套件
```
    # composer.json
    
    "inertiajs/inertia-laravel": "^0.3.5",
    "laravel/framework": "^8.40",
    "laravel/jetstream": "^2.3",
    "laravel/sanctum": "^2.6",
```

```
    # package.json
    
    "@inertiajs/inertia": "^0.8.4",
    "@inertiajs/inertia-vue3": "^0.3.5",
    "@inertiajs/progress": "^0.2.4",
    "@tailwindcss/forms": "^0.2.1",
    "@tailwindcss/typography": "^0.3.0",
    "@vue/compiler-sfc": "^3.0.5",
    "laravel-mix": "^6.0.6",
    "tailwindcss": "^2.0.1",
    "vue": "^3.0.5",
    "vue-loader": "^16.1.2"
```



## Community
* `Tailwind` 實作RWD社群文章網頁
* 文章觀看點擊量功能
* 針對點擊量設計防洗數量功能 (IP、帳號一天內對該篇文章只能增加一次觀看量)

![2021-06-17 10-48-36~7](https://user-images.githubusercontent.com/76476400/122435097-456c4900-cfca-11eb-855e-5ade63e1a7ea.gif)

### 文件目錄

```
app
├── Events
│   └── Statistics.php
├── Http
│   └── Controllers
│      └── CommunityController.php
├── Listeners
│   ├── PressCountStatistics.php
│   └── PressLikeStatistics.php
└── Models
    └── Community.php
    
database
├── factories
│   └── CommunityFactory.php
└── migrations
    ├── 2021_06_11_045745_create_communities_table.php
    └── 2021_06_12_123939_add_count_column_to_communities_table.php

resources
└── js
    └── Pages
        └── Community
            ├── CommunityModal.vue
            └── index.vue

tests
└── Feature
    └── StatisticsTest.php
```

## TodoList
* 新增代辦事項、完成和取消代辦事項、刪除代辦事項

![](https://i.imgur.com/evtbnUP.gif)

### 文件目錄
```
app
├── Http
│   └── Controllers
│       └── TodoListController.php
└── Models
    └── TodoList.php
    
database
└── migrations
    └── 2021_06_16_091618_create_todo_lists_table.php
    
resources
└── js
    └── Pages
        └── TodoList
            ├── Index.vue
            └── Show.vue
```
