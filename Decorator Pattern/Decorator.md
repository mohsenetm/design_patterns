## Intent

Decorator یک Stractual Design Pattern است که به شما کمک می کند با قرار دادن اشیا درون اشیا دیگر ویژگی های رفتاری به آن ها بدهید.

![decorator](C:\Users\Mohsen\Desktop\design_patterns\Decorator Pattern\decorator.png)

## Example

فرض کنید یک کافی شاپ وجود دارد که انواع نوشیدنی را به فروش می رساند مانند قهوه، چای، آبمیوه و ...

بعد از مدتی این کافی شاپ می خواهد به نوشیدنی های خود قابلیت شخصی سازی بدهد مثلا چای به همراه یخ، چای به همراه زعفران و قهوه به همراه شکلات و ....

#### Solve One

اگر این افزودنی ها به صورت کلاس افزوده شود باعث انفجار تعداد کلاس ها می شود. امکان تغییرات دشوار می شود مثلا اگر قیمت یخ تغییر کند شما مجبور هستید تعداد زیادی کلاس را ویرایش کنید.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;

class HomeController extends Controller
{
    #[Pure] public function index(): int
    {
        return (new SaffronTea())->cost();
    }
}

```

```php
<?php


namespace App\Http\Controllers;


abstract class Beverage
{
    protected string $description = 'Unknown';

    public function getDescription()
    {
        return $this->description;
    }

    abstract public function cost():int;

}

```

```php
<?php


namespace App\Http\Controllers;


class Tea extends Beverage
{
    public string $description = 'Tea';

    public function cost(): int
    {
        return 1000;
    }

}

```

```php
<?php


namespace App\Http\Controllers;


class SaffronTea extends Beverage
{
    public string $description = 'Saffron Tea';

    public function cost(): int
    {
        return 3000;
    }

}

```

```php
<?php


namespace App\Http\Controllers;


class IceTea extends Beverage
{
    public string $description = 'Ice Tea';

    public function cost(): int
    {
        return 2000;
    }
}

```

#### Solve Two

قیمت همه افزودنی ها در کلاس اصلی تعیین شود و کلاس های فرزند با ست کردن پرچم های مختلف قیمت کلی نوشیدنی را محاسبه کنند.

1-اگر قیمت افزودنی ها تغییر کند نیاز به تغییر کلاس اصلی داریم.

2-اگر افزودنی جدید بخواهد اضافه شود نیاز است کلاس اصلی تغییر کند.

3-اگر کاربر یک افزودنی را چند بار بخواهد در این حالت به مشکل می خوریم.

4-اصل open-close رعایت نمی شود نسبت به تغییرات بسته و نسبت به افزودن ویژگی های جدید باز

هدف این است که بتوان ویژگی های جدید را بدون تغییر دادن کد انجام داد.

استفاده از open-close در همه جا خطرناک است و باعث پیچیدگی کد و درک سخت آن می شود.

```php
<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

class Beverage
{
    protected string $description = 'Unknown';

    protected int $saffronCost = 2000;

    protected int $iceCost = 1000;

    public bool $saffron = false;

    #[Pure] public function cost(): int
    {
        $sumCost = 0;

        if ($this->hasIce()) {
            $sumCost += $this->iceCost;
        }

        if ($this->hasSaffron()) {
            $sumCost += $this->saffronCost;
        }

        return $sumCost;
    }

    /**
     * @return bool
     */
    public function hasSaffron(): bool
    {
        return $this->saffron;
    }

    /**
     * @param bool $saffron
     */
    public function setSaffron(bool $saffron): void
    {
        $this->saffron = $saffron;
    }

    /**
     * @return bool
     */
    public function hasIce(): bool
    {
        return $this->ice;
    }

    /**
     * @param bool $ice
     */
    public function setIce(bool $ice): void
    {
        $this->ice = $ice;
    }

    public bool $ice = false;


    public function getDescription()
    {
        return $this->description;
    }

}
```

```php
<?php


namespace App\Http\Controllers;


use JetBrains\PhpStorm\Pure;

class Tea extends Beverage
{
    public string $description = 'Tea';

    #[Pure] public function cost(): int
    {
        return parent::cost() + 1000;
    }

}

```

#### Solve

روش بهینه استفاده از دکوراتور در اینجا هست. که ساختار دکوراتور را در زیر مشاهده می کنید.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    #[Pure] public function index(): int
    {
        $tea = new Tea();

        //wrapper one
        $tea = new Ice($tea);

        //wrapper two
        $tea = new Ice($tea);

        //wrapper three
        $tea = new Saffron($tea);

        return $tea->cost();
    }
}
```

```php
<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

abstract class Beverage
{
    protected string $description = 'Unknown';

    public function getDescription()
    {
        return $this->description;
    }


    abstract public function cost(): int;

}

```

```php
<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

class CondimentDecorator extends Beverage
{
    public Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription()
    {
        return $this->beverage->getDescription() . '  ' . $this->description; // TODO: Change the autogenerated stub
    }

    /**
     * @throws \Exception
     */
    public function cost():int
    {
        throw new \Exception('method not found');
    }


}

```

```php
<?php


namespace App\Http\Controllers;


use JetBrains\PhpStorm\Pure;

class Tea extends Beverage
{
    public string $description = 'Tea';

    #[Pure] public function cost(): int
    {
        return 1000;
    }

}
```

```php
<?php


namespace App\Http\Controllers;


class Saffron extends CondimentDecorator
{
    public string $description = 'Saffron';

    public function cost(): int
    {
        return $this->beverage->cost() + 2000;
    }

}
```

```php
<?php


namespace App\Http\Controllers;


class Ice extends CondimentDecorator
{
    public string $description = 'Ice';

    public function cost(): int
    {
        return $this->beverage->cost() + 1000;
    }

}

```

## How to Implement

1- ابتدا باید کلاس اصلی را که لایه های مختلف بر روی آن قرار می گیرد را تشخصی داد. مثلا کلاس اصلی نوشیدنی یا ذخیره فایل

2-سپس متودهایی که بین کلاس اصلی و سایر لایه ها مشترک است را مشخص می کنیم. سپس یک کلاس اینترفیس تعریف می کنیم که این متود های مشترک در آن مشخص شود. کارکرد abstract class و interface در اینجا شبیه هم هست.

```php
<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

abstract class Beverage
{
    protected string $description = 'Unknown';

    public function getDescription()
    {
        return $this->description;
    }


    abstract public function cost(): int;

}

```

3-یک concrete class  که برای تعریف رفتارهای پایه تعریف می شود.

```php
<?php


namespace App\Http\Controllers;


use JetBrains\PhpStorm\Pure;

class Tea extends Beverage
{
    public string $description = 'Tea';

    #[Pure] public function cost(): int
    {
        return 1000;
    }

}
```

4- ایجاد یک کلاس دکوراتور که دارای یک متغیر برای ذخیره مجموعه شی ها است.

```php
<?php


namespace App\Http\Controllers;

use JetBrains\PhpStorm\Pure;

class CondimentDecorator extends Beverage
{
    public Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription()
    {
        return $this->beverage->getDescription() . '  ' . $this->description; // TODO: Change the autogenerated stub
    }

    /**
     * @throws \Exception
     */
    public function cost():int
    {
        throw new \Exception('method not found');
    }


}
```

5- همه کلاس ها باید از یک اینترفیس ارث بری کنند.

6-لایه ها قبل یا بعد از کلاس اصلی اجرا می شوند. مثال در فشرده سازی، برای ذخیره سازی ابتدا محتوا فشرده شده و سپس ذخیره می شود(قبل از کلاس اصلی) و برای خواندن، ابتدا محتوا خوانده شده و سپس غیر فشرده می شود.

## Pros

اضافه کردن ویژگی های جدید به کلاس بدون نیاز به ایجاد یک زیر کلاس(مثال کلاس چای زعفران)

افزودن یا حذف یک وظیفه به شی در هنگام اجرا

افزودن چندین رفتار به شی با افزودن آن به چندین کلاس دکوراتور

انجام اصل تک وظیفگی، هر لایه می تواند یک وظیفه مخصوص به خود را داشته باشد.

## Cons

حذف یک لایه از مجموعه لایه ها کار دشواری است.(مثلا چای زعفران با یخ در ادامه خواسته شود زعفران حذف شود.)

نحوه پیاده سازی دکوراتور به نحوی که ترتیب در آن نقشی نداشته باشد پیچیده است.

ساختار کلاس ها زشت به نظر می رسد.

## Practice

#### Practice One 

به عنوان مثال شما یک فیلم خانوادگی دارید این فیلم خانوادگی را می خواهید فشرده کنید و سپس این فیلم فشرده شده را رمز نگاری کنید برای اینکار از الگوی Decorator می توان استفاده کرد شما شی فیلم را درون کلاس فشرده سازی قرار می دهید و سپس نتیجه آن را درون کلاس رمز نگاری می گذارید به فیلم ویژگی های جدید فشرده شدن و رمز نگاری را اضافه کرده اید. این دیزاین پترن را با نام wrapper نیز نام گذاری می کنند.

#### Practice Two

فرض کنید یک سیستم ارسال نوتیفیکیشن با استفاده از پیام وجود دارد سپس سیستم های دیگری برای ارسال نوتیفیکیشن با فیسبوک و تلگرام و واتساپ اضافه می شود. اگر بخواهید به صورت ترکیبی پیام ها را ارسال کنید و برای هر ترکیب بخواهید یک کلاس جدید تعریف کنید دچار انفجار تعداد کلاس ها می شوید.