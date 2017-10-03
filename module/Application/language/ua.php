<?php

return array_replace(include 'root.php', [
    '' => [
        'plural_forms' => 'nplurals=3; plural=((n%10==1)&&(n%100!=11))?0:(((n%10>=2)&&(n%10<=4)&&((n%100<10)||(n%100>=20)))?1:2)'
    ],

    'test' => 'тест пройшов успішно',

    /* Common words */
    'and' => 'и',
    '%1$s pictures'       => [
        '%1$s зображення',
        '%1$s зображення',
        '%1$s зображень'
    ],
    'ng/%1$s-pictures' => '{count, plural,
        one {{count} зображення}
        few {{count} зображення}
        many {{count} зображень}
        other {{count} зображень}
    }',
    '%1$s items'      => [
        '%1$s одиниця даних',
        '%1$s одиниці даних',
        '%1$s одиниці даних'
    ],
    '%1$s vehicles'      => [
        '%1$s автомобіль',
        '%1$s автомобіля',
        '%1$s автомобілів',
    ],
    '%1$s comments'      => [
        '%1$s коментарій',
        '%1$s коментаря',
        '%1$s коментарів',
    ],
    'ng/%1$s-comments' => '{count, plural,
        one {{count} коментарій }
        few {{count} коментаря }
        many {{count} коментарів }
        other {{count} коментарів }
    }',
    '%1$s messages'      => [
        '%1$s повідомлення',
        '%1$s повідомлення ',
        '%1$s повідомлень',
    ],
    '%1$s topics'      => [
        '%1$s тема',
        '%1$s теми',
        '%1$s тем',
    ],

    'year' => 'Рік',
    'month' => 'Місяць',

    'contributor' => 'упорядник',
    'contributors' => 'упорядники',

    'deleted-user' => 'Віддалений користувач',

    'submit' => 'Відправник',

    /* Layout */
    'layout/meta/description' => 'Енциклопедія автомобілів в картинках. AutoWP.ru',
    'layout/meta/keywords' => 'car, vehicle, auto, avto, автомобіль',
    'layout/brand' => 'AutoWP.ru',
    'layout/personal-messages' => 'Особисті повідомлення',
    'layout/you-have-%1$s-new-messages' => [
        'У вас %1$s нове повідомлення',
        'У вас %1$s нові повідомлення',
        'У вас %1$s нових повідомлень',
    ],
    'ng-layout/you-have-new-messages' => '{messages, plural,
        one {У вас {messages} нове повідомлення}
        few {У вас {messages} нових повідомлень}
        many {У вас {messages} нових повідомлень}
        other {У вас {messages} нових повідомлень}
    }',

    'layout/search' => 'Пошук',
    'layout/footer' => Звертаємо вашу увагу на те, що всі матеріали, розміщені на сервері autowp.ru, додані відвідувачами сайту.

Адміністрація сайту не має інформації про правомірність публікування цих матеріалів.

Всі зображення розміщені в ознайомлювальних цілях.

[Повідомити про порушення авторських прав](mailto:autowp@yandex.ru)',

    'layout/language-contributing' => 'Бажаєте допомогти?',

    /* Picture preview */
    'picture-preview/no-comments' => 'ні',
    'picture-preview/no-ratio'    => 'ні',
    'picture-preview/crop-desc'   => 'На зображенні виділена область автомобіля',
    'picture-preview/special-name' => 'Зображенню задано особливу назву',
    'Resolution'                  => ' роздільна здатність',
    'Filesize'                    => 'Розмір',
    'Ratio'                       => 'Оцінка',
    'Views'                       => 'Переглядів',
    'Comments count'              => 'Коментарів',

    /* SPECIFICATIONS*/
    'rpm' => 'об/мін',
    'Nm'  => 'Нм',
    'kW'  => 'КВт',
    'hp'  => 'к.с.',
    'spec/%1$s-gear' => [
        '%1$s передача',
        '%1$s передачи',
        '%1$s передач',
    ],

    /* PAGINATOR */
    'next'     => 'наступна',
    'previous' => 'попередня',

    /* INDEX */
    'index/brands'             => 'Компанії',
    'index/factories'          => 'Заводи',
    'index/specifications'     => 'Характеристики',
    'index/twins/description' => 'Ви знаєте, що Daewoo Matiz має аж цілих [шість клонів] (/ twins / group118812)? А знаєте, що [спільного у Lotus і Kia] (/ twins / group118750)? Впевнені, що вам здасться цікавим цей розділ. ',',
    'index/categories/description' => 'А чи знаєте ви, яка техніка допомагала дотримуватися правопорядок на вулицях світових міст в різний час? А на яких автомобілях їздив Папа Римський? Ні? Тоді вам точно в цей розділ.',
    'index/categories/mosts' => 'Хочете знати, який автомобіль був найшвидшим? Хочете знати, скільки важить наймогутніший кар'єрний самоскид? Заходьте і дізнаєтеся.',

    'mosts/fastest/roadster'          => 'Найшвидші родстери',
    'mosts/mighty/sedan/today'        => 'Найпотужніші седани нашого часу,
    'mosts/dynamic/universal/2000-09' => 'Найдинамічніші універсали 2000-х,
    'mosts/heavy/truck'               => 'Найважчі вантажівки',

    'back'    => 'назад',
    'forward' => 'вперед',

    'Picture of the day'       => 'Зображення дня',
    'car-of-day'               => 'автомобіль дня',
    'theme-of-day'             => 'тема дня',
    'day ahead'                => 'день вперед',
    'day ago'                  => 'день назад',
    'Cars by destination'      => 'Автомобілі за призначенням',
    'All new pictures'         => 'всі нові зображення',

    'all-link'                 => 'все',

    'brands/new-cars-of-brand' => 'Нові автомобілі %s',

    'brands/more-companies'    => [
        'ще %s компанія',
        'ще %s компанії',
        'ще %s компаній'
    ],
    'brands/pictures:' => 'зображень: ',

    'item/type/1/name' => 'ТЗ',
    'item/type/1/name-plural' => 'ТЗ',
    'item/type/1/new-item' => 'Нове ТЗ',
    'item/type/1/add-sub-item' => 'Додати підрозділ',
    'item/type/2/name' => 'Двигун',
    'item/type/2/name-plural' => 'Двигуни',
    'item/type/2/new-item' => 'Новий двигун',
    'item/type/2/add-sub-item' => 'Додати підрозділ',
    'item/type/3/name' => 'Категорія',
    'item/type/3/name-plural' => 'Категорії',
    'item/type/3/new-item' => 'Нова категорія',
    'item/type/3/add-sub-item' => 'Додати підкатегорію',
    'item/type/4/name' => 'Близнюки',
    'item/type/4/name-plural' => 'Близнюки',
    'item/type/4/new-item' => 'Нова група близнюков',
    'item/type/4/add-sub-item' => 'Додати підгрупу близнюків',
    'item/type/5/name' => 'Марка',
    'item/type/5/name-plural' => 'Марки',
    'item/type/5/new-item' => 'Нова марка',
    'item/type/5/add-sub-item' => 'Додати під-марку',
    'item/type/6/name' => 'Завод',
    'item/type/6/name-plural' => 'Заводи',
    'item/type/6/new-item' => 'Новий завод',
    'item/type/6/add-sub-item' => 'Додати під-завод',
    'item/type/7/name' => 'Музей',
    'item/type/7/name-plural' => 'Музеї',
    'item/type/7/new-item' => 'Новий музей',
    'item/type/7/add-sub-item' => 'Додати під-музей',

    'item/type/8/name' => 'Персона',
    'item/type/8/name-plural' => 'Персони',
    'item/type/8/new-item' => 'Нова персона',
    'item/type/8/add-sub-item"' => 'Додати суб-персону',

    /* BRAND PAGE*/
    'unsorted'                => 'Не сортовано',
    'engines'                 => 'Двигуни',
    'concepts and prototypes' => 'Концепти і прототипи',
    'logotypes'               => 'Логотипи',
    'mixed'                   => 'Різне',

    'count 0'    => 'нет',

    /* CAR LIST */
    'carlist/no-photo'       => 'Нема фотоматеріалів',
    'carlist/no-photo/add'   => 'Додати фотографію',
    'carlist/all pictures'   => 'всі зображення',
    'carlist/details'        => 'детальніше',
    'carlist/twins'          => 'автомобилі-близнюки',
    'carlist/produced/one'   => 'Зроблено в єдиному екземплярі',
    'carlist/produced/%1$s'  => [
        'Вироблена %1$s одиниця',
        'Вироблені %1$s одиниці',
        'Вироблено %1$s одиниць'
    ],
    'carlist/produced-about/%1$s' => [
        'Вироблена приблизно %1$s одиниця',
        'Вироблені приблизно %1$s единиці',
        'Вироблено приблизно %1$s единиці'
    ],
    'carlist/specifications' => 'технічні характеристики',
    'carlist/designed by %s'  => 'дизайн %s',
    'carlist/edit-specs' => 'ведення ттх',
    'carlist/years' => 'Року випуску',
    'carlist/model-years' => 'модельний рік',

    'picturelist/engine' => 'Engine',
    'picturelist/engine-%s' => 'Двигун %s',
    'picturelist/factory' => 'Завод',

    'present-time-abbr'      => 'н.ч.',

    /* Categories */
    'category/%s cars'       => [
        '%s автомобіль',
        '%s автомобіля',
        '%s автомобілів'
    ],
    'category/%s new cars'   => [
        '%s новий',
        '%s нових',
        '%s нових'
    ],

    /* most */
    'most/fastest' => 'швидкі',
    'most/fastest/param' => 'максимальна швидкість',
    'most/slowest' => 'повільні',
    'most/slowest/param' => 'максимальна швидкість',
    'most/dynamic' => 'динамічні',
    'most/dynamic/param' => 'розгін',
    'most/static' => 'шнертні',
    'most/static/param' => 'розгін',
    'most/mighty' => 'потужні',
    'most/mighty/param' => 'потужність двигуна',
    'most/weak' => 'слабкі',
    'most/weak/param' => 'потужність двигуна',
    'most/big-engine' => 'великі двигуни',
    'most/big-engine/param' => 'об’єм двигуна',
    'most/small-engine' => 'маленькі двигуни',
    'most/small-engine/param' => 'об’єм двигуна',
    'most/nimblest' => 'спритні',
    'most/nimblest/param' => 'діаметр розвороту',
    'most/economical' => 'економічні',
    'most/economical/param' => 'витрата палива в змішаному циклі',
    'most/gluttonous' => 'ненажердеві',
    'most/gluttonous/param' => 'витрата палива в змішаному циклі',
    'most/clenaly' => 'екологічні',
    'most/clenaly/param' => 'викиди',
    'most/dirty' => 'неекологічні',
    'most/dirty/param' => 'викиди',
    'most/heavy' => 'важкі',
    'most/heavy/param' => 'споряджена маса',
    'most/lightest' => 'легкі',
    'most/lightest/param' => 'споряджена маса',
    'most/longest' => 'довгі',
    'most/longest/param' => 'довжина',
    'most/shortest' => 'короткі',
    'most/shortest/param' => 'довжина',
    'most/widest' => 'широкі',
    'most/widest/param' => 'ширина',
    'most/narrow' => 'вузьки',
    'most/narrow/param' => 'ширина',
    'most/highest' => 'высокие',
    'most/highest/param' => 'высота',
    'most/lowest' => 'низькі',
    'most/lowest/param' => 'висота',
    'most/air' => 'аеродинамічні',
    'most/air/param' => ' коефіцієнти аеродинамічного опору ',
    'most/antiair' => 'анті аеродинамічні',
    'most/antiair/param' => ' коефіцієнти аеродинамічного опору ',
    'most/bigwheel' => 'великі колеса',
    'most/bigwheel/param' => 'розміри коліс',
    'most/smallwheel' => 'маленькі колеса',
    'most/smallwheel/param' => 'розміри коліс',
    'most/bigbrakes' => 'великі гальма',
    'most/bigbrakes/param' => 'розмір гальм',
    'most/smallbrakes' => 'маленькі гальма',
    'most/smallbrakes/param' => 'розмір гальм',
    'most/bigclearance' => 'великій кліренс',
    'most/bigclearance/param' => 'дорожній просвіт',
    'most/smallclearance' => 'маленький кліренс',
    'most/smallclearance/param' => 'дорожній просвіт',

    'mosts/sidebar/mostly…' => 'Най…',
    'mosts/sidebar/between…' => 'Серед …',

    'mosts/period/before1920' => 'до 1920го',
    'mosts/period/1920-29'    => '1920-29их',
    'mosts/period/1930-39'    => '1930-39их',
    'mosts/period/1940-49'    => '1940-49их',
    'mosts/period/1950-59'    => '1950-59их',
    'mosts/period/1960-69'    => '1960-69их',
    'mosts/period/1970-79'    => '1970-79их',
    'mosts/period/1980-89'    => '1980-89их',
    'mosts/period/1990-99'    => '1990-99их',
    'mosts/period/2000-09'    => '2000-09их',
    'mosts/period/2010-16'    => '2010-16их',
    'mosts/period/present'    => 'нашого часу',
    'mosts/period/all-time'   => 'за всю історію',

    /* upload */
    'upload/image-file' => 'Файл зображення',
    'upload/note' => 'Примітки до зображення',
    'upload/picture/crop' => 'кадрувати',
    'upload/picture/cropped-to' => 'кадровано %s',
    'upload/select/unsorted' => 'несортоване',
    'upload/select/unsorted-long' => 'не сортоване (автомобіль або двигун, якого нема на сайті)',
    'upload/select/mixed' => 'різне',
    'upload/select/mixed-long' => 'різне (декілька автомобілів на одному зображені)',
    'upload/select/logo' => 'логотип',
    'upload/select/engines' => 'Двигун',
    'upload/select/concepts' => 'Концепти та прототипи',
    'upload/select/other-modification' => 'інша модифікація',

    'upload/add-picture' => 'Додати зображення',
    'upload/select-another' => 'обрати іншу рубрику',
    'upload/description' => 'Якщо у вас є зображення, яких ви не знайшли на цьому сайті і вони відповідають тематиці сайту, то ви можете додати їх у наш каталог, скориставшись формою, розташованої нижче.

Було б добре, якби ви вказали, що за автомобіль зображений на картинці, щоб полегшити її додавання і уникнути помилки.

Вимоги, що пред'являються до зображень що додаються:

* Формат [JPEG](http://ru.wikipedia.org/wiki/JPEG) або [PNG](http://ru.wikipedia.org/wiki/PNG). Роздільна здатність: від 640×360 до 4096×4096.
* Зображення повинно по можливості бути максимально доступної якості, не містити різних артефактів зміни розміру або компресії (розмиття, нечіткості, расплитія кольорів, ребристості прямих ліній і т.д.). Виняток становлять рідкісні фото (виробника), скани з проспектів. Рішення про залишення такого фото на сайті приймає модераторський склад.
* Відсутність написів і логотипів сторонніх сайтів, нанесених не автор / власниками матеріалу.
* Автомобіль повинен мати первинний вигляд як при виході з заводу. Не повинні бути присутні ознаки <em> саморобного тюнінгу </ em>, бажано відсутність змін, пов'язаних зі старінням автомобіля.
* Основною і єдиною темою зображення повинен бути автомобіль, двигун, логотип авто компанії, автомобільний завод або музей. Наявність в кадрі сторонніх предметів або людей - небажано.
* Аматорські фотографії вашого автомобіля, автомобіля ваших друзів або будь-якого іншого, що зустрівся вам на вулиці, а також фотографії з виставок - не будуть прийняті на сайт 100%. Якщо тільки ви не професіонал.
* Для перших фотографій автомобіля можливі знижені вимоги.
** Велике прохання **, перед додаванням зображень, переконатися в їх відсутності в каталозі.

Звертаємо вашу увагу на те, що додавання зображень модерується. Тобто всі зображення перед додаванням в каталог будуть перевірені ведучими сайту. ',
    'upload/only-registered' => 'Тільки зареєстровані користувачі можуть завантажувати зображення 

[Авторизируйтесь](/ng/login) або [зареєструйтесь](/ng/signup)',

    /* catalogue */
    'catalogue/other-pictures-of-%1$s' => 'Інше зображення %1$s',
    'catalogue/all-pictures-of-%1$s' => 'Всі зображення %1$s',
    'catalogue/brand/logo-of-%s' => 'логотип %s',
    'catalogue/brand/links' => 'Посилання',
    'catalogue/brand/popular-images' => 'Популярні зображення',
    'catalogue/brand/new-pictures' => 'Нові фото',
    'catalogue/brand/inbox/by-brand' => 'Інбокс бренда',
    'catalogue/brand/factories' => 'Заводи',
    'catalogue/link-category/official' => 'Офіційні сайти',
    'catalogue/link-category/helper'   => 'Допомогли створенню проекта',
    'catalogue/link-category/club'     => 'Автомобільні клуби',
    'catalogue/link-category/default'  => 'Шнші',
    'catalogue/chronological' => 'Хронологія',
    'catalogue/related' => 'Пов’язані',
    'catalogue/related-with-%1$s' => 'Пов’язані з %1$s',
    'catalogue/sport' => 'Спорт',
    'catalogue/design' => 'Дизайн',
    'catalogue/stock-model' => 'стокова модель',
    'catalogue/sub-model' => 'підвид',
    'catalogue/sport-of-%1$s' => '%1$s Спорт',
    'catalogue/specifications-of-%1$s' => 'Технічні характеристики %1$s',
    'catalogue/specifications' => 'Технічні характеристики',
    'catalogue/other-photos' => 'Інші фото',
    'catalogue/section/moto' => 'Мото',
    'catalogue/section/tractors' => 'Трактори',
    'catalogue/section/buses' => 'Автобуси',
    'catalogue/section/trucks' => 'Вантажні',
    'catalogue/section/engines' => 'Двигуни',

    'catalogue/engine-menu/vehicles' => 'Автомобілі',
    'catalogue/engine-menu/pictures' => 'Зображення',
    'catalogue/specifications/contributors:' => 'Укладачі:',
    'catalogue/specifications/disclaimer' => 'Інформація зібрана учасниками проекту. Якщо ви знайшли помилку або бажаєте заповнити прогалини, ви можете зробити це, пройшовши процедуру реєстрації на сайті.',
    'catalogue/vehicle/inbox' => 'інбокс',
    'catalogue/vehicle/comments' => 'коментарі',
    'catalogue/engine/add-engine' => 'додати двигун',
    'catalogue/engine/mounted-on:' => 'Встановлювався на:',

    'factories/factory-items' => 'Продукція',
    'factories/factory/pictures' => 'Фотографії',

    /* comments */
    'comments/title' => 'Коментарі',
    'comments/reply' => 'відповісти',
    'comments/what-to-do-for-write-comments' => 'Щоб мати можливість залишати коментарі, необхідно [зареєструватися або увійти на сайт за допомогою облікового запису в одній із соціальних мереж]/ng/login)',
    'comments/it-requires-attention-of-moderators' => 'Потребує уваги модераторів',
    'comments/form-title' => 'Додати коментар',
    'comments/message' => 'Повідомлення',
    'comments/send' => 'Відправити',
    'comments/cancel' => 'Відменити',
    'comments/need-wait-text' => 'На жаль вам потрібно трохи почекати, щоб отримати можливість залишити коментар.

Це пов'язано з наявністю порога "повідомлень на годину", необхідного для боротьби зі спамом і деякими іншими негативними моментами.
 
Наступний коментар ви зможете залишити в "% s", а поки у вас є час уточнити ту думку, яку ви хотіли донести до загалу:',

    'comments/author/anonymous' => 'Анонім',
    'comments/message-deleted-by-admin' => 'Повідомлення видалено адміністрацією сайта',
    'comments/message/delete' => 'Видалити',
    'comments/message/restore' => 'Поновить',
    'comments/message/move' => 'Перемістити',
    'comments/vote/no-more-votes' => 'На сьогодні у вас не залишилося більше голосів',
    'comments/subscribe' => 'Підписатися на сповіщення щодо повідомлень,
    'comments/unsubscribe' => 'Відписатися від сповіщень',

    /*perspectives*/
    'perspective/front'          => 'спереду',
    'perspective/back'           => 'ззаду',
    'perspective/left'           => 'лівий бік',
    'perspective/right'          => 'правий бік',
    'perspective/interior'       => 'інтер’єр',
    'perspective/front-panel'    => 'торпедо',
    'perspective/3/4-left'       => '¾ лівий бік',
    'perspective/3/4-right'      => '¾ правий бік',
    'perspective/cutaway'        => 'cutaway',
    'perspective/front-strict'   => 'спереду строго)',
    'perspective/left-strict'    => 'лівий бік(строго)',
    'perspective/right-strict'   => 'правий бік(строго)',
    'perspective/back-strict'    => 'ззаду(строго)',
    'perspective/n/a'            => 'n/a',
    'perspective/label'          => 'шильдік',
    'perspective/upper'          => 'зверху',
    'perspective/under-the-hood' => 'під капотом',
    'perspective/upper-strict'   => 'зверху (строго)',
    'perspective/bottom'         => 'знизу',
    'perspective/dashboard'      => 'комбінація приборів',
    'perspective/boot'           => 'багажник',
    'perspective/logo'           => 'логотип',
    'perspective/mascot'         => 'маскот',
    'perspective/sketch'         => 'ескиз',
    'perspective/mixed'          => 'різне',
    'perspective/exterior-details' => 'деталі екстер’єру',

    'login/sign-in' => 'Вхід',
    'login/sign-out' => 'Вихід',
    'login/login-or-email' => 'логін або e-mail',
    'login/captcha' => 'введіть код захисту',
    'login/registration' => 'Реєстрація',
    'login/forgot-password?' => 'Забули пароль?',
    'login/success-text' => 'Ради знову вітати вас на нашому сайті',
    'login/remember' => 'запам'ятати',
    'login/sign-in-using-account' => 'Увійдіть, використовуючи обліковий запис',
    'login/login-or-password-is-incorrect' => 'Логін або пароль не вірний',
    'login/user-%value%-not-found' => 'Користувач с іменем або e-mail "%value%" не знайдено',

    'registration/if-you-registered' => 'Якщо ви вже зареєстровані, то вам не слід робити цього знову, а потрібно лише ввести свій логін і пароль у формі праворуч.',

    'account/personal-message/reply' => 'відповісти',
    'account/personal-message/delete' => 'видалить',
    'account/personal-message/entire-dialog' => 'все листування',
    'account/personal-message/system-notification' => 'Системне повідомлення,
    'account/personal-message/delete-all-sent' => 'Видалити усі відправлені повідомлення',
    'account/personal-message/delete-all-system' => 'Видалити усі повідомлення',
    'account/personal-message/new' => 'нове',
    'account/personal-message/sent' => 'Повідомлення відправлено',
    'account/profile/personal' => 'Особисті данні',
    'account/profile/photo' => 'Фотографія',
    'account/profile/photo/saved' => 'Фотографія збережена',
    'account/profile/photo/deleted' => 'Фотографія видалена',
    'account/profile/use-gravatar' => 'Ви можете завантажити своє фото або використовувати сервіс <a href="http://gravatar.com/">Gravatar</a>',
    'account/profile/photo/delete' => 'Видалити фото',
    'account/profile/other' => 'Інше',
    'account/profile/votes-per-day' => 'Голосів на день',
    'account/profile/votes-left' => 'Голосів залишилось',
    'account/profile/timezone' => 'Часовий пояс',
    'account/profile/language' => 'Мова',
    'account/profile/saved' => 'Данні збережені',

    'account/access/change-password' => 'Змінити пароль',
    'account/access/change-password/current' => 'Поточний',
    'account/access/change-password/new' => 'Новий',
    'account/access/change-password/new-confirm' => 'Новий (ще раз)',
    'account/access/change-password/current-password-is-incorrect' => 'Поточний пароль введено не вірно',
    'account/access/change-password/saved' => 'Пароль успішно змінений',
    'account/access/self-delete' => 'Видалити обліковий запис',
    'account/access/self-delete/password-is-incorrect' => 'Пароль введено невірно ',

    'account/specs/weight' => 'Вага',

    'account/specs/conflicts/filter/all' => 'Всі',
    'account/specs/conflicts/filter/i-disagree' => 'Я не згоден',
    'account/specs/conflicts/filter/do-not-agree-with-me' => 'Не згодні зі мною',
    'account/specs/conflicts/filter/errors' => 'Помилки',

    'account/specs/conflicts/title/object' => 'Об’єкт',
    'account/specs/conflicts/title/object/engine' => 'Двигун',
    'account/specs/conflicts/title/parameter' => 'Характеристика',
    'account/specs/conflicts/title/my-value' => 'Моє значення',
    'account/specs/conflicts/title/other-values' => 'Інше значення',

    'account/specs/conflicts/my-value/none' => 'ні',

    'account/email/your-current-email:' => 'Ваш поточний адрес e-mail: ',
    'account/email/your-dont-enter-email' => 'Ви не вказали адрес e-mail',
    'account/email/text' => 'На цій сторінці ви можете змінити свою адресу електронної пошти (e-mail)

На нову адресу буде надіслано листа з інструкціями по його',

    'account/accounts/add' => 'Додати обліковій запис',
    'account/accounts/remove' => 'Видалити',
    'account/accounts/removed' => 'Обліковий запис видалено',
    'account/accounts/connect-failed' => 'Не вдалося прив'язати обліковий запис. Можливо сталася помилка або доступ до додатка заборонений користувачем.',
    'account/accounts/disconnect-failed' => 'Не вдалося видалити обліковий запис.

Таке буває, якщо прив'язаний обліковий запис є єдиним способом авторизації, тобто не заданий e-mail або інші обліковий запис.',

    'account/delete/text' => 'Ми шкодуємо, що вам довелося опинитися на цій сторінці, і ви плануєте залишити наш сайт назавжди, але не можемо вам в цьому відмовити.

Натиснувши на червону кнопку, всі дані, що стосуються вас, будуть знеособлені або видалені.

Цей процес є незворотнім, тому гарненько подумайте і не приймайте поспішних рішень.',
    'account/deleted/text' => 'Обліковий запис видалено.
Бажаємо вам удачі.',

    'feedback/title' => 'Зворотній зв'язок',
    'feedback/name'  => 'Ваше ім’я',
    'feedback/message' => 'Повідомлення',
    'feedback/donate-text' => 'Якщо ви прийшли сюди, щоб висловити слова підтримки, є можливість [висловити її в твердій валюті](/donate)',
    'feedback/sent' => 'Ваше повідомлення відправлено',

    'map/museums-and-factories' => 'музеї та заводи',

    'picture/image-specifications' => 'Характеристики зображення',
    'picture/added-by:' => 'Додав:',
    'picture/location' => 'Координати',
    'picture/status:' => 'Статус зображення:',
    'picture/status/inbox' => 'Рішення не винесено',
    'picture/status/accepted' => 'Прийнято',
    'picture/status/removing' => 'Поставлене в чергу на видалення',
    'picture/propose-image-replacement' => 'Запропонувати заміну зображення',
    'picture/moderators-about-this-picture' => 'Модератори про це фото',
    'picture/all-images-have-owners' => 'Всі зображення є чиєюсь власністю .',
    'picture/if-you-found-error' => 'Якщо ви вважаєте, що користувачі сайту помилилися, розмістивши це зображення в цьому розділі, то було б добре, якби ви написали про це в коментарях і вказали на помилку.',
    'picture/where-to-talk' => 'Поділитися своєю радістю, обговорити наболіле і просто побазікати про автомобілі і не тільки ви можете на нашому <a href="/forums/" title="Перейти на форум">форумі</a>',
    'picture/other-languages' => 'На інших мовах',
    'picture/picture-suggested-to-replace' => 'Фото запропоновано на аміну',
    'picture/that-engine-is-mounted-to-vehicle' => 'Такий двигун встановлюється на автомобіль:',
    'picture/that-engine-is-mounted-to-vehicles:' => 'Такий двигун встановлюється на автомобілі:',
    'picture/factory-details' => 'Детальніше про завод ...',
    'picture/on-that-factory-produced-vehicle' => 'На цьому заводі виготовлявся такий автомобіль, як',
    'picture/on-that-factory-produced-vehicles:' => 'На цьому заводі виготовлялися такі автомобілі, як:' ,
    'picture/on-that-factory-produced-vehicles/and' => 'і',
    'picture/on-that-factory-produced-vehicles/and-other' => 'інші ...',

    'user/name' => 'Ім’я',
    'user/password' => 'Пароль',
    'user/password-confirm' => 'Пароль (ще раз)',

    'users/user/known-as:' => 'Відрекомендуватись як: ',
    'users/user/before-known-as:' => 'раніше відомий як: ',
    'users/user/type:' => 'Тип облікового запису: ',
    'users/user/type/moderator' => 'Модератор',
    'users/user/type/visitor' => 'Відвідувач',

    'users/user/upload-pictures:' => 'Додав зображень: ',
    'users/user/pictures-left-on-site:' => 'з них на сайті залишилось: ',

    'users/comments/order/new' => 'Нові',
    'users/comments/order/old' => 'Старі',
    'users/comments/order/positive' => 'Позитивні',
    'users/comments/order/negative' => 'Негативні',

    'users/for-moderators' => 'Для модераторів',
    'users/for-moderators/remove-photo' => 'Видалити фотографію користувача',
    'users/for-moderators/remove-user' => 'Видалити користувача',
    'users/for-moderators/last-visit-from-ip' => 'Останній раз заходив з IP-адреси: ',

    'ban/that-address-is-banned' => 'Цю адресу забанив ',
    'ban/until' => 'до',
    'ban/unban' => 'зняти бан',
    'ban/ban' => 'Забанити',
    'ban/reason' => 'Причина',
    'ban/period' => 'На час',
    'ban/period/hour' => 'година',
    'ban/period/2-hours' => '2 години',
    'ban/period/4-hours' => '4 години',
    'ban/period/8-hours' => '8 годин',
    'ban/period/16-hours' => '16 годин',
    'ban/period/day' => 'доба',
    'ban/period/2-days' => 'дві доби',

    'users/user/recent-activity' => 'Активність на сайті',
    'users/user/recent-uploads' => 'Останні додані зображення',
    'users/user/recent-comments' => 'Останні коментарі',
    'users/user/registration-date' => 'Зареєстровано',
    'users/user/last-visited' => 'Останній раз був на сайті',
    'users/user/send-personal-message' => 'Відправити особисте повідомлення',
    'users/user/log' => 'Журнал подій користувача',
    'users/user/uploaded-pictures' => 'Додані зображення',
    'users/user/not-upload-pictures' => 'Не додавав зображень',

    'users/rating/specifications' => 'Технічні характеристики',
    'users/rating/pictures' => 'Зображення',
    'users/rating/likes' => 'Лайки',
    'users/rating/picture-likes' => 'Лайки до фото',
    'users/rating/specs-volume' => 'Х-ки',
    'users/rating/weight' => 'Вага',

    'users/registration/email-confirm-subject' => 'Реєстрація на %1$s',
    'users/registration/email-confirm-message' =>
        "Вітаю.\n" .
        "Ви зареєструвались на сайті %1\$s\n" .
        "Ваші реєстраційні дані:\n" .
        "E-mail: %2\$s\n" .
        " Для підтвердження реєстрації та зазначеної вами адреси електронної пошти, вам необхідно перейти по посиланням %3\$s\n\n" .
        " Якщо ви не реєструвалися на сайті, то просто видаліть це повідомлення \n\n" .
        "З повагою, Робот %4\$s",
    'users/registration/email-confirm/token-not-found' => 'Посилання, по якій ви перейшли на сайт - застаріла',
    'users/registration/email-confirm/success-text' => 'Ваша адреса електронної пошти успішно підтверджена.',
    'users/registration/success/email-sent' => 'На електронну адресу, вказану при реєстрації, відправлено лист з інструкціями для підтвердження адреси e-mail.',
    'users/change-email/confirm-subject' => 'Підтвердження e-mail на %1$s',
    'users/change-email/confirm-message' =>
        "Вітаю.\n\n" .
        " Ви або хтось інший запросили ізмненія контактної адреси свого облікового запису на сайті %1\$s на %2\$s\n" .
        " Для підтвердження зазначеної дії, вам необхідно перейти за посиланням %3\$s\n\n" .
        " Якщо повідомлення потрапило до вас помилково - просто видаліть \n\n" .
        "З повагою, Робот %1\$s\n",
    'users/change-email/confirmation-message-sent' => 'E-mail with a confirmation code was sent',

    'user/add-to-contacts' => 'Додати до контактів',
    'user/remove-from-contacts' => 'Видалить з контактів',

    'donate/text' => 'Не дивлячись на те, що ми позиціонуємо нашу енциклопедію як некомерційну, зовсім обходитися без грошей неможливо. Зміст сайту вимагає деяких витрат.

Якщо у вас є бажання і можливість підтримати нас, ви можете зробити це, надіславши нам трошки грошей через PayPal.
 
Разом з пожертвуванням ви можете передати нам пару рядків про те, куди вам хотілося б бачити рух сайту і ми будемо відчувати себе трішечки більше зобов'язаними.

Ми не збираємо інформацію про жертводавців, але, якщо ви наполягаєте, ми можемо відзначити ваш внесок.

In addition we can offer in return to [choose the next vehicle of the day](/donate/vod)',
    'donate/target' => 'На роботу сайту',
    'donate/project' => 'AutoWP.ru',
    'donate/comment-hint' => 'Ваші побажання',
    'donate/success-text' => 'Дякуємо вам за надану підтримку.

Будемо намагатися вас не розчарувати.',

    'donate/vod/text' => 'Ту дрібноту, що ми можемо запропонувати натомість фінансової допомоги на існуванні сайту - це можливість вибрати найближчий "автомобіль дня".

Для цього дотримуйтесь інструкцій нижче.

Ми будемо раді, якщо ви забажаєте [зробити безкорисливу пожертву] (/ donate) на довільну суму.',
    'donate/vod/select-date' => '1. Оберіть дату',
    'donate/vod/date-busy' => 'зйанято',
    'donate/vod/select-item' => '2. Оберіть автомобіль',
    'donate/vod/select-item-text' => 'На роль автомобіля дня підійде майже будь-який, з наявних, але є деякі обмеження:

- автомобіль має бути обраний вперше
- автомобіль повинен мати принаймні 3 фотографії',
    'donate/vod/select-item/selection:' => 'Вибір: ',
    'donate/vod/select-item/select' => 'Обрати ...',
    'donate/vod/preview' => '3. Попередній перегляд',
    'donate/vod/anonymous' => 'Анонімно',
    'donate/vod/with-name' => 'Із зазначенням імені (потрібна реєстрація)',
    'donate/vod/make-donation' => '4. Зробіть пожертву',
    'donate/vod/order-message' => 'AutoWP.ru: автомобіль дня',
    'donate/vod/order-target' => 'Order %s',
    'donate/vod/message' => 'Ваші побажання',
    'donate/vod/price:' => 'Сума:',
    'donate/vod/price/currency' => 'грн.',
    'donate/vod/price-aroud' => 'примірно $%s',
    'donate/vod/method/credit-card' => 'Банківська картка',
    'donate/vod/method/mobile' => 'Рахунок мобільного оператора',
    'donate/vod/method/yandex.money' => 'Яндекс.Деньги',
    'donate/vod/send' => 'Оплатити

    'donate/vod/success-text' => 'Найближчим часом інформація про пожертвування автоматично надійде до нас і ваш вибір буде здійснено.

Дякуємо вам за надану підтримку.

Будемо намагатися вас не розчарувати.',
    'donate/vod/wants-to-select?' => 'Бажаєте обрати наступний?',

    'message/user-cancel-car-engine' => '%1$s скасував двигун %2$s для автомобіля %3$s ( %4$s ]',

    'car-type/roadster'       => 'Родстер',
    'car-type/spyder'         => 'Спайдер',
    'car-type/cabriolet'      => 'Кабріолет',
    'car-type/cabrio-coupe'   => 'Кабріо-купе',
    'car-type/targa'          => 'Тарга',
    'car-type/coupe'          => 'Купе',
    'car-type/sedan'          => 'Седан',
    'car-type/hatchback'      => 'Хетчбэк',
    'car-type/crossover'      => 'Кросовер',
    'car-type/universal'      => 'Універсал',
    'car-type/limousine'      => 'Лімузин',
    'car-type/pickup'         => 'Пікап',
    'car-type/caravan'        => 'Легковий фургон',
    'car-type/offroad'        => 'Позашляховик',
    'car-type/minivan'        => 'Мінівен',
    'car-type/van'            => 'Фургон',
    'car-type/truck'          => 'Вантажівка',
    'car-type/bus'            => 'Автобус',
    'car-type/phaeton'        => 'Фаетон',
    'car-type/4door-hardtop'  => '4х дв. Хардтоп',
    'car-type/landau'         => 'Ландо',
    'car-type/offroad-cabrio' => 'Позашляховик-кабріолет',
    'car-type/liftback-coupe' => 'Ліфтбек-купе',
    'car-type/liftback-sedan' => 'Ліфтбек-седан',
    'car-type/2door-hardtop'  => '2х дв. Хардтоп',
    'car-type/minibus'        => 'Мікроавтобус',
    'car-type/car'            => 'Легковий автомобіль',
    'car-type/multiplex-bus'  => 'Багатосекційний автобус',
    'car-type/offroad-short'  => 'Позашляховик короткобазний',
    'car-type/brougham'       => 'Брогхем',
    'car-type/fastback-sedan' => 'Фастбек-седан',
    'car-type/fastback-coupe' => 'Фастбек-купе',
    'car-type/tonneau'        => 'Тонно',
    'car-type/2-floor-bus'    => '2-х поверховий автобус',
    'car-type/town-car'       => 'Таун кар',
    'car-type/barchetta'      => 'Баркетта',
    'car-type/moto'           => 'Мото',
    'car-type/tractor'        => 'Трактор',
    'car-type/tracked'        => 'Гусенична платформа',

    'car-type-rp/roadster'       => 'Родстерів',
    'car-type-rp/spyder'         => 'Спайдерів',
    'car-type-rp/cabriolet'      => 'Кабріолетів',
    'car-type-rp/cabrio-coupe'   => 'Кабріо-купе',
    'car-type-rp/targa'          => 'Тарга',
    'car-type-rp/coupe'          => 'Купе',
    'car-type-rp/sedan'          => 'Седанів',
    'car-type-rp/hatchback'      => 'Хетчбеків',
    'car-type-rp/crossover'      => 'Кросоверів',
    'car-type-rp/universal'      => 'Універсалів',
    'car-type-rp/limousine'      => 'Лимузинів',
    'car-type-rp/pickup'         => 'Пікапов',
    'car-type-rp/caravan'        => 'Легкових фургонів',
    'car-type-rp/offroad'        => 'Позашляховиків',
    'car-type-rp/minivan'        => 'Мінівэнів',
    'car-type-rp/van'            => 'Фургонів',
    'car-type-rp/truck'          => 'Вантажівок',
    'car-type-rp/bus'            => 'Автобусів',
    'car-type-rp/phaeton'        => 'Фаетонів',
    'car-type-rp/4door-hardtop'  => '4х дв. Хардтопів',
    'car-type-rp/landau'         => 'Ландо',
    'car-type-rp/offroad-cabrio' => 'Позашляховиків-кабріолетів',
    'car-type-rp/liftback-coupe' => 'Ліфтбек-купе',
    'car-type-rp/liftback-sedan' => 'Ліфтбек-седанів',
    'car-type-rp/2door-hardtop'  => '2х дв. Хардтопів',
    'car-type-rp/minibus'        => 'Мікроавтобусів',
    'car-type-rp/car'            => 'Легкових автомобілей',
    'car-type-rp/multiplex-bus'  => 'Багатосекційних автобусів',
    'car-type-rp/offroad-short'  => 'Позашляховиків короткобазних',
    'car-type-rp/brougham'       => 'Брогхем',
    'car-type-rp/fastback-sedan' => 'Фастбек-седанов',
    'car-type-rp/fastback-coupe' => 'Фастбек-купе',
    'car-type-rp/tonneau'        => 'Тонно',
    'car-type-rp/2-floor-bus'    => '2-х поверхових автобусів',
    'car-type-rp/town-car'       => 'Таун карів',
    'car-type-rp/barchetta'      => 'Баркетта',
    'car-type-rp/moto'           => 'Мото',
    'car-type-rp/tractor'        => 'Тракторів',
    'car-type-rp/tracked'        => 'Гусеничних платформ',

    'about/text' => '### Наші люди
Своїм існуванням наш проект зобов'язаний людям, які приходять сюди і вкладають свій час і знання.

Хтось додає матеріали, а хтось допомагає знайти помилки на вже існуючих. Хтось спеціалізується на конкретній марці, а хтось встигає за всім. Хтось без зайвої уваги з боку наповнює сайт крок за кроком, а хтось збирає овації рідкісними, але жагучими фото.

Нас багато і ми різні, і це прекрасно. Ось лише деякі з нас:

%users%

#### " Колірна диференціація штанів "

Так повелося, що ми виділяємо деяких наших людей особливим кольором - зеленим. Не просто так - це особлива мітка. Знайте, якщо ви бачите когось із "зелених", ви завжди можете схопити його і запитати про що завгодно навколо нашого проекту, тому що "зелені" - це найчуйніші і зацікавлені в житті проекту люди.

Деяка частина "зелених" наділена модераторськими функціями.

### Діалог і зворотний зв'язок

Якщо у вас є якісь зауваження, пропозиції чи інші думки, ви можете озвучити їх на [Форумі] (/ forums /), задати особисто через систему обміну повідомленнями або написати в "[зворотний зв'язок] (/ ng / feedback)" адміністрації сайту.

Якщо у вас є питання про розміщення реклами, обміну посиланнями або просуванні вашого продукту іншими способами, всі вони мають єдину відповідь: ми не розміщуємо рекламу.

### Цифри

Так склалося, що ми любимо тішити своє марнославство великими цифрами, а також всім їх показувати. Вашій увазі деякі з них:

* На сайті більше% total-pictures% збережений,% total-vehicles% автомобілів, що складає близько% total-size% даних
* Зареєстровано близько% total-users% користувачів, які залишили більш% total-comments% повідомлень

### Розробка

Розробка і підтримка проекту ведеться в основному силами %developer% ([contributors] (https://github.com/autowp/autowp/graphs/contributors))

Переклад сайту на французьку мову: %fr-translator%

Переклад сайту на китайську мову: %zh-translator%

Переклад сайту на українську мову: %ua-translator%


Сайт працює на [Zend Framework] (http://framework.zend.com/), [jQuery] (http://jquery.com/), [Twitter bootstrap] (http://getbootstrap.com/), а також багатьох інших "розумних словах".

Вихідний код сайту є відкритим, щоб кожен бажаючий мав можливість впливати на суть і якість проекту.

%github%

[![Build Status](https://travis-ci.org/autowp/autowp.svg?branch=master)](https://travis-ci.org/autowp/autowp)
[![Code Climate](https://codeclimate.com/github/autowp/autowp/badges/gpa.svg)](https://codeclimate.com/github/autowp/autowp)
[![Coverage Status](https://coveralls.io/repos/github/autowp/autowp/badge.svg?branch=master)](https://coveralls.io/github/autowp/autowp?branch=master)

### Поддержать проект

Вы можете поддержать наш проект [финансово](/donate) или [морально](/ng/feedback).
Принять участие в [переводе сайта](https://github.com/autowp/autowp/tree/master/module/Application/language) на другие языки.
',

    'page/1/name' => "Головна сторінка",
    'page/2/name' => "Головне меню",
    'page/10/name' => "Бренд",
    'page/14/name' => "%BRAND_NAME% в хронологічному порядку",
    'page/15/name' => "Останні зображення %BRAND_NAME%",
    'page/19/name' => "Виробники",
    'page/20/name' => "Тип виробника",
    'page/21/name' => "Най-най",
    'page/22/name' => "Категорії",
    'page/24/name' => "Лімітовані ті спеціальні серії автомобілів",
    'page/25/name' => "Близнюки",
    'page/27/name' => "Технічні характеристики %TWINS_GROUP_NAME%",
    'page/28/name' => "Всі зображення %TWINS_GROUP_NAME%",
    'page/29/name' => "Додати зображення",
    'page/30/name' => "Вибір бренду",
    'page/31/name' => "Статті про автомобілі",
    'page/34/name' => "Всі зображення %CAR_NAME%",
    'page/36/name' => "техничні характеристики %CAR_NAME%",
    'page/37/name' => "Концепти та прототипи %BRAND_NAME%",
    'page/39/name' => "Логотипи %BRAND_NAME%",
    'page/40/name' => "%BRAND_NAME% Різне",
    'page/41/name' => "Несортоване",
    'page/42/name' => "Форуми",
    'page/45/name' => "Додати топік",
    'page/48/name' => "Особистій кабінет",
    'page/49/name' => "Особисті повідомлення",
    'page/51/name' => "Нові зображення",
    'page/52/name' => "Реєстрація",
    'page/53/name' => "ok",
    'page/54/name' => "Підтвердження e-mail",
    'page/55/name' => "Мій e-mail",
    'page/56/name' => "Змінений",
    'page/57/name' => "Підписки на форумі",
    'page/60/name' => "Відновлення паролю",
    'page/61/name' => "Всі виробники",
    'page/63/name' => "Додані зображення",
    'page/66/name' => "Всі зображення %BRAND_NAME% %DESIGN_PROJECT_NAME%",
    'page/67/name' => "Сторінка модератора",
    'page/68/name' => "сторінка сайта",
    'page/69/name' => "Додати",
    'page/70/name' => "Змінити",
    'page/71/name' => "Права",
    'page/73/name' => "Зображення",
    'page/74/name' => "Автомобілі за абеткою",
    'page/75/name' => "Журнал подій",
    'page/76/name' => "Немодероване",
    'page/77/name' => "Трафік",
    'page/79/name' => "Авторизація",
    'page/80/name' => "Отправленные",
    'page/81/name' => "Системні повідомлення",
    'page/83/name' => "Переміщення",
    'page/86/name' => "Зображення успішно завантажене на сайт",
    'page/87/name' => "Ще",
    'page/89/name' => "Зворотній зв'язок",
    'page/90/name' => "Вихід",
    'page/91/name' => "Реєстрація",
    'page/93/name' => "Повідомлення відправлене",
    'page/94/name' => "Немодеровані",
    'page/96/name' => "Автомобілі-близнюки",
    'page/97/name' => "Ракурси",
    'page/100/name' => "Атрибути",
    'page/102/name' => "Редактор характеристик %CAR_NAME%",
    'page/103/name' => "Історія зміни",
    'page/104/name' => "Користувальницька статистика",
    'page/105/name' => "Додати коментар",
    'page/106/name' => "Правила",
    'page/107/name' => "Заявки на видалення",
    'page/109/name' => "Cutaway",
    'page/110/name' => "Коментарі",
    'page/114/name' => "Журнал ТТХ",
    'page/117/name' => "Мапа",
    'page/119/name' => "Статистика",
    'page/120/name' => "Блоки",
    'page/122/name' => "Технічні характеристики",
    'page/123/name' => "Мої облікові записи",
    'page/124/name' => "Хто онлайн?",
    'page/125/name' => "Категорії",
    'page/126/name' => "Додати",
    'page/127/name' => "Редагувати",
    'page/128/name' => "Вхідні",
    'page/129/name' => "Профіль",
    'page/130/name' => "Мої зображення",
    'page/131/name' => "Одиниці даних",
    'page/133/name' => "Управлиння доступом",
    'page/134/name' => "Новий пароль",
    'page/135/name' => "Новий пароль збережено",
    'page/136/name' => "Про проект",
    'page/137/name' => "Видалення облікового запису",
    'page/138/name' => "%CAR_TYPE_NAME% %BRAND_NAME% в хронологічному порядку",
    'page/141/name' => "Додані зображення %BRAND_NAME%",
    'page/144/name' => "Выбір parent",
    'page/148/name' => "Обрізання",
    'page/149/name' => "Переміщення зображення",
    'page/153/name' => "Близнюки %BRAND_NAME%",
    'page/154/name' => "Най %MOST_NAME%",
    'page/155/name' => "Най %MOST_NAME% серед %CAR_TYPE_NAME%",
    'page/156/name' => "Най %MOST_NAME% серед %CAR_TYPE_NAME% %YEAR_NAME%",
    'page/161/name' => "Пульс",
    'page/162/name' => "Всі Зображення",
    'page/164/name' => "Най-най",
    'page/165/name' => "Най %MOST_NAME% %BRAND_NAME%",
    'page/166/name' => "Най %MOST_NAME% серед %CAR_TYPE_NAME% %BRAND_NAME%",
    'page/167/name' => "Най %MOST_NAME% серед %CAR_TYPE_NAME% %BRAND_NAME% %YEAR_NAME%",
    'page/173/name' => "Статистика",
    'page/174/name' => "Specs",
    'page/175/name' => "Заводи",
    'page/176/name' => "Додати",
    'page/180/name' => "Заводи",
    'page/182/name' => "Продукція",
    'page/186/name' => "Всі зображення",
    'page/188/name' => "Конфлікти",
    'page/189/name' => "Занадто багато конфліктів",
    'page/196/name' => "Пожертвування",
    'page/197/name' => "Історія зміни тексту",
    'page/198/name' => "Контакти",

    'page/1/title' => "Енциклопедія автомобілів в зображеннях. AutoWP.ru",
    'page/14/title' => "%BRAND_NAME% за хронологічним порядком",
    'page/15/title' => "Останні зображення %BRAND_NAME%",
    'page/19/title' => "Виробники",
    'page/21/title' => "Най-най",
    'page/22/title' => "Категорії",
    'page/25/title' => "Автомобілі-бизнюки",
    'page/27/title' => "Технічні характеристики %TWINS_GROUP_NAME%",
    'page/28/title' => "Всі зображення %TWINS_GROUP_NAME%",
    'page/29/title' => "Додати зображення",
    'page/30/title' => "Вибір бренду",
    'page/31/title' => "Статті про автомобілі",
    'page/34/title' => "Всі зображення %CAR_NAME%",
    'page/36/title' => "Техничні характеристики %CAR_NAME%",
    'page/37/title' => "Концепти і прототипи %BRAND_NAME%",
    'page/39/title' => "Логотипи %BRAND_NAME%",
    'page/40/title' => "%BRAND_NAME% Різне",
    'page/41/title' => "Не сортоване",
    'page/42/title' => "Форуми",
    'page/45/title' => "Додати топік",
    'page/48/title' => "Особистий кабінет",
    'page/49/title' => "Особисті повідомлення",
    'page/51/title' => "",
    'page/52/title' => "Реєстрація",
    'page/53/title' => "Успішна реєстрація",
    'page/54/title' => "Підтвердження адреси електронної пошти",
    'page/55/title' => "Мій e-mail",
    'page/56/title' => "Зміна адреси e-mail",
    'page/57/title' => "Підписки на форумі",
    'page/60/title' => "Відновлення паролю",
    'page/63/title' => "Додавання зображення",
    'page/66/title' => "Всі зображення %BRAND_NAME% %DESIGN_PROJECT_NAME%",
    'page/76/title' => "Не модероване",
    'page/79/title' => "Авторизація",
    'page/80/title' => "Відправлені",
    'page/81/title' => "Системні повідомлення",
    'page/83/title' => "Переміщення",
    'page/86/title' => "Зображення успішно завантажене на сайт",
    'page/87/title' => "Ще",
    'page/94/title' => "Не можеровані",
    'page/102/title' => "Редактор характеристик %CAR_NAME%",
    'page/103/title' => "Історія зміни",
    'page/105/title' => "Додати коментар",
    'page/106/title' => "Правила",
    'page/107/title' => "Заявки на видалення",
    'page/110/title' => "Комментарі",
    'page/114/title' => "Журнал ТТХ",
    'page/117/title' => "Мапа",
    'page/122/title' => "Техничні характеристики",
    'page/123/title' => "Мої облікові записи",
    'page/125/title' => "Категорії",
    'page/126/title' => "Додати",
    'page/127/title' => "Редагувати",
    'page/128/title' => "Вхідні",
    'page/129/title' => "Профіль",
    'page/130/title' => "Мої зображення",
    'page/133/title' => "Access Control",
    'page/134/title' => "Новий пароль",
    'page/135/title' => "",
    'page/136/title' => "Про проект",
    'page/137/title' => "",
    'page/138/title' => "%CAR_TYPE_NAME% %BRAND_NAME% за хронологічним порядком",
    'page/141/title' => "Додані зображення %BRAND_NAME%",
    'page/144/title' => "Вібір parent",
    'page/148/title' => "Обрізання",
    'page/149/title' => "Переміщення зображення",
    'page/153/title' => "Близнюки %BRAND_NAME%",
    'page/154/title' => "Най %MOST_NAME%",
    'page/155/title' => "Най %MOST_NAME% серед %CAR_TYPE_NAME%",
    'page/156/title' => "Най %MOST_NAME% серед %CAR_TYPE_NAME% %YEAR_NAME%",
    'page/161/title' => "Пульс",
    'page/162/title' => "Всі зображення",
    'page/164/title' => "Най-най",
    'page/165/title' => "Най %MOST_NAME% %BRAND_NAME%",
    'page/166/title' => "Най %MOST_NAME% серед %CAR_TYPE_NAME% %BRAND_NAME%",
    'page/167/title' => "Най %MOST_NAME% серед %CAR_TYPE_NAME% %BRAND_NAME% %YEAR_NAME%",
    'page/173/title' => "Статистика",
    'page/174/title' => "Specs",
    'page/175/title' => "Заводи",
    'page/176/title' => "Додати",
    'page/180/title' => "Заводи",
    'page/182/title' => "Продукція",
    'page/186/title' => "Всі зображення",
    'page/188/title' => "Конфлікти",
    'page/189/title' => "Занадто багато конфліктів",
    'page/196/title' => "Пожертви",
    'page/197/title' => "Історія змін тексту",
    'page/198/title' => "Контакти",

    'page/14/breadcrumbs' => "За хронологічним порядком",
    'page/15/breadcrumbs' => "Останні зображення",
    'page/19/breadcrumbs' => "Виробники",
    'page/27/breadcrumbs' => "Техничні характеристики",
    'page/28/breadcrumbs' => "Всі зображення",
    'page/30/breadcrumbs' => "Вибір бренду",
    'page/31/breadcrumbs' => "Статті про автомобілі",
    'page/34/breadcrumbs' => "Всі зображення",
    'page/36/breadcrumbs' => "Specifications",
    'page/37/breadcrumbs' => "Концепти і прототипи",
    'page/39/breadcrumbs' => "Логотипи",
    'page/40/breadcrumbs' => "Різне",
    'page/41/breadcrumbs' => "Не сортоване",
    'page/45/breadcrumbs' => "Додати топік",
    'page/63/breadcrumbs' => "Додавання зображення",
    'page/66/breadcrumbs' => "Всі зображення",
    'page/76/breadcrumbs' => "Не модероване",
    'page/83/breadcrumbs' => "Переміщення",
    'page/86/breadcrumbs' => "Успіх",
    'page/102/breadcrumbs' => "Редактор характеристик автомобіля",
    'page/109/breadcrumbs' => "Cutaway",
    'page/122/breadcrumbs' => "Техничні характеристики",
    'page/123/breadcrumbs' => "My accounts",
    'page/136/breadcrumbs' => "Про проект",
    'page/141/breadcrumbs' => "Додані зображення %BRAND_NAME%",
    'page/144/breadcrumbs' => "Вибір бренду",
    'page/146/breadcrumbs' => "Вібір групи близнюків",
    'page/147/breadcrumbs' => "Вібір проекту дизана",
    'page/148/breadcrumbs' => "Обрізання",
    'page/149/breadcrumbs' => "Переміщення хобоаження",
    'page/161/breadcrumbs' => "Пульс",
    'page/162/breadcrumbs' => "Всі зображення",
    'page/164/breadcrumbs' => "Най-най",
    'page/173/breadcrumbs' => "Статистика",
    'page/174/breadcrumbs' => "Specs",
    'page/175/breadcrumbs' => "Заводи",
    'page/176/breadcrumbs' => "Додати",
    'page/178/breadcrumbs' => "Выбір завода",
    'page/180/breadcrumbs' => "Заводи",
    'page/182/breadcrumbs' => "Продукція",
    'page/186/breadcrumbs' => "Всі зображення",
    'page/188/breadcrumbs' => "Конфлікти",
    'page/189/breadcrumbs' => "Занадто багато конфліктів",
    'page/196/breadcrumbs' => "Пожертвування",
    'page/197/breadcrumbs' => "Історя зміни тексту",
    'page/198/breadcrumbs' => "Контакти",

    'page/201/name'        => "Маскоти",
    'page/201/title'       => "Маскоти",
    'page/201/breadcrumbs' => "Маскоти",

    'page/202/name'        => 'Довідка по ракурсам',
    'page/202/title'       => 'Довідка по ракурсам',
    'page/202/breadcrumbs' => 'Довідка по ракурсам',

    'page/203/name'        => 'Користувачі',
    'page/203/title'       => 'Користувачі',
    'page/203/breadcrumbs' => 'Користувачі',

    'page/204/name'        => 'Telegram',
    'page/204/title'       => 'Telegram',
    'page/204/breadcrumbs' => 'Telegram',

    'page/205/name'        => 'Коментарі',
    'page/205/title'       => 'Коментарі',
    'page/205/breadcrumbs' => 'Коментарі',

    'page/208/name'        => 'Двигуни %BRAND_NAME%',
    'page/208/title'       => 'Двигуни %BRAND_NAME%',
    'page/208/breadcrumbs' => 'Двигуни %BRAND_NAME%',

    'page/211/name'        => 'Контакти',
    'page/211/title'       => 'Контакти',
    'page/211/breadcrumbs' => 'Контакти',

    'page/212/name'        => 'Шаблони модераторських голосів',
    'page/212/title'       => 'Шаблони модераторських голосів',
    'page/212/breadcrumbs' => 'Шаблони модераторських голосів',

    'moder-menu/title' => 'Меню модератора',
    'moder-menu/inbox' => 'Инбокс',

    'moder/database-id-%s' => 'В базі даних числиться під номером %s',
    'ng/moder/database-id-n' => 'В базі даних числиться під номером {id}',

    'moder/picture/missing-perspective' => 'Пропущений ракурс',
    'moder/picture/delete-queue' => 'Черга видалення',
    'moder/picture/votes' => 'Голоси',
    'moder/picture/comments' => 'Зафлудили',
    'moder/picture/new-votes' => 'Нові заявки',
    'moder/picture/replaces' => 'Нові заміни',
    'moder/picture/edit/special-name' => 'Особлива назва',

    'moder/pictures/acceptance/message' => 'Повідомлення',

    'moder/vehicle/name' => 'Назва',
    'moder/vehicle/body' => 'Номер кузова',
    'moder/vehicle/spec' => 'Ринок',
    'moder/vehicle/type' => 'Тип кузова',
    'moder/vehicle/model-years' => 'Модельні роки',
    'moder/vehicle/begin' => 'Початок',
    'moder/vehicle/end' => 'Закінчення',
    'moder/item/produced' => 'Виготовлено',
    'moder/item/produced/number' => 'одиниц',
    'moder/item/produced/precision' => 'точно?',
    'moder/item/produced/about' => 'примірно',
    'moder/item/produced/exactly' => 'точно',
    'moder/vehicle/concept' => 'Концепт (прототип)',
    'moder/vehicle/group' => 'Група',
    'moder/vehicle/year' => 'рік',
    'moder/vehicle/year/from' => 'з',
    'moder/vehicle/year/to' => 'по',
    'moder/vehicle/month' => 'місяць',
    'moder/vehicle/today' => 'наш час',
    'moder/vehicle/today/ended' => 'випуск закінчено',
    'moder/vehicle/today/continue' => 'віготовляется в н.ч.',
    'moder/vehicle/is-concept/no' => 'ні',
    'moder/vehicle/is-concept/yes' => 'так',
    'moder/vehicle/is-concept/inherited-no' => 'успадковано (ні)',
    'moder/vehicle/is-concept/inherited-yes' => 'успадковано (так)',
    'moder/vehicle/is-concept/inherited' => 'успадковано',

    'moder/item/short-description' => 'Короткий опис',
    'moder/item/full-description' => 'Повний опис',

    'moder/vehicle/meta/description' => 'Короткий опис',

    'moder/vehicle/move/here' => 'сюди',

    'moder/vehicle/add/as-submodel' => 'В автомобіль',

    'attrs/attribute/name' => 'Назва',
    'attrs/attribute/type' => 'Тип',
    'attrs/attribute/unit' => 'Одиниця виміру',
    'attrs/attribute/precision' => 'Точність (для float аттрибуів)',
    'attrs/attribute/description' => 'Опис',

    'attrs/list-options/parent' => 'Батько',
    'attrs/list-options/name' => 'Назва',

    'moder/attrs/zones' => 'Зони',
    'moder/attrs/parameters' => 'Параметри атрибута',
    'moder/attrs/parameters/options-list' => 'Список значень (для спискових типів)',
    'moder/attrs/parameters/options-list/add' => 'Додати значення',
    'moder/attrs/attributes' => 'Атрибути',
    'moder/attrs/attribute/add-subattribute' => 'Додати підатрибут',
    'moder/attrs/attributes-order' => 'Порядок атрибутів',

    'category/name' => 'Назва',
    'category/parent' => 'Батько',
    'categories/other' => 'Інші',

    'moder/categories/add' => 'Додати',
    'moder/categories/edit' => 'Змінити',
    'moder/categories/new' => 'Новий',

    'moder/picture/edit-picture-%s' => 'Управління зображенням №%s',
    'moder/picture/edit-item-%s' => 'Управління %s',
    'moder/picture/edit-brand-%s' => 'Управління брендом %s',
    'moder/picture/edit-engine-%s' => 'Управління двигуном %s',
    'moder/picture/edit-factory-%s' => 'Управління заводом %s',

    'moder/picture/picture-n-%s' => 'Зображення №%s',
    'moder/picture/previous' => '<< попередне',
    'moder/picture/next' => 'наступне >>',
    'moder/picture/previous-new' => '<< попередне не обработане',
    'moder/picture/next-new' => 'наступне не обработане >>',

    'moder/picture/perspective' => 'Ракурс',
    'moder/picture/perspective-by' => 'Встановив: ',

    'moder/picture/acceptance' => 'Статус/Видалення/Ухвалення',
    'moder/picture/acceptance/accepted' => 'Прийнято',
    'moder/picture/acceptance/not-accepted' => 'Не прийнято',
    'moder/picture/acceptance/in-delete-queue' => 'Поставлено в чергу на видалення',
    'moder/picture/acceptance/accept' => 'Прийнять',
    'moder/picture/acceptance/delete' => 'Видалити',
    'moder/picture/acceptance/unaccept' => 'Зробить не прийнятой',
    'moder/picture/acceptance/restore' => 'Відновити',
    'moder/picture/acceptance/removed' => 'Видалено',
    'moder/picture/acceptance/removing' => 'Видаляється',
    'moder/picture/acceptance/inbox' => 'Вхідні',
    'moder/picture/acceptance/reason' => 'Причина',
    'moder/picture/acceptance/custom' => 'Своя ...',
    'moder/picture/acceptance/add-reason' => 'Додати шаблон',
    'moder/picture/acceptance/vote' => 'Голос',

    'moder/picture/acceptance/want-accept' => 'Хочу прийняти',
    'moder/picture/acceptance/want-delete' => 'Хочу видалити',
    'moder/picture/acceptance/cancel-vote' => 'Скасувати мою заявку',
    'moder/picture/acceptance/already-voted' => 'Вже подали: ',
    'moder/picture/acceptance/that-is-one-accepted-picture' => 'Це єдине прийняте зображенно цього автомобілю',
    'ng/moder/picture/acceptance/accepted-pictures-is-n' => 'Прийнятих зображень цього автомобіля всього {count}',
    'moder/picture/acceptance/accepted-pictures-is-%s' => 'Прийнятих зображень цього автомобіля всього %s',

    'moder/picture/public-url:' => 'На сайті: ',
    'moder/picture/image:' => 'Зображення: ',
    'moder/picture/image-specs:' => 'Характеристики зображення: ',
    'moder/picture/resolution:' => 'Роздільна здатність: ',
    'moder/picture/filesize:' => 'Размір файла: ',
    'moder/picture/upload-date:' => 'Додано: ',
    'moder/picture/settings' => 'Налаштування',
    'moder/picture/copyrights' => 'Копірайти',

    'moder/pciture/move/brands' => 'Бренди',
    'moder/pciture/move/factories' => 'Заводи',
    'moder/pciture/move/engines' => 'Двигуни',

    'brand' => 'Бренд',
    'brand/name' => 'Назва',
    'brand/logo' => 'Логотип',

    'moder/brands/meta-data/full-name' => 'Повна назва',
    'moder/brands/logo/description' => '* Логотип повинен бути строго в форматі PNG.
* Всі прозорі області повинні бути прозорими, а не білими!
* Логотип повинен касатися країв зображення. Ніяких полів не треба
* Завантажуйте в максимально доступній розділній здатности - це забезпечить якість і можливість в майбутньому десь скористатися цим великим фото. На сайті все розміри будуть підігнані ',
    'moder/brands/logo/saved' => 'Логотип збережено',

    'moder/edit-object' => 'керування',

    'moder/markdown/description' => 'Синтаксис Markdown.

Кілька описів мови языка:
[1](https://ru.wikipedia.org/wiki/Markdown),
[2](https://en.wikipedia.org/wiki/Markdown),
[3](https://guides.github.com/features/mastering-markdown/),
[4](https://daringfireball.net/projects/markdown/basics),
[5](http://rukeba.com/by-the-way/markdown-sintaksis-po-russki)

Посилання на внутрісайтовие сторінки слід писати не повністю: ~~http://autowp.ru/bmw/~~ */bmw/*',
    'moder/markdown/edit' => 'Редагувати',
    'moder/markdown/preview' => 'Попередній перегляд',
    'moder/markdown/history' => 'Історія',

    'moder/users/login' => 'Логін',
    'moder/users/name' => 'Ім`я',
    'moder/users/role' => 'Роль',
    'moder/users/profile' => 'Профіль',
    'moder/users/last-visit' => 'Останній візіт',
    'moder/users/registration' => 'Реєстрація',

    'latitude' => 'Широта',
    'longtitude' => 'Довгота',

    'museum/name' => 'Назва',
    'museum/address' => 'Адрес',
    'museum/photo' => 'Фотографія',
    'museum/description' => 'Опис',

    'moder/museums/add' => 'Додати музей',

    'factory/name' => 'Назва',
    'factory/year_from' => 'Рік з',
    'factory/year_to' => 'Рік по',

    'moder/comments/title' => 'Комментарі',
    'moder/comments/filter' => 'Фільтр',
    'moder/comments/filter/user-id' => 'Користувач №',
    'moder/comments/filter/brand-id' => 'Бренд №',
    'moder/comments/filter/moderator_attention' => 'Увага модераторів',
    'moder/comments/filter/moderator_attention/not-matters' => 'Не важливо',
    'moder/comments/filter/moderator_attention/not-required' => 'Не вимагаєтся',
    'moder/comments/filter/moderator_attention/required' => 'Вимогаєтся',
    'moder/comments/filter/moderator_attention/resolved' => 'Виконано',
    'moder/comments/filter/vehicle-id' => 'Одиниці даних',
    'moder/comments/not-readed' => 'не прочитано',

    'engine/name' => 'Назва',

    'moder/engines/engine/vehicles' => 'Автомобілі на цьому двигуні',

    'page/name' => 'Назва',
    'page/is_group_node' => 'Групообразуючий вузел?',
    'page/registered_only' => 'Тілки для зарєстрованих?',
    'page/guests_only' => 'Тільки для гостей?',
    'page/class' => 'Клас',
    'page/parent' => 'Батько',

    'moder/pages/new' => 'Новий',

    'moder/index/other-tools' => 'Інші інструменти',

    'moder/acl/add-role' => 'Додати роль',
    'moder/acl/add-rule' => 'Додати правило',
    'moder/acl/add-rule/action' => 'Дія',
    'moder/acl/add-rule/action/allow' => 'дозволити',
    'moder/acl/add-rule/action/deny' => 'заборонити',
    'moder/acl/add-parent' => 'Додати батька',
    'moder/acl/role' => 'Роль',
    'moder/acl/parent-role' => 'Батьківська роль',
    'moder/acl/privilege' => 'Превілегия',

    'votings/do-vote' => 'Голосовати',
    'votings/who-voted' => 'Хто проголосовав?',
    'votings/voting/voters/during-%s-%s' => 'Опитування проводится з %s по %s',
    'votings/voting/voters/show-all' => 'показати всіх',
    'votings/voting/voters/show-contributors' => 'показати тільки від 100 заваньтажених зображень',

    'museums/museum/address:' => 'Адреса:',
    'museums/museum/on-the-map' => 'на мапі',
    'museums/museum/website:' => 'Web-сайт: ',

    'restore-password/text' => 'Якщо ви забули свій пароль - введіть ваш e-mail (який ви вказали при реєстрації) і на нього буде висланий пароль. ',
    'restore-password/new-password/text' => 'Введіть новий пароль',
    'restore-password/new-password/saved' => 'Новий пароль вдало збережений.

Не забувайте його',
    'restore-password/new-password/instructions-sent' => 'На ваш e-mail відправлені подальші інструкції',
    'restore-password/new-password/email-not-found' => 'Користувач за таким  e-mail не знайден',
    'restore-password/new-password/mail/subject' => 'Відновлення паролю',
    'restore-password/new-password/mail/body-%s' =>
        "Для введення новго паролю перейдіть за посиланням: %s\n\n" .
        "З повагою, робот www.autowp.ru\n",

    'twins/group/name' => 'Назва',
    'twins/group/description' => 'Опис',

    'specifications-editor/description' => 'Прохання поставитися з усією відповідальністю до всіх виконуваних дій, тому що вони стануть надбанням громадськості.


Про структуру самих характеристик.

Всі характеристики організовані у вигляді дерева елементів "параметр - значення". Значення можуть бути числовими і текстовими.

Важливою особливістю є той факт, що кожна характеристика може бути задана одночасно кількома користувачами. У цьому випадку актуальним (використовуваним) значенням є те, що система вважатиме пріоритетним по ряду ознак.

Якщо ви зіткнулися з ситуацією, коли вам не вдається перекрити введене кимось раніше значення, то ви можете просто написати про це автору. Втім в процесі реалізації система автоматичного повідомлення автором про те, що з його значенням хтось не згоден.


Всі значення, які тут вводяться - відображаються на сайті, в характеристиках, використовуються в побудові розділи "Най-най", а також відображаються в деяких інших місцях сайту.',
    'specifications-editor/not-save' => 'Данні що були збережені через помилку. Подробиці нижче',
    'specifications-editor/parameter' => 'Характеристика',
    'specifications-editor/your-value' => 'Ваше значення',
    'specifications-editor/actual-value' => 'Актуальне значення',
    'specifications-editor/all-values' => 'Введені значення',
    'specifications-editor/tabs/info' => 'Інформація',
    'specifications-editor/tabs/engine' => 'Двигун',
    'specifications-editor/tabs/specs' => 'Основні ТТХ',
    'specifications-editor/tabs/result' => 'Результат',
    'specifications-editor/tabs/admin' => 'Admin',
    'specifications-editor/engine' => 'Двигун з каталогу',
    'specifications-editor/engine/inherited-from' => 'Успадковано від',
    'specifications-editor/engine/select-another' => 'Обрати інший двигун',
    'specifications-editor/engine/cancel' => 'Відменити двигун',
    'specifications-editor/engine/inherit' => 'Успадковувать двигун',
    'specifications-editor/engine/not-selected' => '[не обран]',
    'specifications-editor/engine/select' => 'Обрати двигун',
    'specifications-editor/engine/dont-inherit' => 'Не успадковувати двигун',
    'specifications-editor/save' => 'Зберегти',

    'specifications-editor/log' => 'Журнал ТТХ',
    'specifications-editor/log/date' => 'Дата',
    'specifications-editor/log/user' => 'Користувач',
    'specifications-editor/log/object' => 'Об`єкт',
    'specifications-editor/log/attribute' => 'Атрибут',
    'specifications-editor/log/value' => 'Значення',
    'specifications-editor/log/editor' => 'Редактор',
    'specifications-editor/log/to-editor' => 'в редактор',
    'specifications-editor/log/filter/user-id' => 'Користувач',
    'specifications-editor/log/low-weight-text' =>'Зареєстровано велику кількість конфліктів в даних, введених вами. Інші люди часто спростовують інформацію, надану вами.

Введення даних тимчасово призупинено. Прохання виправити ситуацію, провести ревізію конфліктів.

Здійснити це допоможе [спеціальний інтерфейс] (/ account / specs-conflicts / conflict / minus-weight), в якому зібрані принаймні ті помилки, які виявили відвідувачі сайту.', 
    'specifications-editor/errors-alert' => '**Увага!** Ймовірно, у вас накопичилося значна кількість помилок.

Деякі з них, виявлені іншими відвідувачами, ви можете знайти [тут](/account/specs-conflicts)',

    'specifications-editor/admin/date' => 'Дата',
    'specifications-editor/admin/user' => 'Користувач',
    'specifications-editor/admin/parameter' => 'Характеристика',
    'specifications-editor/admin/value' => 'Значення',
    'specifications-editor/admin/move' => 'Перенести',

    'pm/user-%s-edited-brand-description-%s-%s' => 'Користувач %s редагував опис бренду %s ( %s )',
    'pm/user-%s-edited-item-language-%s-%s' => "Користувач %s редагував мовну інформацію %s ( %s )\n%s",
    'pm/user-%s-edited-vehicle-meta-data-%s-%s-%s' => "Користувач %s редагував інформацію про %s ( %s )\n%s",
    'pm/user-%s-adds-item-%s-%s-to-item-%s-%s' => 'Користувач %s додав %s ( %s ) з %s ( %s )',
    'pm/user-%s-removed-item-%s-%s-from-item-%s-%s' => 'Користувач %s видалив %s ( %s ) из %s ( %s )',
    'pm/user-%s-cancel-link-vehicle-%s-%s-with-categories-%s' => 'Користувач %s відменив вашу прив’язку автомобіля %s ( %s ) до категорій: %s',
    'pm/user-%s-edited-factory-description-%s-%s' => 'Користувач %s редагував опис завода %s ( %s )',
    'pm/your-picture-%s-enqueued-to-remove-%s' => "Додане вами зображення %s поставлене в чергу на видалення\n%s",
    'pm/new-picture-%s-vote-%s/accept' => "Подана заявка на прийняття доданого вами зображення\n%s\nПричина: %s",
    'pm/new-picture-%s-vote-%s/delete' => "Подана заявка на видалення доданого вами зображення\n%s\nПричина: %s",
    'pm/user-%s-edited-picture-copyrights-%s-%s' => 'Користувач %s редагував текст копірайтів зображення %s ( %s )',
    'pm/user-%s-accept-replace-%s-%s' => '%s прийняв заміну %s на %s',
    'pm/your-picture-accepted-%s' => "Додане вами зображення прийнято на сайт\n%s",
    'pm/user-%s-edited-twins-description-%s-%s' => 'Користувач %s редагував опис групи близнюків %s ( %s )',
    'pm/user-%s-edited-vehicle-specs-%s' => '%s вніс ттх для автомобіля %s',
    'pm/user-%s-canceled-vehicle-engine-%s-%s-%s' => '%s відменив двигун %s для автомобіля %s ( %s )',
    'pm/user-%s-set-inherited-vehicle-engine-%s-%s' => '%s встановив успадкування двигуна автомобілю %s ( %s )',
    'pm/user-%s-set-vehicle-engine-%s-%s-%s' => '%s призначив двигун %s автомобілю %s ( %s )',
    'pm/user-%s-replies-to-you-%s' => "%s відповів на ваше повідомення\n%s",
    'pm/user-%s-post-new-message-%s' => "%s написав повідомлення\n%s",

    'moder/vehicle/changes/name-%s-%s' => 'назва з "%s" на "%s"',
    'moder/vehicle/changes/body-%s-%s' => 'номер кузова з "%s" на "%s"',
    'moder/vehicle/changes/from/year-%s-%s' => 'рік початку вироблення з "%s" на "%s"',
    'moder/vehicle/changes/from/month-%s-%s' => 'місяць початку вироблення з "%s" на "%s"',
    'moder/vehicle/changes/to/year-%s-%s' => 'рік закінчення вироблення з "%s" на "%s"',
    'moder/vehicle/changes/to/month-%s-%s' => 'місяць закінчення вироблення з "%s" на "%s"',
    'moder/vehicle/changes/to/today-%s-%s' => 'вироблення в наш час з "%s" на "%s"',
    'moder/vehicle/changes/produced/count-%s-%s' => 'кількість вироблених одиниць з "%s" на "%s"',
    'moder/vehicle/changes/produced/exactly-%s-%s' => 'точність кількості вироблених одиниць з "%s" на "%s"',
    'moder/vehicle/changes/is-group-%s-%s' => 'флаг "група" з "%s" на "%s"',
    'moder/vehicle/changes/car-type-%s-%s' => 'тип кузова з "%s" на "%s"',
    'moder/vehicle/changes/model-years/from-%s-%s' => 'модельний рік початку вироблення з "%s" на "%s"',
    'moder/vehicle/changes/model-years/to-%s-%s' => 'модельний рік закінчення віроблення з "%s" на "%s"',
    'moder/vehicle/changes/spec-%s-%s' => 'spec з "%s" на "%s"',

    'moder/vehicle/changes/boolean/true' => 'так',
    'moder/vehicle/changes/boolean/false' => 'ні',

    'specifications/no-value-text' => 'немає значення',
    'specifications/boolean/false' => 'ні',
    'specifications/boolean/true' => 'так',

    "Brand '%value%' already exists" => "Бренд з наззвою '%value%' вже існує",
    "E-mail '%value%' not registered" => "E-mail '%value%' не зареєстровано на сайті",
    "E-mail '%value%' already registered" => "E-mail '%value%' уже зарейстрованон на сайті",

    'specs/attrs/45' => 'назва модіфікації',
    'specs/attrs/95' => 'рік вироблення',
    'specs/attrs/95/96' => 'з',
    'specs/attrs/95/97' => 'по',
    'specs/attrs/95/106' => 'продажі',
    'specs/attrs/95/106/109' => 'з',
    'specs/attrs/95/106/109/129' => 'рік',
    'specs/attrs/95/106/109/130' => 'місяць',
    'specs/attrs/95/106/109/131' => 'число',
    'specs/attrs/95/106/111' => 'по',
    'specs/attrs/95/106/111/132' => 'рік',
    'specs/attrs/95/106/111/133' => 'місяць',
    'specs/attrs/95/106/111/134' => 'число',
    'specs/attrs/95/104' => 'модельниє',
    'specs/attrs/95/104/113' => 'з',
    'specs/attrs/95/104/114' => 'по',
    'specs/attrs/95/107' => 'дебют на автосалоні',
    'specs/attrs/95/107/118' => 'рік',
    'specs/attrs/95/107/119' => 'місяць',
    'specs/attrs/95/107/120' => 'число',
    'specs/attrs/95/108' => 'виробництво',
    'specs/attrs/95/108/121' => 'з',
    'specs/attrs/95/108/121/123' => 'год',
    'specs/attrs/95/108/121/124' => 'місяць',
    'specs/attrs/95/108/121/125' => 'число',
    'specs/attrs/95/108/122' => 'по',
    'specs/attrs/95/108/122/126' => 'рік',
    'specs/attrs/95/108/122/127' => 'місяць',
    'specs/attrs/95/108/122/128' => 'число',
    'specs/attrs/95/135' => 'участь в змаганнях',
    'specs/attrs/95/135/136' => 'з',
    'specs/attrs/95/135/137' => 'по',
    'specs/attrs/16' => 'основні',
    'specs/attrs/16/12' => 'кількість місць',
    'specs/attrs/16/12/67' => 'всього',
    'specs/attrs/16/12/67/description' => 'сидячих',
    'specs/attrs/16/12/68' => 'з них неполноціних',
    'specs/attrs/16/12/69' => 'стоячих',
    'specs/attrs/16/12/103' => 'загальна місткість',
    'specs/attrs/16/12/103/description' => 'з урахування стоячих місць',
    'specs/attrs/16/13' => 'кілкість дверей',
    'specs/attrs/16/66' => 'розташування руля',
    'specs/attrs/16/66/options/11' => 'зліва',
    'specs/attrs/16/66/options/12' => 'зправа',
    'specs/attrs/16/66/options/13' => 'по центру',
    'specs/attrs/16/204' => 'конструкція',
    'specs/attrs/16/204/options/85' => 'несучий кузов',
    'specs/attrs/16/204/options/86' => 'рамна',
    'specs/attrs/14' => 'геометрія',
    'specs/attrs/14/4' => 'колісна база',
    'specs/attrs/14/17' => 'габарити',
    'specs/attrs/14/17/description' => 'Зовнішні розміри',
    'specs/attrs/14/17/1' => 'довжина',
    'specs/attrs/14/17/2' => 'ширина',
    'specs/attrs/14/17/3' => 'висота',
    'specs/attrs/14/17/140' => 'ширина, з урахуванням дзеркал',
    'specs/attrs/14/17/141' => 'висота, з урахуванням рейленгів',
    'specs/attrs/14/17/203' => 'висота з відкритим дахом',
    'specs/attrs/14/18' => 'колія',
    'specs/attrs/14/18/5' => 'передня',
    'specs/attrs/14/18/6' => 'задня',
    'specs/attrs/14/63' => 'аеродинамічний супротив',
    'specs/attrs/14/63/64' => 'лобове',
    'specs/attrs/14/63/65' => 'бокове',
    'specs/attrs/14/167' => 'дорожній просвіт',
    'specs/attrs/14/167/description' => 'клиренс',
    'specs/attrs/14/167/176' => 'мин',
    'specs/attrs/14/167/7' => 'стандарт',
    'specs/attrs/14/167/168' => 'макс',
    'specs/attrs/70' => 'маса',
    'specs/attrs/70/71' => 'суха',
    'specs/attrs/70/72' => 'споряджена',
    'specs/attrs/70/73' => 'повна',
    'specs/attrs/22' => 'двигун',
    'specs/attrs/22/100' => 'назва',
    'specs/attrs/22/98' => 'паливо',
    'specs/attrs/22/98/options/28' => 'бензин',
    'specs/attrs/22/98/options/29' => 'водород',
    'specs/attrs/22/98/options/30' => 'биоетанол',
    'specs/attrs/22/98/options/31' => 'електричество',
    'specs/attrs/22/98/options/32' => 'газ',
    'specs/attrs/22/98/options/33' => 'дизель',
    'specs/attrs/22/98/options/84' => 'Flex-fuel',
    'specs/attrs/22/98/options/36' => 'А-66',
    'specs/attrs/22/98/options/37' => 'А-70',
    'specs/attrs/22/98/options/38' => 'А-72',
    'specs/attrs/22/98/options/39' => 'А-76',
    'specs/attrs/22/98/options/40' => 'А-78',
    'specs/attrs/22/98/options/41' => 'А-80',
    'specs/attrs/22/98/options/42' => 'АІ-92',
    'specs/attrs/22/98/options/43' => 'АІ-93',
    'specs/attrs/22/98/options/44' => 'АІ-95',
    'specs/attrs/22/98/options/45' => 'АІ-98',
    'specs/attrs/22/98/options/34' => 'CNG',
    'specs/attrs/22/98/options/35' => 'LPG',
    'specs/attrs/22/19' => 'розташування',
    'specs/attrs/22/19/20' => 'розташування',
    'specs/attrs/22/19/20/options/1' => 'спереду',
    'specs/attrs/22/19/20/options/2' => 'ззаду',
    'specs/attrs/22/19/20/options/3' => 'центральне',
    'specs/attrs/22/19/21' => 'орієнтація',
    'specs/attrs/22/19/21/options/4' => 'поздовжньо',
    'specs/attrs/22/19/21/options/5' => 'поперечно',
    'specs/attrs/22/23' => 'система жиавлення',
    'specs/attrs/22/23/options/6' => 'інжектор',
    'specs/attrs/22/23/options/24' => 'карбюратор',
    'specs/attrs/22/23/options/25' => '2 карбюратори',
    'specs/attrs/22/23/options/55' => '3 карбюратори',
    'specs/attrs/22/23/options/26' => '4 карбюратори,
    'specs/attrs/22/23/options/27' => '6 карбюраторів',
    'specs/attrs/22/24' => 'циліндри/клапани',
    'specs/attrs/22/24/25' => 'кількість ціліндрів',
    'specs/attrs/22/24/26' => 'розташування ціліндрів',
    'specs/attrs/22/24/26/options/7' => 'l',
    'specs/attrs/22/24/26/options/8' => 'V',
    'specs/attrs/22/24/26/options/9' => 'W',
    'specs/attrs/22/24/26/options/10' => 'O',
    'specs/attrs/22/24/26/options/101' => 'U',
    'specs/attrs/22/24/27' => 'клапанів на ціліндр',
    'specs/attrs/22/24/28' => 'диаметр ціліндрів',
    'specs/attrs/22/24/29' => 'хід поршня',
    'specs/attrs/22/24/159' => 'кут розвала',
    'specs/attrs/22/30' => 'ступінь стиснення',
    'specs/attrs/22/31' => 'об`єм',
    'specs/attrs/22/32' => 'потужність',
    'specs/attrs/22/32/33' => 'потужність',
    'specs/attrs/22/32/33/description' => 'Метрична (PS)
1 HP = 1.014 metric PS or CV',
    'specs/attrs/22/32/34' => 'в діапазоні від',
    'specs/attrs/22/32/35' => 'в діапазоні до',
    'specs/attrs/22/32/171' => 'максимальна потужність (DIN)',
    'specs/attrs/22/32/171/description' => 'потужність за DIN 70020. Європейський стандарт',
    'specs/attrs/22/32/172' => 'максимальна потужність (SAE certified)',
    'specs/attrs/22/32/172/description' => 'SAE Certified Power. Стандарт для US з 2005-06 року',
    'specs/attrs/22/32/173' => 'максимальна потужність (SAE net)',
    'specs/attrs/22/32/173/description' => 'Стандарт для US с 1971-72.
Трансмисія не враховується. Навісне обладнання - враховується',
    'specs/attrs/22/32/174' => 'максимальна потужність (SAE gross)',
    'specs/attrs/22/32/174/description' => 'Стандарт US 1972 года, приблизно до відповідній технології вимірювання потужности до 1972.
Трансмисія - не враховується',
    'specs/attrs/22/32/177' => 'максимальна потужність (JIS D 1001)',
    'specs/attrs/22/32/178' => 'максимальна потужність(ГОСТ)',
    'specs/attrs/22/32/178/description' => 'Стандарт СРСР и Російскої федерації',
    'specs/attrs/22/36' => 'обертаючий момент',
    'specs/attrs/22/36/37' => 'обертаючий момент',
    'specs/attrs/22/36/38' => 'в діапазоні від',
    'specs/attrs/22/36/39' => 'в діапазоні до',
    'specs/attrs/22/99' => 'турбонаддув',
    'specs/attrs/22/99/options/46' => 'нема',
    'specs/attrs/22/99/options/47' => 'є',
    'specs/attrs/22/99/options/48' => '×2',
    'specs/attrs/22/99/options/54' => '×3',
    'specs/attrs/22/99/options/49' => '×4',
    'specs/attrs/engine/turbo/options/x6' => '×6',
    'specs/attrs/22/156' => 'матеріал блока',
    'specs/attrs/22/156/options/68' => 'чавун',
    'specs/attrs/22/156/options/69' => 'алюмінієвий сплав',
    'specs/attrs/22/156/options/70' => 'сталь',
    'specs/attrs/22/156/options/83' => 'магнієвый сплав',
    'specs/attrs/22/179' => 'охолодження',
    'specs/attrs/22/179/options/81' => 'повітряне',
    'specs/attrs/22/179/options/82' => 'рідинне',
    'specs/attrs/22/179/options/liquid-air' => 'рідинно-повітряне',
    'specs/attrs/22/206' => 'Газорозподільчий механізм',
    'specs/attrs/22/206/options/88' => 'Розподільний вал в блоці ціліндрів',
    'specs/attrs/22/206/options/89' => 'Розподільний вал в головці ціліндрів',
    'specs/attrs/22/206/options/90' => 'Десмодромний ГРМ',
    'specs/attrs/22/206/options/91' => 'ГРМ без розподільного вала',
    'specs/attrs/22/206/options/92' => 'Безклапанний',
    'specs/attrs/22/206/options/93' => 'Ніжнеклапанний',
    'specs/attrs/22/206/options/94' => 'З змішаним розташуванням клапанів',
    'specs/attrs/22/206/options/95' => 'OHV',
    'specs/attrs/22/206/options/100' => 'OHV з системой зміни фаз газорозподілу',
    'specs/attrs/22/206/options/96' => 'SOHC',
    'specs/attrs/22/206/options/97' => 'SOHC з системой зміни фаз газорозподілу ',
    'specs/attrs/22/206/options/98' => 'DOHC',
    'specs/attrs/22/206/options/99' => 'DOHC з системой зміни фаз газорозподілу ',
    'specs/attrs/22/207' => 'тип',
    'specs/attrs/22/207/options/102' => 'Паровий',
    'specs/attrs/22/207/options/103' => 'Внутрішнього згоряння',
    'specs/attrs/22/207/options/104' => 'Електродвигун',
    'specs/attrs/22/207/options/105' => 'Поршньовий',
    'specs/attrs/22/207/options/106' => 'Роторно-поршньовий',
    'specs/attrs/22/207/options/107' => 'Турбінний',
    'specs/attrs/40' => 'трансмісия',
    'specs/attrs/40/41' => 'привід',
    'specs/attrs/40/41/options/14' => 'передній',
    'specs/attrs/40/41/options/15' => 'задній',
    'specs/attrs/40/41/options/16' => 'повный',
    'specs/attrs/40/41/options/56' => 'передній на одне колесо',
    'specs/attrs/40/41/options/57' => 'задній на одне колесо',
    'specs/attrs/40/41/options/17' => 'повный з вимик. заднім',
    'specs/attrs/40/41/options/18' => 'повный з вимик. переднім',
    'specs/attrs/40/41/options/19' => 'постійний повный',
    'specs/attrs/40/42' => 'коробка передач',
    'specs/attrs/40/42/43' => 'тип',
    'specs/attrs/40/42/43/options/20' => 'МКПП',
    'specs/attrs/40/42/43/options/21' => 'АКПП',
    'specs/attrs/40/42/43/options/22' => 'CVT',
    'specs/attrs/40/42/43/options/23' => 'напівавтомат',
    'specs/attrs/40/42/43/options/50' => 'роботизована',
    'specs/attrs/40/42/43/options/87' => 'секвентальна',
    'specs/attrs/40/42/43/options/51' => 'DSG',
    'specs/attrs/40/42/43/options/52' => 'DCT',
    'specs/attrs/40/42/139' => 'назва',
    'specs/attrs/40/42/44' => 'кількість передач',
    'specs/attrs/40/83' => 'зчеплення',
    'specs/attrs/15' => 'підвіска і рульове управління',
    'specs/attrs/15/208' => 'передня підвіска',
    'specs/attrs/15/208/209' => 'тип пружного елемента',
    'specs/attrs/15/208/209/options/108' => 'пружинна',
    'specs/attrs/15/208/209/options/109' => 'ресорна ',
    'specs/attrs/15/208/209/options/110' => 'пневматична',
    'specs/attrs/15/208/209/options/111' => 'гідропневматична',
    'specs/attrs/15/208/209/options/112' => 'торсіона',
    'specs/attrs/15/208/209/options/113' => 'на гумових пружних елементах',
    'specs/attrs/15/208/209/options/178' => 'відсутня',
    'specs/attrs/15/208/209/options/114' => 'пружинна з штовхальною штангою (Push-Rod)',
    'specs/attrs/15/208/209/options/115' => 'пружинна з тягнучою штангою (Pull-Rod)',
    'specs/attrs/15/208/209/options/116' => 'ресорна на поперечних ресорах',
    'specs/attrs/15/208/209/options/117' => 'ресорня на поздовжніх ресорах',
    'specs/attrs/15/208/209/options/124' => 'торсиона з штовхальною штангою (Push-Rod)',
    'specs/attrs/15/208/209/options/125' => 'торсиона с тягнучщю штангою (Pull-Rod)',
    'specs/attrs/15/208/209/options/118' => 'ресоная на поздовжніх еліптичних ресорах',
    'specs/attrs/15/208/209/options/119' => 'ресоная на поздовжніх ¾- еліптичних ресорах,
    'specs/attrs/15/208/209/options/120' => 'ресоная на поздовжніх ¼- еліптичних ресорах ',
    'specs/attrs/15/208/209/options/121' => 'ресоная на поздовжніх еліптичних ресорах',
    'specs/attrs/15/208/209/options/122' => 'ресоная на поздовжніх кантільоверних ресорах',
    'specs/attrs/15/208/209/options/123' => 'ресоная на поздовжніх балансирних ресорах',
    'specs/attrs/15/208/210' => 'тип направляючого апарату',
    'specs/attrs/15/208/210/options/126' => 'залежна',
    'specs/attrs/15/208/210/options/127' => 'незалежна',
    'specs/attrs/15/208/210/options/128' => 'полузалежна',
    'specs/attrs/15/208/210/options/129' => 'залежна безричажна',
    'specs/attrs/15/208/210/options/130' => 'залежна з поздовжніми важелями',
    'specs/attrs/15/208/210/options/131' => 'залежна з упорною трубою або дишлом (Torque-tube или Torque-Rod)',
    'specs/attrs/15/208/210/options/132' => 'незалежна з хитними півосями',
    'specs/attrs/15/208/210/options/133' => 'незалежна на поздовжніх важелях',
    'specs/attrs/15/208/210/options/134' => 'незалежна підвіска Дюбонне',
    'specs/attrs/15/208/210/options/135' => 'незанезалежна на подвійних косих важелях',
    'specs/attrs/15/208/210/options/136' => 'незалежна на подвійних поперечних важелях',
    'specs/attrs/15/208/210/options/137' => 'незалежна многоричажна',
    'specs/attrs/15/208/210/options/138' => 'незалежна свічкова',
    'specs/attrs/15/208/210/options/139' => 'полузалежна Де Діон',
    'specs/attrs/15/208/210/options/140' => 'полузалежна торсіоно-важельна',
    'specs/attrs/15/208/210/options/141' => 'залежна з поздовжніми важелями з механізмом Уатта',
    'specs/attrs/15/208/210/options/142' => 'залежна з поздовжніми важелями з механізмом Скотта-Рассела',
    'specs/attrs/15/208/210/options/143' => 'залежна з поздовжніми важелями з с тягою Панара',
    'specs/attrs/15/208/210/options/144' => 'залежна з упорною трубою або дишлом (Torque-tube или Torque-Rod) з механізмом Уатта',
    'specs/attrs/15/208/210/options/145' => 'залежна з упорною трубою або дишлом (Torque-tube или Torque-Rod) з механізмом Скотта-Рассела',
    'specs/attrs/15/208/210/options/146' => 'залежна з упорною трубою або дишлом (Torque-tube или Torque-Rod) з тягойю Панара',
    'specs/attrs/15/208/210/options/147' => 'незалежна свічкова з хиною свічкою (McPherson)',
    'specs/attrs/15/208/210/options/149' => 'полузалежна торсіоно-рычажна з механізмом Уатта',
    'specs/attrs/15/208/210/options/150' => 'полузалежна торсіоно-рычажна з механізмом Скотта-Рассела',
    'specs/attrs/15/208/210/options/151' => 'полузалежна торсіоно-рычажна з тягою Панара',
    'specs/attrs/15/208/210/options/148' => 'незалежна свічкова з хиною свічкою (McPherson) на поздовжніх та поперечних важелях',
    'specs/attrs/15/208/211' => 'амортизатори',
    'specs/attrs/15/208/211/213' => 'наявність',
    'specs/attrs/15/208/211/214' => 'характер дії',
    'specs/attrs/15/208/211/214/options/152' => 'однобічний',
    'specs/attrs/15/208/211/214/options/153' => 'двухстороній',
    'specs/attrs/15/208/211/215' => 'принцип дії',
    'specs/attrs/15/208/211/215/options/154' => 'фрікционий (механічний)',
    'specs/attrs/15/208/211/215/options/155' => 'гидравлічний',
    'specs/attrs/15/208/211/215/options/159' => 'газомасляний (олеопневматичний)',
    'specs/attrs/15/208/211/215/options/156' => 'гідравлічний важільний',
    'specs/attrs/15/208/211/215/options/157' => 'гідравлічний двотрубний',
    'specs/attrs/15/208/211/215/options/158' => 'гідравлічний однотрубний',
    'specs/attrs/15/208/211/216' => 'регульованість',
    'specs/attrs/15/208/212' => 'стабілізатор поперечної стійкості',
    'specs/attrs/15/8' => 'тип передньої підвіски (заст.)',
    'specs/attrs/15/9' => 'тип задньої підвіски (заст.)',
    'specs/attrs/15/10' => 'тип рульового керування',
    'specs/attrs/15/217' => 'задня підвіска',
    'specs/attrs/15/217/218' => 'тип пружного елемента',
    'specs/attrs/15/217/218/options/160' => 'пружинна',
    'specs/attrs/15/217/218/options/163' => 'ресорна',
    'specs/attrs/15/217/218/options/172' => 'пневматична',
    'specs/attrs/15/217/218/options/173' => 'гідропневматична',
    'specs/attrs/15/217/218/options/174' => 'торсіонна',
    'specs/attrs/15/217/218/options/177' => 'на гумових пружних елементах',
    'specs/attrs/15/217/218/options/179' => 'відсутня',
    'specs/attrs/15/217/218/options/161' => 'пружинна с штовхаємой штагою (Push-Rod)',
    'specs/attrs/15/217/218/options/162' => 'пружинная с тянущей штангой (Pull-Rod)',
    'specs/attrs/15/217/218/options/164' => 'ресорна на поперечних ресорах',
    'specs/attrs/15/217/218/options/165' => 'ресорна на поздовжніх ресорах',
    'specs/attrs/15/217/218/options/166' => 'ресорна на поздовжніх еллиптичних ресорах',
    'specs/attrs/15/217/218/options/167' => 'ресорна на поздовжніх ¾- еллиптичних ресорах ',
    'specs/attrs/15/217/218/options/168' => 'ресорна на поздовжніх ¼- еллиптичних ресорах ',
    'specs/attrs/15/217/218/options/169' => 'ресорна на поздовжніх полуеллиптичних ресорах ',
    'specs/attrs/15/217/218/options/170' => 'ресорна на поздовжніх кантілеверних ресорах',
    'specs/attrs/15/217/218/options/171' => 'ресорна на поздовжніх балансирних ресорах',
    'specs/attrs/15/217/218/options/175' => 'торсионна з штовхаємой штангою(Push-Rod)',
    'specs/attrs/15/217/218/options/176' => 'торсионна з тягнучою штангою (Pull-Rod)',
    'specs/attrs/15/217/219' => 'тип спрямовуючого аппарату',
    'specs/attrs/15/217/219/options/180' => 'залежна',
    'specs/attrs/15/217/219/options/190' => 'незалежна',
    'specs/attrs/15/217/219/options/200' => 'полузалежна',
    'specs/attrs/15/217/219/options/181' => 'залежна безрычажная',
    'specs/attrs/15/217/219/options/182' => 'залежна з поздовжніми важелями',
    'specs/attrs/15/217/219/options/186' => 'залежна з упорною трубою або дишлом (Torque-tube або Torque-Rod)',
    'specs/attrs/15/217/219/options/183' => 'залежна з поздовжніми важелями з механізмом Уатта',
    'specs/attrs/15/217/219/options/184' => 'залежна з поздовжніми важелями з механізмом Скотта-Рассела',
    'specs/attrs/15/217/219/options/185' => 'залежна з поздовжніми важелями з тягою Панара',
    'specs/attrs/15/217/219/options/187' => 'залежна с упорною трубою або дишлом (Torque-tube або Torque-Rod) з механізмом Уатта',
    'specs/attrs/15/217/219/options/188' => 'залежна с упорною трубою або дишлом (Torque-tube або Torque-Rod) з механізмом Скотта-Рассела',
    'specs/attrs/15/217/219/options/189' => 'залежна с упорною трубою або дишлом (Torque-tube або Torque-Rod) з тягою Панара',
    'specs/attrs/15/217/219/options/191' => 'незалежна с хитаючими напівосями',
    'specs/attrs/15/217/219/options/192' => 'незалежна на позждоажніх важелях',
    'specs/attrs/15/217/219/options/193' => 'незалежна підвіска Дюбонне',
    'specs/attrs/15/217/219/options/194' => 'незалежна на косих важелях',
    'specs/attrs/15/217/219/options/195' => 'незалежна на подвійних поперечних важелях',
    'specs/attrs/15/217/219/options/196' => 'незалежна багатоважельна',
    'specs/attrs/15/217/219/options/197' => 'незалежна свічкова',
    'specs/attrs/15/217/219/options/198' => 'незалежна свічкова з хитною свічкою (McPherson)',
    'specs/attrs/15/217/219/options/199' => 'незалежна свічкова з хитною свічкою (McPherson) на поздовжніх та поперечних важелях',
    'specs/attrs/15/217/219/options/201' => 'полузалежна Де Дион',
    'specs/attrs/15/217/219/options/202' => 'полузалежна торсіоно-важельна',
    'specs/attrs/15/217/219/options/203' => 'полузалежна торсіоно-важельна з механізмом Уатта',
    'specs/attrs/15/217/219/options/204' => 'полузалежна торсіоно-важельна з механізмом Скотта-Рассела',
    'specs/attrs/15/217/219/options/205' => 'полузалежна торсионо-важельна з тягою Панара',
    'specs/attrs/15/217/220' => 'амортизатори',
    'specs/attrs/15/217/220/222' => 'наявність',
    'specs/attrs/15/217/220/223' => 'характер дії',
    'specs/attrs/15/217/220/223/options/206' => 'однобічний',
    'specs/attrs/15/217/220/223/options/207' => 'двухстороній',
    'specs/attrs/15/217/220/224' => 'принцип дії',
    'specs/attrs/15/217/220/224/options/208' => 'фрікціоний (механичний)',
    'specs/attrs/15/217/220/224/options/209' => 'гідравлічний',
    'specs/attrs/15/217/220/224/options/213' => 'газомасляний (олеопневматичний)',
    'specs/attrs/15/217/220/224/options/210' => 'гідравлічний важельний',
    'specs/attrs/15/217/220/224/options/211' => 'гідравлічний двотрубний',
    'specs/attrs/15/217/220/224/options/212' => 'гідравлічний однотрубний',
    'specs/attrs/15/217/220/225' => 'регульованість',
    'specs/attrs/15/217/221' => 'стабілізатор поперечної стійкості',
    'specs/attrs/74' => 'гальмівна система',
    'specs/attrs/74/77' => 'ABS',
    'specs/attrs/74/142' => 'передні гальма',
    'specs/attrs/74/142/75' => 'опис',
    'specs/attrs/74/142/144' => 'тип',
    'specs/attrs/74/142/144/options/58' => 'барабанні',
    'specs/attrs/74/142/144/options/59' => 'дискові',
    'specs/attrs/74/142/146' => 'діаметр',
    'specs/attrs/74/142/148' => 'товщина',
    'specs/attrs/74/142/150' => 'матеріал',
    'specs/attrs/74/142/150/options/62' => 'метал',
    'specs/attrs/74/142/150/options/63' => 'карбон',
    'specs/attrs/74/142/150/options/64' => 'кераміка',
    'specs/attrs/74/142/152' => 'вентильовані',
    'specs/attrs/74/142/153' => 'перфоровані',
    'specs/attrs/74/143' => 'задні гальма',
    'specs/attrs/74/143/76' => 'опис',
    'specs/attrs/74/143/145' => 'тип',
    'specs/attrs/74/143/145/options/60' => 'барабанні',
    'specs/attrs/74/143/145/options/61' => 'дискові',
    'specs/attrs/74/143/147' => 'діаметр',
    'specs/attrs/74/143/149' => 'товщина',
    'specs/attrs/74/143/151' => 'матеріал',
    'specs/attrs/74/143/151/options/65' => 'метал',
    'specs/attrs/74/143/151/options/66' => 'карбон',
    'specs/attrs/74/143/151/options/67' => 'кераміка',
    'specs/attrs/74/143/154' => 'вентилтовані',
    'specs/attrs/74/143/155' => 'перфоровані',
    'specs/attrs/181' => 'електрика',
    'specs/attrs/181/182' => 'напруга бортової мережи',
    'specs/attrs/46' => 'дінамічні характеристики',
    'specs/attrs/46/47' => 'максимальна швидкість',
    'specs/attrs/46/180' => 'прискорення до 60 км/год',
    'specs/attrs/46/48' => 'прискорення до 100 км/год',
    'specs/attrs/46/175' => 'прискорення до 60 миль/год',
    'specs/attrs/46/49' => 'прискорення до 200 км/год',
    'specs/attrs/46/50' => 'прискорення до 300 км/год',
    'specs/attrs/46/51' => 'час пробігу 400м',
    'specs/attrs/46/52' => 'час пробігу 1000м',
    'specs/attrs/46/53' => 'обмежувачь швидкості',
    'specs/attrs/46/160' => 'час гальмування з 100км/год',
    'specs/attrs/46/161' => 'гальмівний путь з 100км/год',
    'specs/attrs/54' => 'експлуатаційні характеристики',
    'specs/attrs/54/55' => 'кут вїзду',
    'specs/attrs/54/56' => 'кут зїзду',
    'specs/attrs/54/57' => 'об`єм паливного бака',
    'specs/attrs/54/57/58' => 'основний',
    'specs/attrs/54/57/59' => 'додадковий',
    'specs/attrs/54/60' => 'об`єм багажника',
    'specs/attrs/54/60/61' => 'мін',
    'specs/attrs/54/60/62' => 'макс',
    'specs/attrs/54/78' => 'витрата палива',
    'specs/attrs/54/78/183' => 'Невстановлений метод',
    'specs/attrs/54/78/183/79' => 'в місті',
    'specs/attrs/54/78/183/80' => 'на трасі',
    'specs/attrs/54/78/183/81' => 'змішаний режим',
    'specs/attrs/54/78/184' => 'ECE',
    'specs/attrs/54/78/184/185' => '90 км/год',
    'specs/attrs/54/78/184/186' => '120 км/год',
    'specs/attrs/54/78/184/187' => 'city',
    'specs/attrs/54/78/184/188' => 'combined',
    'specs/attrs/54/78/189' => 'EPA (до 2008)',
    'specs/attrs/54/78/189/190' => 'city',
    'specs/attrs/54/78/189/191' => 'highway',
    'specs/attrs/54/78/192' => 'EPA (с 2008)',
    'specs/attrs/54/78/192/193' => 'city',
    'specs/attrs/54/78/192/194' => 'highway',
    'specs/attrs/54/78/199' => 'EU 93/116/EC',
    'specs/attrs/54/78/199/200' => 'urban',
    'specs/attrs/54/78/199/201' => 'extra urban',
    'specs/attrs/54/78/199/202' => 'combined',
    'specs/attrs/54/78/199/202/description' => '36.8% urban + 63.2% extra urban',
    'specs/attrs/54/138' => 'Система "старт-стоп"',
    'specs/attrs/54/158' => 'вантажопідьомність',
    'specs/attrs/54/205' => 'маса буксованого причепа',
    'specs/attrs/54/226' => 'об`єма кузова',
    'specs/attrs/54/195' => 'розворот',
    'specs/attrs/54/195/11' => 'діаметр',
    'specs/attrs/54/195/11/description' => 'осьової. 2×радіус',
    'specs/attrs/54/195/196' => 'від стінки до стінки',
    'specs/attrs/54/195/196/description' => 'wall-to-wall',
    'specs/attrs/54/195/197' => 'від бордюра до бардюра',
    'specs/attrs/54/195/197/description' => 'curb-to-curb',
    'specs/attrs/54/198' => 'обертів руля від упора до упора',
    'specs/attrs/84' => 'колеса та диски ',
    'specs/attrs/84/85' => 'передні',
    'specs/attrs/84/85/87' => 'ширина покришок',
    'specs/attrs/84/85/90' => 'вісота покришок',
    'specs/attrs/84/85/88' => 'діаметр',
    'specs/attrs/84/85/89' => 'ширина диска',
    'specs/attrs/84/85/162' => 'виліт диска',
    'specs/attrs/84/86' => 'задні',
    'specs/attrs/84/86/91' => 'ширина покришок',
    'specs/attrs/84/86/94' => 'высота покришок',
    'specs/attrs/84/86/92' => 'діаметр',
    'specs/attrs/84/86/93' => 'ширина диска',
    'specs/attrs/84/86/163' => 'виліт диска',
    'specs/attrs/84/164' => 'модель дисків',
    'specs/attrs/84/165' => 'матеріал дисків',
    'specs/attrs/84/165/options/78' => 'сталь',
    'specs/attrs/84/165/options/79' => 'алюмінієвий сплав (лиття)',
    'specs/attrs/84/165/options/80' => 'алюмінієвий сплав (ковка)',
    'specs/attrs/82' => 'шкідливи викиди',
    'specs/attrs/157' => 'норма викідів',
    'specs/attrs/157/options/71' => 'Euro 1',
    'specs/attrs/157/options/72' => 'Euro 2',
    'specs/attrs/157/options/73' => 'Euro 3',
    'specs/attrs/157/options/74' => 'Euro 4',
    'specs/attrs/157/options/75' => 'Euro 5',
    'specs/attrs/157/options/76' => 'Euro 5+',
    'specs/attrs/157/options/77' => 'Euro 6',
    'specs/attrs/170' => 'місце виробництва',

    'specs/unit/1/abbr' => 'мм',
    'specs/unit/1/name' => 'міліметр',
    'specs/unit/2/abbr' => 'кг',
    'specs/unit/2/name' => 'килограм',
    'specs/unit/3/abbr' => 'м',
    'specs/unit/3/name' => 'метр',
    'specs/unit/4/abbr' => 'см³',
    'specs/unit/4/name' => 'кубичний сантиметр',
    'specs/unit/5/abbr' => 'к.с.',
    'specs/unit/5/name' => 'кіньска сила',
    'specs/unit/6/abbr' => 'об/мін',
    'specs/unit/6/name' => 'оборотів на минуту',
    'specs/unit/7/abbr' => 'Нм',
    'specs/unit/7/name' => 'Ньютон-метр',
    'specs/unit/8/abbr' => 'км/год',
    'specs/unit/8/name' => 'километров на годину',
    'specs/unit/9/abbr' => 'сек',
    'specs/unit/9/name' => 'секунда',
    'specs/unit/10/abbr' => '%',
    'specs/unit/10/name' => 'відсоток',
    'specs/unit/11/abbr' => '°',
    'specs/unit/11/name' => 'градус',
    'specs/unit/12/abbr' => 'л',
    'specs/unit/12/name' => 'літр',
    'specs/unit/13/abbr' => 'л/100км',
    'specs/unit/13/name' => 'літрів на 100 километрів',
    'specs/unit/14/abbr' => 'CO2 г/км',
    'specs/unit/14/name' => 'грам CO2 на километр',
    'specs/unit/15/abbr' => '″',
    'specs/unit/15/name' => 'дюйм',
    'specs/unit/16/abbr' => 'р.',
    'specs/unit/16/name' => 'рік',
    'specs/unit/17/abbr' => 'PS',
    'specs/unit/17/name' => 'Pferdestärke',
    'specs/unit/18/abbr' => 'кВт',
    'specs/unit/18/name' => 'кіловат',
    'specs/unit/19/abbr' => 'V',
    'specs/unit/19/name' => 'вольт',
    'specs/unit/20/abbr' => '',
    'specs/unit/20/name' => 'м³',

    'telegram/info' => '[Telegram](https://telegram.org/) - це в першу чергу система обміну миттєвими повідомленнями, подібна whatsapp або viber.

Крім звичного обміну повідомленнями та файлами, тут є безліч інших можливостей, на опис яких піде багато часу.

В роботі сайту ми використовуємо лише дві з них: публічні групи і боти.

# Публічна група

Є відкритий російськомовний і англомовний групи для всіх відвідувачів сайту.

Увійти в них дуже просто - достатньо перейти за посиланням і слідувати інструкціям:

* [Російськомовний] (https://t.me/joinchat/AAAAAA0NvB5g7SEsWv61Rw)
* [Англомовний] (https://t.me/joinchat/AAAAAAvxJESUMQcUM-I5YA)

# Бот

Для вашого і нашого зручності ми створили "бота" в додатку [telegram] (https://telegram.org/), який дозволить поліпшити ваш досвід взаємодії з сайтом.

Звуть його просто: [@autowp_bot] (tg: msg).

Якщо коротко: бот, це користувач телеграм, з який може надсилати вам повідомлення, підготовлені нашим сайтом.

Детальніше про ботах telegram можна почитати тут <https://core.telegram.org/bots/faq>

На поточний момент підтримується 2 близькі функції:

* Повідомлення про надходження приватного повідомлення. [Детальніше ...] (# messages)
* Повідомлення про нові прийнятих на сайт збережений. [Детальніше ...] (# new)
* Повідомлення про нові завантажених (але ще не прийнятих) збережений (тільки для зареєстрованих користувачів). [Детальніше ...] (# inbox)

## Команди бота

### Старт: `/ start`

Відправивши цю команду у відповідь ви отримаєте список підтримуваних команд.

### <a name="messages"> </a> Особисті повідомлення: `/ messages`

Надішліть `/ messages on`, щоб підписатися на отримання повідомлень.

Надішліть `/ messages off`, щоб відписатися.

### <a name="new"> </a> Нові зображення: `/ new`

Надішліть `/ new BMW`, щоб підписатися на отримання нових фотографій BMW.

Надішліть `/ new BMW` повторно, щоб відписатися.

### <a name="inbox"> </a> Інбокс: `/ inbox`

Потрібна попередня авторизація командою `/ me`

Надішліть `/ inbox BMW`, щоб підписатися на отримання повідомлення про нові завантажених, але ще не прінятно фотографій BMW.

Надішліть `/ inbox BMW` повторно, щоб відписатися.

### Я (авторизація): `/ me`

Ця команда подзволяет вам асоціювати себе (користувача telegram) з обліковим записом на нашому сайті.

Надішліть `/ me`, щоб отримати інструкції з виконання авторизації.

Надішліть `/ me 123456789`, щоб отримати код підтвердження.

Тут 123456789 - номер вашого облікового запису на нашому сайті, який ви можете знайти на сторінці свого профілю. Наприклад, номер [Juliano Scotini] (/ users / juliano-scotini): 17322

Код підтвердження буде відправлений вам через [систему особистих повідомлень] (/ ng / account / messages? Folder = system)

Надішліть `/ me 123456789 ХХХХХХХХХХХХХХХХ`, щоб завершити процес асоціації ваш обліковий запис telegram з користувачем найшов сайту.

Тут `ХХХХХХХХХХХХХХХХ` - код, який буде відправлений вам через [систему особистих повідомлень] (/ ng / account / messages? Folder = system) ',

    'Personal-message-dialog / title' => 'Надіслати ПП',
    'Personal-message-dialog / send' => 'відправити',
    'Personal-message-dialog / sending' => 'вирушає ...',
    'Personal-message-dialog / sent' => 'відправлено',
    'Personal-message-dialog / cancel' => 'скасувати',
    'Personal-message-dialog / placeholder' => 'Текст повідомлення',

    'Crop-dialog / title' => 'Обрізати',
    'Crop-dialog / close' => 'Закрити',
    'Crop-dialog / select-all' => 'Виділити все',
    'Crop-dialog / save' => 'Зберегти',
    'Crop-dialog / resolution-% s-aspect-% s' => '% s (пропорції% s)',
    'Crop-dialog / resolution-x-aspect-y' => '{resolution} (пропорції {aspect})',

    'Who-online / title' => 'На сайті',
    'Who-online / refresh' => 'Оновити',
    'Who-online / close' => 'Закрити',

    'Picture-moder-vote / custom / title' => 'Своя причина',
    'Picture-moder-vote / custom / sending' => 'вирушає ...',
    'Picture-moder-vote / custom / send' => 'відправлено',
    'Picture-moder-vote / custom / cancel' => 'скасувати',
    'Picture-moder-vote / custom / save' => 'Зберегти як шаблон',

    'Moder / statistics / photos-with-copyrights' => 'Фотографій з копірайтами',
    'Moder / statistics / vehicles-with-4-or-more-photos' => 'Автомобілів з 4 і більше фото',
    'Moder / statistics / specifications-values' => 'заповнення значень ТТХ',
    'Moder / statistics / brand-logos' => 'Логотипів брендів',
    'Moder / statistics / from-years' => 'Роки початку випуску автомобілів',
    'Moder / statistics / from-and-to-years' => 'Роки початку і закінчення випуску автомобілів',
    'Moder / statistics / from-and-to-years-and-months' => 'Роки і місяці початку і закінчення випуску автомобілів'
]);
