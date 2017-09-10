<?php

return array_replace(include 'root.php', [
    '' => [
        'plural_forms' => 'nplurals=2; plural=(n==1)?0:1'
    ],

    'test' => 'test is ok',

    /* Common words */
    'and' => 'and',
    '%1$s pictures'       => [
        '%1$s picture',
        '%1$s pictures',
    ],
    'ng/%1$s-pictures' => '{count, plural,
        one {{count} picure}
        other {{count} pictures}
    }',
    '%1$s items'      => [
        '%1$s item',
        '%1$s items',
    ],
    '%1$s vehicles'      => [
        '%1$s vehicle',
        '%1$s vehicles',
    ],
    '%1$s comments'      => [
        '%1$s comment',
        '%1$s comments',
    ],
    'ng/%1$s-comments' => '{count, plural,
        one {{count} comment}
        other {{count} comments}
    }',
    '%1$s messages'      => [
        '%1$s message',
        '%1$s messages',
    ],
    '%1$s topics'      => [
        '%1$s topic',
        '%1$s topics',
    ],

    'year' => 'Year',
    'month' => 'Month',

    'contributor' => 'contributor',
    'contributors' => 'contributors',

    'deleted-user' => 'deleted user',

    'submit' => 'Submit',

    /* Layout */
    'layout/meta/description' => 'Encyclopedia of cars in the pictures. WheelsAge.org',
    'layout/meta/keywords' => 'car, vehicle, auto, avto',
    'layout/brand' => 'WheelsAge.org',
    'layout/personal-messages' => 'Personal messages',
    'layout/you-have-%1$s-new-messages' => [
        'You have %1$s new message',
        'You have %1$s new messages',
    ],
    'ng-layout/you-have-new-messages' => '{messages, plural,
        one {You have {messages} new message}
        other {You have {messages} new messages}
    }',

    'layout/search' => 'Search',
    'layout/footer' => 'Please note that all material on this server autowp.ru, added visitors.

The site administration does not have information on the legality of the publication of these materials.

All images are posted for educational purposes.

[Report copyright violation](mailto:autowp@yandex.ru)',

    'layout/language-contributing' => 'Want to contribute?',

    /* Picture preview */
    'picture-preview/no-comments' => 'no',
    'picture-preview/no-ratio'    => 'no',
    'picture-preview/crop-desc'   => 'Image is cropped',
    'picture-preview/special-name' => 'Picture with special name',
    'Resolution'                  => 'Resolution',
    'Filesize'                    => 'Filesize',
    'Ratio'                       => 'Ratio',
    'Views'                       => 'Views',
    'Comments count'              => 'Comments',

    /* SPECIFICATIONS*/
    'rpm' => 'rpm',
    'Nm'  => 'Nm',
    'kW'  => 'kW',
    'hp'  => 'hp',
    'spec/%1$s-gear' => [
        '%1$s gear',
        '%1$s gears'
    ],

    /* PAGINATOR */
    'next'                     => 'next',
    'previous'                 => 'previous',

    /* INDEX */
    'index/brands'             => 'Brands',
    'index/factories'          => 'Factories',
    'index/specifications'     => 'Specifications',
    'index/twins/description' => 'Вы знаете, что Daewoo Matiz имеет аж целых [шесть клонов](/twins/group118812)? А знаете, что [общего у Lotus и Kia](/twins/group118750)? Уверены, что вам покажется интересным этот раздел.',
    'index/categories/description' => 'А знаете ли вы, какая техника помогала блюсти правопорядок на улицах мировых городов в разное время? А на каких автомобилях ездил Папа Римский? Нет? Тогда вам точно в этот раздел.',
    'index/categories/mosts' => 'Хотите знать, какой автомобиль был самым быстрым? Хотите знать, сколько весит самый могучий карьерный самосвал? Заходите и узнаете.',

    'mosts/fastest/roadster'          => 'Most fastest roadsters',
    'mosts/mighty/sedan/today'        => 'Most mighty sedans today',
    'mosts/dynamic/universal/2000-09' => 'Most dynamic universals in 2000\'s',
    'mosts/heavy/truck'               => 'Most heavy trucks',

    'back'                     => 'back',
    'forward'                  => 'forward',

    'Picture of the day'       => 'Picture of the day',
    'car-of-day'               => 'vehicle of the day',
    'theme-of-day'             => 'theme of the day',
    'day ahead'                => 'day ahead',
    'day ago'                  => 'day ago',
    'Cars by destination'      => 'Cars by destination',
    'All new pictures'         => 'All new pictures',

    'all-link'                 => 'all',

    'brands/new-cars-of-brand' => 'New %s cars',

    'brands/more-companies'    => [
        'more %s company',
        'more %s companies'
    ],
    'brands/pictures:' => 'pictures: ',

    'item/type/1/name' => 'Vehicle',
    'item/type/1/name-plural' => 'Vehicles',
    'item/type/1/new-item' => 'New vehicle',
    'item/type/1/add-sub-item' => 'Add sub-vehicle',
    'item/type/2/name' => 'Engine',
    'item/type/2/name-plural' => 'Engines',
    'item/type/2/new-item' => 'New engine',
    'item/type/2/add-sub-item' => 'Add sub-engine',
    'item/type/3/name' => 'Category',
    'item/type/3/name-plural' => 'Categories',
    'item/type/3/new-item' => 'New category',
    'item/type/3/add-sub-item' => 'Add sub-category',
    'item/type/4/name' => 'Twins',
    'item/type/4/name-plural' => 'Twins',
    'item/type/4/new-item' => 'New twins group',
    'item/type/4/add-sub-item' => 'Add sub-twins',
    'item/type/5/name' => 'Brand',
    'item/type/5/name-plural' => 'Brands',
    'item/type/5/new-item' => 'New brand',
    'item/type/5/add-sub-item' => 'Add sub-brand',
    'item/type/6/name' => 'Factory',
    'item/type/6/name-plural' => 'Factories',
    'item/type/6/new-item' => 'New factory',
    'item/type/6/add-sub-item' => 'Add sub-factory',
    'item/type/7/name' => 'Museum',
    'item/type/7/name-plural' => 'Museums',
    'item/type/7/new-item' => 'New museum',
    'item/type/7/add-sub-item' => 'Add sub-museum',

    'item/type/8/name' => 'Person',
    'item/type/8/name-plural' => 'Persons',
    'item/type/8/new-item' => 'New person',
    'item/type/8/add-sub-item"' => 'Add sub-person',

    /* BRAND PAGE*/
    'unsorted'                => 'Unsorted',
    'engines'                 => 'Engines',
    'concepts and prototypes' => 'Concepts and prototypes',
    'logotypes'               => 'Logotypes',
    'mixed'                   => 'Miscellaneous',

    'count 0'                 => 'none',

    /* CAR LIST */
    'carlist/no-photo'        => 'No photos available',
    'carlist/no-photo/add'    => 'Add photo',
    'carlist/all pictures'    => 'all pictures',
    'carlist/details'         => 'details',
    'carlist/twins'           => 'twins',
    'carlist/produced/one'    => 'Produced in a single copy',
    'carlist/produced/%1$s'   => [
        'Produced in %1$s copy',
        'Produced in %1$s copies'
    ],
    'carlist/produced-about/%1$s' => [
        'Produced in about %1$s copy',
        'Produced in about %1$s copies'
    ],
    'carlist/specifications'  => 'specifications',
    'carlist/designed by %s'  => 'designed by %s',
    'carlist/edit-specs' => 'edit specs',
    'carlist/years' => 'years of production',
    'carlist/model-years' => 'model years',

    'picturelist/engine' => 'Engine',
    'picturelist/engine-%s' => '%s engine',
    'picturelist/factory' => 'Factory',

    'present-time-abbr'       => 'pr.',

    /* Categories */
    'category/%s cars'        => [
        '%s car',
        '%s cars'
    ],
    'category/%s new cars'    => [
        '%s new',
        '%s new'
    ],

    /* most */
    'most/fastest' => 'fastest',
    'most/fastest/param' => 'max speed',
    'most/slowest' => 'slowest',
    'most/slowest/param' => 'max speed',
    'most/dynamic' => 'dynamic',
    'most/dynamic/param' => 'acceleration',
    'most/static' => 'static',
    'most/static/param' => 'acceleration',
    'most/mighty' => 'mighty',
    'most/mighty/param' => 'engine power',
    'most/weak' => 'weak',
    'most/weak/param' => 'engine power',
    'most/big-engine' => 'big engine',
    'most/big-engine/param' => 'engine volume',
    'most/small-engine' => 'small engine',
    'most/small-engine/param' => 'engine volume',
    'most/nimblest' => 'nimblest',
    'most/nimblest/param' => 'turning circle',
    'most/economical' => 'economical',
    'most/economical/param' => 'fuel consumption in the combined cycle',
    'most/gluttonous' => 'gluttonous',
    'most/gluttonous/param' => 'fuel consumption in the combined cycle',
    'most/clenaly' => 'ecological clenaly',
    'most/clenaly/param' => 'emission',
    'most/dirty' => 'ecological dirty',
    'most/dirty/param' => 'emission',
    'most/heavy' => 'heavy',
    'most/heavy/param' => 'equipped weight',
    'most/lightest' => 'lightest',
    'most/lightest/param' => 'equipped weight',
    'most/longest' => 'longest',
    'most/longest/param' => 'length',
    'most/shortest' => 'shortest',
    'most/shortest/param' => 'length',
    'most/widest' => 'widest',
    'most/widest/param' => 'width',
    'most/narrow' => 'narrow',
    'most/narrow/param' => 'width',
    'most/highest' => 'highest',
    'most/highest/param' => 'height',
    'most/lowest' => 'lowest',
    'most/lowest/param' => 'height',
    'most/air' => 'air',
    'most/air/param' => 'drag coefficients',
    'most/antiair' => 'anti air',
    'most/antiair/param' => 'drag coefficients',
    'most/bigwheel' => 'big wheel',
    'most/bigwheel/param' => 'wheel size',
    'most/smallwheel' => 'small wheel',
    'most/smallwheel/param' => 'wheel size',
    'most/bigbrakes' => 'big brakes',
    'most/bigbrakes/param' => 'brakes size',
    'most/smallbrakes' => 'small brakes',
    'most/smallbrakes/param' => 'brakes size',
    'most/bigclearance' => 'big clearance',
    'most/bigclearance/param' => 'clearance',
    'most/smallclearance' => 'small clearance',
    'most/smallclearance/param' => 'clearance',

    'mosts/sidebar/mostly…' => 'Most …',
    'mosts/sidebar/between…' => 'Between …',

    'mosts/period/before1920' => 'before 1920го',
    'mosts/period/1920-29'    => '1920-29th',
    'mosts/period/1930-39'    => '1930-39th',
    'mosts/period/1940-49'    => '1940-49th',
    'mosts/period/1950-59'    => '1950-59th',
    'mosts/period/1960-69'    => '1960-69th',
    'mosts/period/1970-79'    => '1970-79th',
    'mosts/period/1980-89'    => '1980-89th',
    'mosts/period/1990-99'    => '1990-99th',
    'mosts/period/2000-09'    => '2000-09th',
    'mosts/period/2010-16'    => '2010-16th',
    'mosts/period/present'    => 'present time',
    'mosts/period/all-time'   => 'all time',

    /* upload */
    'upload/image-file' => 'Image file',
    'upload/note' => 'Note',
    'upload/picture/crop' => 'crop',
    'upload/picture/cropped-to' => 'cropped to %s',
    'upload/select/unsorted' => 'unsorted',
    'upload/select/unsorted-long' => 'unsorted (not existent vehicle or engine)',
    'upload/select/mixed' => 'mixed',
    'upload/select/mixed-long' => 'mixed (few vehicles on one picture)',
    'upload/select/logo' => 'logotype',
    'upload/select/engines' => 'Engines',
    'upload/select/concepts' => 'Concepts & prototypes',
    'upload/select/other-modification' => 'other modification',

    'upload/add-picture' => 'Add picture',
    'upload/select-another' => 'select another catalogue',
    'upload/description' => 'Если у вас есть изображения, которых вы не нашли на этом сайте и они соответствуют тематике сайта, то вы можете добавить их в наш каталог, воспользовавшись формой, расположенной ниже.

Было бы здорово, если бы вы указали, что за автомобиль изображён на картинке, чтобы облегчить её добавление и избежать ошибки.

Требования, предъявляемые к добавляемым картинкам:

* [JPEG](http://ru.wikipedia.org/wiki/JPEG) or [PNG](http://ru.wikipedia.org/wiki/PNG) format. Resolution from  640×360 up to 4096×4096.
* Изображение должно по возможности быть максимально доступного качества, не содержать различных артефактов изменения размера или компрессии (размытия, нечёткости, расплытия цветов, ребристости прямых линий и т.д.). Исключение составляют редкие фото(производителя), сканы из проспектов. Решение об оставлении такого фото на сайте принимает модераторский состав.
* Отсутствие надписей и логотипов посторонних сайтов, нанесенных не авторами/владельцами материала.
* Автомобиль должен иметь первоначальный вид как при выходе с завода. Не должны присутствовать признаки <em>самодельного тюнинга</em>, желательно отстутвие изменений, связанных со старением автомобиля.
* Основной и единственной темой изображения должен являться автомобиль, двигатель, логотип автокомпании, автомобильный завод или музей. Наличие в кадре посторонних предметов или людей - нежелательно.
* Любительские фотографии вашего автомобиля, автомобиля ваших друзей или любого другого, встретившегося вам на улице, а также фотографии с выставок - не будут приняты на сайт 100%. Если только вы не профессионал.
* Для первых фотографий автомобиля возможны пониженные требования.

**Убедительная просьба**, перед добавлением изображений, убедиться в их отсутствии в каталоге.

Обращаем ваше внимание на то, что добавление картинок модерируемое. Т.е. все картинки перед добавлением в каталог будут проверены ведущими сайта.',
    'upload/only-registered' => 'Only registered users can upload pictures

[Login](/login) or [register](/ng/signup)',

    /* catalogue */
    'catalogue/other-pictures-of-%1$s' => 'Other pictures of %1$s',
    'catalogue/all-pictures-of-%1$s' => 'All pictures of %1$s',
    'catalogue/brand/logo-of-%s' => '%s logotype',
    'catalogue/brand/links' => 'Links',
    'catalogue/brand/popular-images' => 'Popular images',
    'catalogue/brand/new-pictures' => 'New pictures',
    'catalogue/brand/inbox/by-brand' => 'Brand inbox',
    'catalogue/brand/factories' => 'Factories',
    'catalogue/link-category/official' => 'Official websites',
    'catalogue/link-category/helper'   => 'Helped create the project',
    'catalogue/link-category/club'     => 'Car clubs',
    'catalogue/link-category/default'  => 'Other',
    'catalogue/chronological' => 'Chronological',
    'catalogue/related' => 'Related',
    'catalogue/related-with-%1$s' => 'Related with %1$s',
    'catalogue/sport' => 'Sport',
    'catalogue/design' => 'Design',
    'catalogue/stock-model' => 'Stock model',
    'catalogue/sub-model' => 'Submodel',
    'catalogue/sport-of-%1$s' => '%1$s Sport',
    'catalogue/specifications-of-%1$s' => 'Specifications of %1$s',
    'catalogue/specifications' => 'Specifications',
    'catalogue/other-photos' => 'Other photos',
    'catalogue/section/moto' => 'Moto',
    'catalogue/section/tractors' => 'Tractors',
    'catalogue/section/buses' => 'Buses',
    'catalogue/section/trucks' => 'Trucks',
    'catalogue/section/engines' => 'Engines',

    'catalogue/engine-menu/vehicles' => 'Vehicles',
    'catalogue/engine-menu/pictures' => 'Pictures',
    'catalogue/specifications/contributors:' => 'Contributors:',
    'catalogue/specifications/disclaimer' => 'Information collected by site members. Если вы нашли ошибку или желаете заполнить пробелы, вы можете сделать это, пройдя процедуру регистрации на сайте.',
    'catalogue/vehicle/inbox' => 'inbox',
    'catalogue/vehicle/comments' => 'comments',
    'catalogue/engine/add-engine' => 'add engine',
    'catalogue/engine/mounted-on:' => 'Mounted on:',

    'factories/factory-items' => 'Products',
    'factories/factory/pictures' => 'Pictures',

    /* comments */
    'comments/title' => 'Comments',
    'comments/reply' => 'reply',
    'comments/what-to-do-for-write-comments' => 'To be able to post a comment, you must <a href="/login">create an account or sign in using social networks account</a>',
    'comments/it-requires-attention-of-moderators' => 'It requires attention of moderators',
    'comments/form-title' => 'Add comment',
    'comments/message' => 'Message',
    'comments/send' => 'Send',
    'comments/cancel' => 'Cancel',
    'comments/need-wait-text' => 'Unfortunately you have to wait a bit to be able to leave a comment.

This is due to the presence of the threshold "messages per hour", necessary to prevent spam and some other negative aspects.

Next, you can leave a comment in the "%s", as long as you have the time to clarify the idea you want to convey to the public:',

    'comments/author/anonymous' => 'Anonymous',
    'comments/message-deleted-by-admin' => 'Message deleted by site administration',
    'comments/message/delete' => 'Delete',
    'comments/message/restore' => 'Restore',
    'comments/message/move' => 'Move',
    'comments/vote/no-more-votes' => 'Today vote limit reached',
    'comments/subscribe' => 'Subscribe to new replies notifications',
    'comments/unsubscribe' => 'Unsubscribe from notifications',

    /*perspectives*/
    'perspective/front'          => 'front',
    'perspective/back'           => 'back',
    'perspective/left'           => 'left',
    'perspective/right'          => 'right',
    'perspective/interior'       => 'interior',
    'perspective/front-panel'    => 'front panel',
    'perspective/3/4-left'       => '¾ left',
    'perspective/3/4-right'      => '¾ right',
    'perspective/cutaway'        => 'cutaway',
    'perspective/front-strict'   => 'front (strict)',
    'perspective/left-strict'    => 'left (strict)',
    'perspective/right-strict'   => 'right (strict)',
    'perspective/back-strict'    => 'back (strict)',
    'perspective/n/a'            => 'n/a',
    'perspective/label'          => 'label',
    'perspective/upper'          => 'upper',
    'perspective/under-the-hood' => 'under the hood',
    'perspective/upper-strict'   => 'upper (strict)',
    'perspective/bottom'         => 'bottom',
    'perspective/dashboard'      => 'dashboard',
    'perspective/boot'           => 'boot',
    'perspective/logo'           => 'logo',
    'perspective/mascot'         => 'mascot',
    'perspective/sketch'         => 'sketch',
    'perspective/mixed'          => 'mixed',
    'perspective/exterior-details' => 'exterior details',

    'login/sign-in' => 'Sign in',
    'login/sign-out' => 'Sign out',
    'login/login-or-email' => 'login or e-mail',
    'login/captcha' => 'enter security code',
    'login/registration' => 'Sign up',
    'login/forgot-password?' => 'Forgot your password?',
    'login/success-text' => 'We are glad to welcome you to our website',
    'login/remember' => 'remember',
    'login/if-you-lose-password' => 'If you have forgotten your username or password, you can use the <a href="/restorepassword">form of recovery by e-mail</a>',
    'login/if-you-not-registered' => 'If you are not registered on the website, you can <a href="/ng/signup">do it now</a>!',
    'login/sign-in-using-account' => 'Sign in using existing account',
    'login/login-or-password-is-incorrect' => 'Login or password is incorrect',
    'login/user-%value%-not-found' => 'User with login or e-mail "%value%" not found',

    'registration/if-you-registered' => 'If you are already registered, then you should not do it again, but only need to enter your username and password in the form on the right.',



    'account/personal-message/reply' => 'reply',
    'account/personal-message/delete' => 'delete',
    'account/personal-message/entire-dialog' => 'entire dialog',
    'account/personal-message/system-notification' => 'System notification',
    'account/personal-message/delete-all-sent' => 'Delete all sent messages',
    'account/personal-message/delete-all-system' => 'Delete all system notifications',
    'account/personal-message/new' => 'new',
    'account/personal-message/sent' => 'Message sent',
    'account/profile/personal' => 'Personal info',
    'account/profile/photo' => 'Photo',
    'account/profile/photo/saved' => 'Photo saved',
    'account/profile/photo/deleted' => 'Photo deleted',
    'account/profile/use-gravatar' => 'You can upload photo or use <a href="http://gravatar.com/">Gravatar</a>',
    'account/profile/photo/delete' => 'Delete photo',
    'account/profile/other' => 'Other',
    'account/profile/votes-per-day' => 'Votes per day',
    'account/profile/votes-left' => 'Votes left',
    'account/profile/timezone' => 'Timezone',
    'account/profile/language' => 'Language',
    'account/profile/saved' => 'Data saved',

    'account/access/change-password' => 'Change password',
    'account/access/change-password/current' => 'Current',
    'account/access/change-password/new' => 'New',
    'account/access/change-password/new-confirm' => 'New (confirm)',
    'account/access/change-password/current-password-is-incorrect' => 'Current password is incorrect',
    'account/access/change-password/saved' => 'Password succesful changed',
    'account/access/self-delete' => 'Delete account',
    'account/access/self-delete/password-is-incorrect' => 'Password is incorrect',

    'account/specs/weight' => 'Weight',

    'account/specs/conflicts/filter/all' => 'All',
    'account/specs/conflicts/filter/i-disagree' => 'I disagree',
    'account/specs/conflicts/filter/do-not-agree-with-me' => 'Do not agree with me',
    'account/specs/conflicts/filter/errors' => 'Errors',

    'account/specs/conflicts/title/object' => 'Object',
    'account/specs/conflicts/title/object/engine' => 'Engine',
    'account/specs/conflicts/title/parameter' => 'Parameter',
    'account/specs/conflicts/title/my-value' => 'My value',
    'account/specs/conflicts/title/other-values' => 'Other values',

    'account/specs/conflicts/my-value/none' => 'none',

    'account/email/your-current-email:' => 'Your current e-mail address: ',
    'account/email/your-dont-enter-email' => 'You don\'t input e-mail address',
    'account/email/text' => 'On this page you can change your e-mail address.

Message with instructions to confirm will sent to new address.',

    'account/accounts/add' => 'Add account',
    'account/accounts/remove' => 'Remove',
    'account/accounts/removed' => 'Account removed',
    'account/accounts/connect-failed' => 'Failed to connect with account. Error occured or access to account denied',
    'account/accounts/disconnect-failed' => 'Не удалось удалить учетную запись.

Такое бывает, если привязанная учётная запись является единственным способом авторизации, т.е. не задан e-mail или другие учётный записи.',

    'account/delete/text' => 'Мы сожалем, что вам пришлось оказаться на этой странице, и вы планируете покинуть наш сайт навсегда, но не можем вам в этом отказать.

Нажав на красную кнопку, все данные, касающиеся вас, будут обезличены или удалены.

Этот процесс необратим, поэтому хорошенько подумайте и не принимайте поспешных решений.',
    'account/deleted/text' => 'Account removed.
Good luck.',

    'feedback/title' => 'Feedback',
    'feedback/name'  => 'Your name',
    'feedback/message' => 'Message',
    'feedback/donate-text' => 'If you have come here to express words of support, it is possible to [express it in hard currency](/donate)',
    'feedback/sent' => 'Your message was sent',

    'map/museums-and-factories' => 'Museums and factories',

    'picture/image-specifications' => 'Image specifications',
    'picture/added-by:' => 'Added by:',
    'picture/location' => 'Coordinates',
    'picture/status:' => 'Picture status:',
    'picture/status/inbox' => 'Undecided',
    'picture/status/accepted' => 'Accepted',
    'picture/status/removing' => 'Removing',
    'picture/propose-image-replacement' => 'Propose image replacement',
    'picture/moderators-about-this-picture' => 'Moderators about this picture',
    'picture/all-images-have-owners' => 'All images have owners.',
    'picture/if-you-found-error' => 'If you think that the users of the site made a mistake by posting this image in this section, it would be nice if you wrote about it in the comments and pointed out the error.',
    'picture/where-to-talk' => 'Discuss anything and just talk about cars and not only can you on <a href="/forums/">the forum</a>',
    'picture/other-languages' => 'In other languages',
    'picture/picture-suggested-to-replace' => 'Picture suggested to replace',
    'picture/that-engine-is-mounted-to-vehicle' => 'That engine is mounted to vehicle',
    'picture/that-engine-is-mounted-to-vehicles:' => 'That engine is mounted to vehicles:',
    'picture/factory-details' => 'Factory details ...',
    'picture/on-that-factory-produced-vehicle' => 'На этом заводе производился такой автомобиль, как',
    'picture/on-that-factory-produced-vehicles:' => 'На этом заводе производились такие автомобили, как: ',
    'picture/on-that-factory-produced-vehicles/and' => 'and',
    'picture/on-that-factory-produced-vehicles/and-other' => 'other ...',

    'user/name' => 'Name',
    'user/password' => 'Password',
    'user/password-confirm' => 'Password (again)',

    'users/user/known-as:' => 'Known as: ',
    'users/user/before-known-as:' => 'before known as: ',
    'users/user/type:' => 'Account type: ',
    'users/user/type/moderator' => 'Moderator',
    'users/user/type/visitor' => 'Visitor',

    'users/user/upload-pictures:' => 'Images uploaded: ',
    'users/user/pictures-left-on-site:' => 'left on site: ',

    'users/comments/order/new' => 'New',
    'users/comments/order/old' => 'Old',
    'users/comments/order/positive' => 'Positive',
    'users/comments/order/negative' => 'Negative',

    'users/for-moderators' => 'For moderators',
    'users/for-moderators/remove-photo' => 'Delete user photo',
    'users/for-moderators/remove-user' => 'Delete user',
    'users/for-moderators/last-visit-from-ip' => 'Last visit fom IP-address: ',

    'ban/that-address-is-banned' => 'That address is banned',
    'ban/until' => 'until',
    'ban/unban' => 'unban',
    'ban/ban' => 'Ban',
    'ban/reason' => 'Reason',
    'ban/period' => 'For period',
    'ban/period/hour' => 'hour',
    'ban/period/2-hours' => '2 hours',
    'ban/period/4-hours' => '4 hours',
    'ban/period/8-hours' => '8 hours',
    'ban/period/16-hours' => '16 hours',
    'ban/period/day' => 'day',
    'ban/period/2-days' => '2 days',

    'users/user/recent-activity' => 'Recent activity',
    'users/user/recent-uploads' => 'Recent uploads',
    'users/user/recent-comments' => 'Recent comments',
    'users/user/registration-date' => 'Registration date',
    'users/user/last-visited' => 'Last visited',
    'users/user/send-personal-message' => 'Send personal message',
    'users/user/log' => 'User\'s log',
    'users/user/uploaded-pictures' => 'Uploaded pictures',
    'users/user/not-upload-pictures' => 'Not upload pictures',


    'users/rating/specifications' => 'Specifications',
    'users/rating/pictures' => 'Pictures',
    'users/rating/likes' => 'Likes',
    'users/rating/picture-likes' => 'Picture likes',
    'users/rating/specs-volume' => 'Specs volume',
    'users/rating/weight' => 'Weight',

    'users/registration/email-confirm-subject' => 'Registration on %1$s',
    'users/registration/email-confirm-message' =>
        "Hello.\n" .
        "You are registered on website %1\$s\n" .
        "Your registration details:\n" .
        "E-mail: %2\$s\n" .
        "To confirm registration, and your e-mail address, you will need to click on the link %3\$s\n\n" .
        "If you are not registered on the site, simply remove this message\n\n" .
        "Sincerely, Robot %4\$s",
    'users/registration/email-confirm/token-not-found' => 'The link you clicked is expires',
    'users/registration/email-confirm/success-text' => 'Your e-mail address is successfully confirmed.',
    'users/registration/success/email-sent' => 'Message with instructions to verify your e-mail sent.',
    'users/change-email/confirm-subject' => 'E-mail confirm on %1$s',
    'users/change-email/confirm-message' =>
        "Hello.\n\n" .
        "On the %1\$s you or someone else asked to change contact address of account to %2\$s\n" .
        "For confirmation of this action, you must click on the link %3\$s\n\n" .
        "If the message has got to you by mistake - just delete it\n\n" .
        "Sincerely, Robot %1\$s\n",
    'users/change-email/confirmation-message-sent' => 'E-mail with confirmation code was sent',

    'user/add-to-contacts' => 'Add to contacts',
    'user/remove-from-contacts' => 'Remove from contacts',

    'donate/text' => 'Despite the fact that we always try to work as non-comercial project, it is absolutely impossible to support encyclopedia without money.

Support and site development requires a permanent costs.

If you want to help to our everyday work, you can send us some money through PayPal or Yandex.Money.

With a money donation you can send us your vision about the future of the encyclopedia and the way it must move and we\'ll be much more obligated and grateful to your words.

We do not collect information about our donators, however if you wish, we can mark your contribution.

In addition we can offer in return to [choose the next vehicle of the day](/donate/vod)',
    'donate/target' => 'For website work',
    'donate/project' => 'WheelsAge.org',
    'donate/comment-hint' => 'Your wish',
    'donate/success-text' => 'Thank you for your support.
        
We will try not to disappoint you.',

    'donate/vod/text' => 'The little that we can offer in return for financial assistance of the site - it is an opportunity to choose the next "vehicle of the day".

Follow the instructions below.

We will be happy if you want to [perform selfless donation](/donate) to an arbitrary amount.',
    'donate/vod/select-date' => '1. Choose a date',
    'donate/vod/date-busy' => 'busy',
    'donate/vod/select-item' => '2. Choose vehicle',
    'donate/vod/select-item-text' => 'Almost any vehicle can be "Vehicle of the day", but there are some limitations:

- the vehicle must be selected for the first time
- the vehicle must have at least 3 photos',
    'donate/vod/select-item/selection:' => 'Selection: ',
    'donate/vod/select-item/select' => 'Choose ...',
    'donate/vod/preview' => '3. Preview',
    'donate/vod/anonymous' => 'Anonymously',
    'donate/vod/with-name' => 'With the name (registration required)',
    'donate/vod/make-donation' => '4. Make a donation',
    'donate/vod/order-message' => 'WheelsAge.org: vehicle of the day',
    'donate/vod/order-target' => 'Order %s',
    'donate/vod/message' => 'Your wishes',
    'donate/vod/price:' => 'Price:',
    'donate/vod/price/currency' => ' rubles',
    'donate/vod/price-aroud' => 'about $%s',
    'donate/vod/method/credit-card' => 'Credit card',
    'donate/vod/method/mobile' => 'Mobile operator account',
    'donate/vod/method/yandex.money' => 'Yandex.Money',
    'donate/vod/send' => 'Pay',

    'donate/vod/success-text' => 'When the information about your donation comes to us your choice will be carried out.

Thank you for your support.

We will try not to disappoint you.',
    'donate/vod/wants-to-select?' => 'Wants choose next?',

    'message/user-cancel-car-engine' => '%1$s cancel engine %2$s for %3$s ( %4$s ]',

    'car-type/roadster'       => 'Roadster',
    'car-type/spyder'         => 'Spyder',
    'car-type/cabriolet'      => 'Cabriolet',
    'car-type/cabrio-coupe'   => 'Cabrio-coupe',
    'car-type/targa'          => 'Targa',
    'car-type/coupe'          => 'Coupe',
    'car-type/sedan'          => 'Sedan',
    'car-type/hatchback'      => 'Hatchback',
    'car-type/crossover'      => 'Crossover',
    'car-type/universal'      => 'Touring',
    'car-type/limousine'      => 'Limousine',
    'car-type/pickup'         => 'Pickup',
    'car-type/caravan'        => 'Van',
    'car-type/offroad'        => 'SUV',
    'car-type/minivan'        => 'Minivan',
    'car-type/van'            => 'Van',
    'car-type/truck'          => 'Truck',
    'car-type/bus'            => 'Bus',
    'car-type/phaeton'        => 'Phaeton',
    'car-type/4door-hardtop'  => '4-door hardtop',
    'car-type/landau'         => 'Landau',
    'car-type/offroad-cabrio' => 'SUV-cabrio',
    'car-type/liftback-coupe' => 'Liftback-coupe',
    'car-type/liftback-sedan' => 'Liftback-sedan',
    'car-type/2door-hardtop'  => '2-door hardtop',
    'car-type/minibus'        => 'Minibus',
    'car-type/car'            => 'Car',
    'car-type/multiplex-bus'  => 'Multisection bus',
    'car-type/offroad-short'  => 'Short-SUV',
    'car-type/brougham'       => 'Brougham',
    'car-type/fastback-sedan' => 'Fastback-sedan',
    'car-type/fastback-coupe' => 'Fastback-coupe',
    'car-type/tonneau'        => 'Tonneau',
    'car-type/2-floor-bus'    => '2-floor bus',
    'car-type/town-car'       => 'Town car',
    'car-type/barchetta'      => 'Barchetta',
    'car-type/moto'           => 'Moto',
    'car-type/tractor'        => 'Tractor',
    'car-type/tracked'        => 'Tracked platform',

    'car-type-rp/roadster'       => 'Roadster',
    'car-type-rp/spyder'         => 'Spyder',
    'car-type-rp/cabriolet'      => 'Cabriolet',
    'car-type-rp/cabrio-coupe'   => 'Cabrio-coupe',
    'car-type-rp/targa'          => 'Targa',
    'car-type-rp/coupe'          => 'Coupe',
    'car-type-rp/sedan'          => 'Sedan',
    'car-type-rp/hatchback'      => 'Hatchback',
    'car-type-rp/crossover'      => 'Crossover',
    'car-type-rp/universal'      => 'Touring',
    'car-type-rp/limousine'      => 'Limousine',
    'car-type-rp/pickup'         => 'Pickup',
    'car-type-rp/caravan'        => 'Van',
    'car-type-rp/offroad'        => 'SUV',
    'car-type-rp/minivan'        => 'Minivan',
    'car-type-rp/van'            => 'Van',
    'car-type-rp/truck'          => 'Truck',
    'car-type-rp/bus'            => 'Bus',
    'car-type-rp/phaeton'        => 'Phaeton',
    'car-type-rp/4door-hardtop'  => '4-door hardtop',
    'car-type-rp/landau'         => 'Landau',
    'car-type-rp/offroad-cabrio' => 'SUV-cabrio',
    'car-type-rp/liftback-coupe' => 'Liftback-coupe',
    'car-type-rp/liftback-sedan' => 'Liftback-sedan',
    'car-type-rp/2door-hardtop'  => '2-door hardtop',
    'car-type-rp/minibus'        => 'Minibus',
    'car-type-rp/car'            => 'Car',
    'car-type-rp/multiplex-bus'  => 'Multisection bus',
    'car-type-rp/offroad-short'  => 'Short-SUV',
    'car-type-rp/brougham'       => 'Brougham',
    'car-type-rp/fastback-sedan' => 'Fastback-sedan',
    'car-type-rp/fastback-coupe' => 'Fastback-coupe',
    'car-type-rp/tonneau'        => 'Tonneau',
    'car-type-rp/2-floor-bus'    => '2-floor bus',
    'car-type-rp/town-car'       => 'Town car',
    'car-type-rp/barchetta'      => 'Barchetta',
    'car-type-rp/moto'           => 'Moto',
    'car-type-rp/tractor'        => 'Tractor',
    'car-type-rp/tracked'        => 'Tracked platform',

    'about/text' => '### People
Своим существованием наш проект обязан людям, приходящим сюда и вкладывающим своё время и знания.

Кто-то добавляет материалы, а кто-то помогает найти ошибки в уже имещихся. Кто-то специализируется на конкретной марке, а кто-то успевает за всем. Кто-то без лишнего внимания со стороны наполняет сайт шаг за шагом, а кто-то собирает овации редкими, но жгучими фото.

Нас много и мы разные, и это прекрасно. Вот лишь некоторые из нас:

%users%

#### "Цветовая дифференциация штанов"

Так завелось, что мы выделяем некоторых наших людей особым цветом - зеленым. Не просто так - это особая метка. Знайте, если вы видите кого-то из "зеленых", вы всегда можете схватить его и спросить о чем угодно вокруг нашего проекта, потому что "зеленые" - это самые отзывчивые и заинтересованные в жизни проекта люди.

Некоторая часть "зеленых" наделена модераторскими функциями.

### Feedback

Если у вас есть какие-то замечания, предложения или иные мысли, вы можете озвучить их на [форуме](/forums/), задать лично через систему обмена сообщениями или написать в "[обратную связь](/ng/feedback)" администрации сайта.

Если у вас есть вопросы о размещении рекламы, обмена ссылками или продвижении вашего продукта иными способами, все они имеют единственный ответ: мы не размещаем рекламу.

### Numbers

Так сложилось, что мы любим тешить своё тщеславие большими цифрами, а также всем их показывать. Вашему вниманию некоторые из них:

* на сайте более %total-pictures% изображений, %total-vehicles% автомобилей, что составляет порядка %total-size% данных
* зарегистрировано около %total-users% пользователей, оставивших более %total-comments% сообщений

### Development

Разработка и поддержка проекта ведется в основном силами %developer% ([contributors](https://github.com/autowp/autowp/graphs/contributors))

French site translation: %fr-translator%

Chinese site translation: %zh-translator%

Сайт работает на [Zend Framework](http://framework.zend.com/), [jQuery](http://jquery.com/), [Twitter bootstrap](http://getbootstrap.com/), а также многих других "умных словах".

Исходный кода сайта является открытым, чтобы каждый желающий имел возможность влиять на суть и качество проекта.

%github%

[![Build Status](https://travis-ci.org/autowp/autowp.svg?branch=master)](https://travis-ci.org/autowp/autowp)
[![Code Climate](https://codeclimate.com/github/autowp/autowp/badges/gpa.svg)](https://codeclimate.com/github/autowp/autowp)
[![Coverage Status](https://coveralls.io/repos/github/autowp/autowp/badge.svg?branch=master)](https://coveralls.io/github/autowp/autowp?branch=master)

### Поддержать проект

You can support our project by [finances](/donate) or [moral](/ng/feedback).
Take part in [the translation of the site](https://github.com/autowp/autowp/tree/master/module/Application/language) into other languages.',

    'page/1/name' => "Index page",
    'page/2/name' => "Main menu",
    'page/10/name' => "Brand",
    'page/14/name' => "%BRAND_NAME% in chronological order",
    'page/15/name' => "Last pictures of %BRAND_NAME%",
    'page/19/name' => "Brands",
    'page/20/name' => "Brand type",
    'page/21/name' => "Mostly",
    'page/22/name' => "Categories",
    'page/24/name' => "Limited and special editions of cars",
    'page/25/name' => "Twins",
    'page/27/name' => "Specifications of %TWINS_GROUP_NAME%",
    'page/28/name' => "All pictures of %TWINS_GROUP_NAME%",
    'page/29/name' => "Add picture",
    'page/30/name' => "Select brand",
    'page/31/name' => "Articles",
    'page/34/name' => "All pictures of %CAR_NAME%",
    'page/36/name' => "Specifications of %CAR_NAME%",
    'page/37/name' => "%BRAND_NAME% concepts & prototypes",
    'page/39/name' => "%BRAND_NAME% logotypes",
    'page/40/name' => "%BRAND_NAME% miscellaneous",
    'page/41/name' => "Unsorted",
    'page/42/name' => "Forums",
    'page/45/name' => "New topic",
    'page/48/name' => "Cabinet",
    'page/49/name' => "Personal messages",
    'page/51/name' => "New pictures",
    'page/52/name' => "Registration",
    'page/53/name' => "ok",
    'page/54/name' => "Confirm the email address",
    'page/55/name' => "My e-mail",
    'page/56/name' => "Changed",
    'page/57/name' => "Forums subscriptions",
    'page/60/name' => "Password recovery",
    'page/61/name' => "All brands",
    'page/63/name' => "User's pictures",
    'page/66/name' => "All pictures of %BRAND_NAME% %DESIGN_PROJECT_NAME%",
    'page/67/name' => "Moderator page",
    'page/68/name' => "Pages",
    'page/69/name' => "Add",
    'page/70/name' => "Edit",
    'page/71/name' => "Rights",
    'page/73/name' => "Pictures",
    'page/74/name' => "Alphabetical vehicles list",
    'page/75/name' => "Log of events",
    'page/76/name' => "Inbox",
    'page/77/name' => "Traffic",
    'page/79/name' => "Sign in",
    'page/80/name' => "Sent",
    'page/81/name' => "System messages",
    'page/83/name' => "Move",
    'page/86/name' => "Image successfully uploaded to the site",
    'page/87/name' => "More",
    'page/89/name' => "Feedback",
    'page/90/name' => "Sign out",
    'page/91/name' => "Registration",
    'page/93/name' => "Message sent",
    'page/94/name' => "Unmoderated",
    'page/96/name' => "Twins",
    'page/97/name' => "Perspectives",
    'page/100/name' => "Attributes",
    'page/102/name' => "Specs editors %CAR_NAME%",
    'page/103/name' => "History",
    'page/104/name' => "User statistics",
    'page/105/name' => "Add a comment",
    'page/106/name' => "Rules",
    'page/107/name' => "Delete votes",
    'page/109/name' => "Cutaway",
    'page/110/name' => "Comments",
    'page/114/name' => "Specifications log",
    'page/117/name' => "Map",
    'page/119/name' => "Statistics",
    'page/120/name' => "Блоки",
    'page/122/name' => "Specifications",
    'page/123/name' => "My accounts",
    'page/124/name' => "Who is online?",
    'page/125/name' => "Categories",
    'page/126/name' => "Add",
    'page/127/name' => "Edit",
    'page/128/name' => "Inbox",
    'page/129/name' => "Profile",
    'page/130/name' => "My pictures",
    'page/131/name' => "Items",
    'page/133/name' => "Access Control",
    'page/134/name' => "New password",
    'page/135/name' => "New password saved",
    'page/136/name' => "About us",
    'page/137/name' => "Account delete",
    'page/138/name' => "%BRAND_NAME% %CAR_TYPE_NAME% in chronological order",
    'page/141/name' => "%BRAND_NAME% pictures",
    'page/144/name' => "Parent selection",
    'page/148/name' => "Cropper",
    'page/149/name' => "Move picture",
    'page/153/name' => "%BRAND_NAME% Twins",
    'page/154/name' => "Most %MOST_NAME%",
    'page/155/name' => "Most %MOST_NAME% %CAR_TYPE_NAME%",
    'page/156/name' => "Most %MOST_NAME% %CAR_TYPE_NAME% %YEAR_NAME%",
    'page/161/name' => "Pulse",
    'page/162/name' => "Pictures",
    'page/164/name' => "Mosts",
    'page/166/name' => "Most %MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME%",
    'page/167/name' => "Most %MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME% %YEAR_NAME%",
    'page/173/name' => "Statistics",
    'page/174/name' => "Specs",
    'page/175/name' => "Factories",
    'page/176/name' => "Add",
    'page/180/name' => "Factories",
    'page/182/name' => "Products",
    'page/186/name' => "Pictures",
    'page/188/name' => "Conflicts",
    'page/189/name' => "Too many conflicts",
    'page/196/name' => "Donate",
    'page/197/name' => "Text history",
    'page/198/name' => "Contacts",

    'page/1/title' => "Encyclopedia of cars in the pictures. WheelsAge.org",
    'page/14/title' => "%BRAND_NAME% in chronological order",
    'page/15/title' => "Last pictures of %BRAND_NAME%",
    'page/19/title' => "Brands",
    'page/21/title' => "Mostly",
    'page/22/title' => "Categories",
    'page/25/title' => "Twins",
    'page/27/title' => "Specifications of %TWINS_GROUP_NAME%",
    'page/28/title' => "All pictures of %TWINS_GROUP_NAME%",
    'page/29/title' => "Add picture",
    'page/30/title' => "Select brand",
    'page/31/title' => "Articles",
    'page/34/title' => "All pictures of %CAR_NAME%",
    'page/36/title' => "Specifications of %CAR_NAME%",
    'page/37/title' => "%BRAND_NAME% concepts & prototypes",
    'page/39/title' => "%BRAND_NAME% logotypes",
    'page/40/title' => "%BRAND_NAME% miscellaneous",
    'page/41/title' => "Unsorted",
    'page/42/title' => "Forums",
    'page/45/title' => "New topic",
    'page/48/title' => "Cabinet",
    'page/49/title' => "Personal messages",
    'page/52/title' => "Registration",
    'page/53/title' => "Successful registration",
    'page/54/title' => "Confirm the email address",
    'page/55/title' => "My e-mail",
    'page/56/title' => "Changing e-mail",
    'page/57/title' => "Forums subscriptions",
    'page/60/title' => "Password recovery",
    'page/63/title' => "User's pictures",
    'page/66/title' => "All pictures of %BRAND_NAME% %DESIGN_PROJECT_NAME%",
    'page/73/title' => "Pictures",
    'page/74/title' => "Alphabetical vehicles list",
    'page/75/title' => "Log of events",
    'page/76/title' => "Inbox",
    'page/79/title' => "Sign in",
    'page/80/title' => "Sent",
    'page/81/title' => "System messages",
    'page/83/title' => "Move",
    'page/86/title' => "Image successfully uploaded to the site",
    'page/87/title' => "More",
    'page/94/title' => "Unmoderated",
    'page/102/title' => "Specs editors %CAR_NAME%",
    'page/103/title' => "History",
    'page/105/title' => "Add a comment",
    'page/106/title' => "Rules",
    'page/107/title' => "Delete votes",
    'page/110/title' => "Comments",
    'page/114/title' => "Log of events",
    'page/117/title' => "Map",
    'page/122/title' => "Specifications",
    'page/123/title' => "My accounts",
    'page/125/title' => "Categories",
    'page/126/title' => "Add",
    'page/127/title' => "Edit",
    'page/128/title' => "Inbox",
    'page/129/title' => "Profile",
    'page/130/title' => "My pictures",
    'page/133/title' => "Access Control",
    'page/134/title' => "New password",
    'page/136/title' => "About us",
    'page/138/title' => "%BRAND_NAME% %CAR_TYPE_NAME% in chronological order",
    'page/141/title' => "%BRAND_NAME% pictures",
    'page/144/title' => "Parent selection",
    'page/148/title' => "Cropper",
    'page/149/title' => "Move picture",
    'page/153/title' => "%BRAND_NAME% Twins",
    'page/154/title' => "Most %MOST_NAME%",
    'page/155/title' => "Most %MOST_NAME% %CAR_TYPE_NAME%",
    'page/156/title' => "Most %MOST_NAME% %CAR_TYPE_NAME% %YEAR_NAME%",
    'page/161/title' => "Pulse",
    'page/162/title' => "Pictures",
    'page/163/title' => "New vehicle",
    'page/164/title' => "Mosts",
    'page/166/title' => "Most %MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME%",
    'page/167/title' => "Most %MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME% %YEAR_NAME%",
    'page/173/title' => "Statistics",
    'page/174/title' => "Specs",
    'page/175/title' => "Factories",
    'page/176/title' => "Add",
    'page/180/title' => "Factories",
    'page/182/title' => "Products",
    'page/186/title' => "Pictures",
    'page/188/title' => "Conflicts",
    'page/189/title' => "Too many conflicts",
    'page/196/title' => "Donate",
    'page/197/title' => "Text history",
    'page/198/title' => "Contacts",

    'page/14/breadcrumbs' => "In chronological order",
    'page/15/breadcrumbs' => "Last pictures",
    'page/19/breadcrumbs' => "Brands",
    'page/27/breadcrumbs' => "Specifications",
    'page/28/breadcrumbs' => "All pictures",
    'page/30/breadcrumbs' => "Select brand",
    'page/31/breadcrumbs' => "Articles",
    'page/34/breadcrumbs' => "All pictures",
    'page/36/breadcrumbs' => "Specifications",
    'page/37/breadcrumbs' => "Concepts & prototypes",
    'page/39/breadcrumbs' => "Logotypes",
    'page/40/breadcrumbs' => "Miscellaneous",
    'page/41/breadcrumbs' => "Unsorted",
    'page/45/breadcrumbs' => "New topic",
    'page/63/breadcrumbs' => "User's pictures",
    'page/66/breadcrumbs' => "All pictures",
    'page/74/breadcrumbs' => "Alphabetical vehicles list",
    'page/75/breadcrumbs' => "Log of events",
    'page/76/breadcrumbs' => "Inbox",
    'page/83/breadcrumbs' => "Move",
    'page/86/breadcrumbs' => "Success",
    'page/102/breadcrumbs' => "Specs editors",
    'page/109/breadcrumbs' => "Cutaway",
    'page/122/breadcrumbs' => "Specifications",
    'page/123/breadcrumbs' => "My accounts",
    'page/136/breadcrumbs' => "About us",
    'page/141/breadcrumbs' => "%BRAND_NAME% pictures",
    'page/144/breadcrumbs' => "Brand selection",
    'page/146/breadcrumbs' => "Twins group selection",
    'page/147/breadcrumbs' => "Design project selection",
    'page/148/breadcrumbs' => "Cropper",
    'page/149/breadcrumbs' => "Move picture",
    'page/161/breadcrumbs' => "Pulse",
    'page/162/breadcrumbs' => "Pictures",
    'page/163/breadcrumbs' => "New vehicle",
    'page/164/breadcrumbs' => "Mosts",
    'page/173/breadcrumbs' => "Statistics",
    'page/174/breadcrumbs' => "Specs",
    'page/175/breadcrumbs' => "Factories",
    'page/176/breadcrumbs' => "Add",
    'page/178/breadcrumbs' => "Factory selection",
    'page/180/breadcrumbs' => "Factories",
    'page/182/breadcrumbs' => "Products",
    'page/186/breadcrumbs' => "Pictures",
    'page/188/breadcrumbs' => "Conflicts",
    'page/189/breadcrumbs' => "Too many conflicts",
    'page/196/breadcrumbs' => "Donate",
    'page/197/breadcrumbs' => "Text history",
    'page/198/breadcrumbs' => "Contacts",

    'page/201/name'        => "Mascots",
    'page/201/title'       => "Mascots",
    'page/201/breadcrumbs' => "Mascots",

    'page/202/name'        => 'Perspectives',
    'page/202/title'       => 'Perspectives',
    'page/202/breadcrumbs' => 'Perspectives',

    'page/203/name'        => 'Users',
    'page/203/title'       => 'Users',
    'page/203/breadcrumbs' => 'Users',

    'page/204/name'        => 'Telegram',
    'page/204/title'       => 'Telegram',
    'page/204/breadcrumbs' => 'Telegram',

    'page/205/name'        => 'Comments',
    'page/205/title'       => 'Comments',
    'page/205/breadcrumbs' => 'Comments',

    'page/208/name'        => '%BRAND_NAME% Engines',
    'page/208/title'       => '%BRAND_NAME% Engines',
    'page/208/breadcrumbs' => '%BRAND_NAME% Engines',

    'page/211/name'        => 'Contacts',
    'page/211/title'       => 'Contacts',
    'page/211/breadcrumbs' => 'Contacts',

    'page/212/name'        => 'Picture vote templates',
    'page/212/title'       => 'Picture vote templates',
    'page/212/breadcrumbs' => 'Picture vote templates',

    'moder-menu/title' => 'Moderator menu',
    'moder-menu/inbox' => 'Inbox',

    'moder/database-id-%s' => 'Database id: %s',
    'ng/moder/database-id-n' => 'Database id: {id}',

    'moder/picture/missing-perspective' => 'Missing perspective',
    'moder/picture/delete-queue' => 'Delete queue',
    'moder/picture/votes' => 'Votes',
    'moder/picture/comments' => 'Comments',
    'moder/picture/new-votes' => 'New votes',
    'moder/picture/replaces' => 'Replaces',
    'moder/picture/edit/special-name' => 'Special name',

    'moder/pictures/acceptance/message' => 'Message',

    'moder/vehicle/name' => 'Name',
    'moder/vehicle/body' => 'Body number',
    'moder/vehicle/spec' => 'Spec',
    'moder/vehicle/type' => 'Type',
    'moder/vehicle/model-years' => 'Model years',
    'moder/vehicle/begin' => 'Begin',
    'moder/vehicle/end' => 'End',
    'moder/item/produced' => 'Produced',
    'moder/item/produced/number' => 'number',
    'moder/item/produced/precision' => 'exactly?',
    'moder/item/produced/about' => 'about',
    'moder/item/produced/exactly' => 'exactly',
    'moder/vehicle/concept' => 'Concept (prototype)',
    'moder/vehicle/group' => 'Group',
    'moder/vehicle/year' => 'year',
    'moder/vehicle/year/from' => 'from',
    'moder/vehicle/year/to' => 'to',
    'moder/vehicle/month' => 'month',
    'moder/vehicle/today' => 'today',
    'moder/vehicle/today/ended' => 'ended',
    'moder/vehicle/today/continue' => 'continue in pr.',
    'moder/vehicle/is-concept/no' => 'no',
    'moder/vehicle/is-concept/yes' => 'yes',
    'moder/vehicle/is-concept/inherited-no' => 'inherited (no)',
    'moder/vehicle/is-concept/inherited-yes' => 'inherited (yes)',
    'moder/vehicle/is-concept/inherited' => 'inherited',

    'moder/item/short-description' => 'Short description',
    'moder/item/full-description' => 'Full description',

    'moder/vehicle/meta/description' => 'Short description',

    'moder/vehicle/move/here' => 'here',

    'moder/vehicle/add/as-submodel' => 'As submodel',

    'attrs/attribute/name' => 'Name',
    'attrs/attribute/type' => 'Type',
    'attrs/attribute/unit' => 'Unit',
    'attrs/attribute/precision' => 'Precision (for float attribute)',
    'attrs/attribute/description' => 'Description',

    'attrs/list-options/parent' => 'Parent',
    'attrs/list-options/name' => 'Name',

    'moder/attrs/zones' => 'Zones',
    'moder/attrs/parameters' => 'Attribute parameters',
    'moder/attrs/parameters/options-list' => 'Values list (for select)',
    'moder/attrs/parameters/options-list/add' => 'Add value',
    'moder/attrs/attributes' => 'Attributes',
    'moder/attrs/attribute/add-subattribute' => 'add subattribute',
    'moder/attrs/attributes-order' => 'Attributes order',

    'category/name' => 'Name',
    'category/parent' => 'Parent',
    'categories/other' => 'Other',

    'moder/categories/add' => 'Add',
    'moder/categories/edit' => 'Edit',
    'moder/categories/new' => 'New',

    'moder/picture/edit-picture-%s' => 'Edit picture №%s',
    'moder/picture/edit-item-%s' => 'Edit item %s',
    'moder/picture/edit-brand-%s' => 'Edit brand %s',
    'moder/picture/edit-engine-%s' => 'Edit engine %s',
    'moder/picture/edit-factory-%s' => 'Edit factory %s',

    'moder/picture/picture-n-%s' => 'Picture №%s',
    'moder/picture/previous' => '<< previous',
    'moder/picture/next' => 'next >>',
    'moder/picture/previous-new' => '<< previous new',
    'moder/picture/next-new' => 'next new >>',

    'moder/picture/perspective' => 'Perspective',
    'moder/picture/perspective-by' => 'By: ',

    'moder/picture/acceptance' => 'Status/Delete/Accept',
    'moder/picture/acceptance/accepted' => 'Accepted',
    'moder/picture/acceptance/not-accepted' => 'Not accepted',
    'moder/picture/acceptance/in-delete-queue' => 'In delete queue',
    'moder/picture/acceptance/accept' => 'Accept',
    'moder/picture/acceptance/delete' => 'Delete',
    'moder/picture/acceptance/unaccept' => 'Unaccept',
    'moder/picture/acceptance/restore' => 'Restore',
    'moder/picture/acceptance/removed' => 'Deleted',
    'moder/picture/acceptance/removing' => 'Deleting',
    'moder/picture/acceptance/inbox' => 'Inbox',
    'moder/picture/acceptance/reason' => 'Reason',
    'moder/picture/acceptance/custom' => 'Custom ...',
    'moder/picture/acceptance/add-reason' => 'Add template',
    'moder/picture/acceptance/vote' => 'Vote',

    'moder/picture/acceptance/want-accept' => 'Want accept',
    'moder/picture/acceptance/want-delete' => 'Want delete',
    'moder/picture/acceptance/cancel-vote' => 'Cancel my vote',
    'moder/picture/acceptance/already-voted' => 'Already voted: ',
    'moder/picture/acceptance/that-is-one-accepted-picture' => 'That is single picture of that vehicle',
    'ng/moder/picture/acceptance/accepted-pictures-is-n' => 'Accepted pictures count still {count}',
    'moder/picture/acceptance/accepted-pictures-is-%s' => 'Accepted pictures count still %s',

    'moder/picture/public-url:' => 'Public URL: ',
    'moder/picture/image:' => 'Image: ',
    'moder/picture/image-specs:' => 'Image specs: ',
    'moder/picture/resolution:' => 'Resolution: ',
    'moder/picture/filesize:' => 'File size: ',
    'moder/picture/upload-date:' => 'Upload date: ',
    'moder/picture/settings' => 'Settings',
    'moder/picture/copyrights' => 'Copyrights',

    'moder/pciture/move/brands' => 'Brands',
    'moder/pciture/move/factories' => 'Factories',
    'moder/pciture/move/engines' => 'Engines',

    'brand' => 'Brand',
    'brand/name' => 'Name',
    'brand/logo' => 'Logotype',

    'moder/brands/meta-data/full-name' => 'Full name',
    'moder/brands/logo/description' => '* Logotopy must be in PNG format.
* All transparent regions must be transparent but not white!
* Logotype must be close to edges. Margin not required
* Upload images in maximum resolution - thats give quality and ability to use it in future. On website logo scaled automaticaly',
    'moder/brands/logo/saved' => 'Logotype saved',

    'moder/edit-object' => 'edit',

    'moder/markdown/description' => 'Markdown syntax.

Few manuals:
[1](https://en.wikipedia.org/wiki/Markdown),
[2](https://guides.github.com/features/mastering-markdown/),
[3](https://daringfireball.net/projects/markdown/basics),

Internal hyperlinks must be relative: ~~http://autowp.ru/bmw/~~ */bmw/*',
    'moder/markdown/edit' => 'Edit',
    'moder/markdown/preview' => 'Preview',
    'moder/markdown/history' => 'History',

    'moder/users/login' => 'Login',
    'moder/users/name' => 'Name',
    'moder/users/role' => 'Role',
    'moder/users/profile' => 'Profile',
    'moder/users/last-visit' => 'Last visit',
    'moder/users/registration' => 'Registration',

    'latitude' => 'Latitude',
    'longtitude' => 'Longtitude',

    'museum/name' => 'Name',
    'museum/address' => 'Address',
    'museum/photo' => 'Photo',
    'museum/description' => 'Description',

    'moder/museums/add' => 'Add museum',

    'factory/name' => 'Name',
    'factory/year_from' => 'From year',
    'factory/year_to' => 'To year',

    'moder/comments/title' => 'Comments',
    'moder/comments/filter' => 'Filter',
    'moder/comments/filter/user-id' => 'User №',
    'moder/comments/filter/brand-id' => 'Brand №',
    'moder/comments/filter/moderator_attention' => 'Moderator attention',
    'moder/comments/filter/moderator_attention/not-matters' => 'Not matters',
    'moder/comments/filter/moderator_attention/not-required' => 'Not required',
    'moder/comments/filter/moderator_attention/required' => 'Required',
    'moder/comments/filter/moderator_attention/resolved' => 'Resolved',
    'moder/comments/filter/vehicle-id' => 'Item',
    'moder/comments/not-readed' => 'not readed',

    'engine/name' => 'Name',

    'moder/engines/engine/vehicles' => 'Vehicles with that engine',

    'page/name' => 'Name',
    'page/is_group_node' => 'Is group node?',
    'page/registered_only' => 'Only for registered?',
    'page/guests_only' => 'Only for guests?',
    'page/class' => 'Class',
    'page/parent' => 'Parent',

    'moder/pages/new' => 'New',

    'moder/index/other-tools' => 'Other tools',

    'moder/acl/add-role' => 'Add role',
    'moder/acl/add-rule' => 'Add rule',
    'moder/acl/add-rule/action' => 'Action',
    'moder/acl/add-rule/action/allow' => 'allow',
    'moder/acl/add-rule/action/deny' => 'deny',
    'moder/acl/add-parent' => 'Add parent',
    'moder/acl/role' => 'Role',
    'moder/acl/parent-role' => 'Parent role',
    'moder/acl/privilege' => 'Privilege',

    'votings/do-vote' => 'Vote',
    'votings/who-voted' => 'Who voted?',
    'votings/voting/voters/during-%s-%s' => 'Voting during %s to %s',
    'votings/voting/voters/show-all' => 'show all',
    'votings/voting/voters/show-contributors' => 'show from 100 uploaded pictures',

    'museums/museum/address:' => 'Address:',
    'museums/museum/on-the-map' => 'on the map',
    'museums/museum/website:' => 'Web-site: ',

    'restore-password/text' => 'If you lost your password - input your e-mail and you give instruction to create new one',
    'restore-password/new-password/text' => 'Enter new password',
    'restore-password/new-password/saved' => 'New password saved.

Don\'t forget it.',
    'restore-password/new-password/instructions-sent' => 'Instructions sent to your e-mail',
    'restore-password/new-password/email-not-found' => 'User with that e-mail not found',
    'restore-password/new-password/mail/subject' => 'Password restore',
    'restore-password/new-password/mail/body-%s' =>
        "Follow link to enter new password: %s\n\n" .
        "Sincerely, robot www.wheelsage.org\n",

    'twins/group/name' => 'Name',
    'twins/group/description' => 'Description',

    'specifications-editor/description' => 'Просьба отнестить со всей ответственностью ко всем выполняемым действиям, т.к. они станут достоянием общественности.


О структуре самих характеристик.

Все характеристики организованы в виде дерева элементов "параметр - значение". Значения могут быть числовыми и текстовыми.

Важной особенностью является тот факт, что каждая характеристика может быть задана одновременно несколькими пользователями. В этом случае актуальным (используемым) значением является то, которое система сочтет приоритетным по ряду признаков.

Если вы столкнулись с ситуацией, когда вам не удаётся перекрыть введенное кем-то ранее значение, то вы можете просто написать об этом автору. Впрочем в процессе реализации система автоматического уведомления автором о том, что с его значением кто-то не согласен.


Все значения, которые здесь вводятся - отображаются на сайте, в характеристиках, используются в построении разделы "самые-самые", а также отображаются в некоторых других местах сайта.',
    'specifications-editor/not-save' => 'Data not save because of error. Details below',
    'specifications-editor/parameter' => 'Parameter',
    'specifications-editor/your-value' => 'Your value',
    'specifications-editor/actual-value' => 'Current value',
    'specifications-editor/all-values' => 'All values',
    'specifications-editor/tabs/info' => 'Info',
    'specifications-editor/tabs/engine' => 'Engine',
    'specifications-editor/tabs/specs' => 'Specs',
    'specifications-editor/tabs/result' => 'Result',
    'specifications-editor/tabs/admin' => 'Admin',
    'specifications-editor/engine' => 'Engine from catalogue',
    'specifications-editor/engine/inherited-from' => 'Inherited from',
    'specifications-editor/engine/select-another' => 'Select another engine',
    'specifications-editor/engine/cancel' => 'Cancel engine',
    'specifications-editor/engine/inherit' => 'Inherit engine',
    'specifications-editor/engine/not-selected' => '[not selected]',
    'specifications-editor/engine/select' => 'Select engine',
    'specifications-editor/engine/dont-inherit' => 'Don\'t inherit engine',
    'specifications-editor/save' => 'Save',

    'specifications-editor/log' => 'Log of values',
    'specifications-editor/log/date' => 'Date',
    'specifications-editor/log/user' => 'User',
    'specifications-editor/log/object' => 'Object',
    'specifications-editor/log/attribute' => 'Attribyte',
    'specifications-editor/log/value' => 'Value',
    'specifications-editor/log/editor' => 'Editor',
    'specifications-editor/log/to-editor' => 'to editor',
    'specifications-editor/log/filter/user-id' => 'User',
    'specifications-editor/log/low-weight-text' => 'Зарегистрировано большое количество конфликтов в данных, введеных вами. Другие люди часто опревергают информацию, предоставленную вами.

Ввод данных временно приостановлен. Просьба исправить ситуацию, провести ревизию конфликтов.

Осуществить это поможет [специальный интерфейс](/account/specs-conflicts/conflict/minus-weight), в котором собраны по крайней мере те ошибки, которые обнаружили посетители сайта.',
    'specifications-editor/errors-alert' => '**Внимание!** Вроятно, у вас накопилось существенное количество ошибок.

Некоторые из них, обнаруженные другими посетителями, вы можете найти [здесь](/account/specs-conflicts)',

    'specifications-editor/admin/date' => 'Date',
    'specifications-editor/admin/user' => 'User',
    'specifications-editor/admin/parameter' => 'Parameter',
    'specifications-editor/admin/value' => 'Value',
    'specifications-editor/admin/move' => 'Move',

    'pm/user-%s-edited-brand-description-%s-%s' => 'User %s edited brand description %s ( %s )',
    'pm/user-%s-edited-item-language-%s-%s' => "User %s edited language data %s ( %s )\n%s",
    'pm/user-%s-edited-vehicle-meta-data-%s-%s-%s' => "User %s edited meta-data %s ( %s )\n%s",
    'pm/user-%s-adds-item-%s-%s-to-item-%s-%s' => 'User %s added %s ( %s ) to %s ( %s )',
    'pm/user-%s-removed-item-%s-%s-from-item-%s-%s' => 'User %s removed %s ( %s ) from %s ( %s )',
    'pm/user-%s-cancel-link-vehicle-%s-%s-with-categories-%s' => 'User %s cancel link item %s ( %s ) with categories: %s',
    'pm/user-%s-edited-factory-description-%s-%s' => 'User %s edited factory description %s ( %s )',
    'pm/your-picture-%s-enqueued-to-remove-%s' => "Your picture %s enqueued to remove\n%s",
    'pm/new-picture-%s-vote-%s/accept' => "New picture accept vote\n%s\nReason: %s",
    'pm/new-picture-%s-vote-%s/delete' => "New picture delete vote\n%s\nReason: %s",
    'pm/user-%s-edited-picture-copyrights-%s-%s' => 'User %s edited picture copyrights %s ( %s )',
    'pm/user-%s-accept-replace-%s-%s' => '%s accept replacement %s на %s',
    'pm/your-picture-accepted-%s' => "Your picture was accepted\n%s",
    'pm/user-%s-edited-twins-description-%s-%s' => 'User %s edited twins group description %s ( %s )',
    'pm/user-%s-edited-vehicle-specs-%s' => '%s edited vehicle spcifications %s',
    'pm/user-%s-canceled-vehicle-engine-%s-%s-%s' => '%s canceled engine %s for vehicle %s ( %s )',
    'pm/user-%s-set-inherited-vehicle-engine-%s-%s' => '%s set inherited engine to vehicle %s ( %s )',
    'pm/user-%s-set-vehicle-engine-%s-%s-%s' => '%s set engine %s to vehicle %s ( %s )',
    'pm/user-%s-replies-to-you-%s' => "%s replies to you\n%s",
    'pm/user-%s-post-new-message-%s' => "%s posted new message\n%s",

    'moder/vehicle/changes/name-%s-%s' => 'name from "%s" to "%s"',
    'moder/vehicle/changes/body-%s-%s' => 'body number from "%s" to "%s"',
    'moder/vehicle/changes/from/year-%s-%s' => 'start year from "%s" to "%s"',
    'moder/vehicle/changes/from/month-%s-%s' => 'start month from "%s" to "%s"',
    'moder/vehicle/changes/to/year-%s-%s' => 'end year from "%s" to "%s"',
    'moder/vehicle/changes/to/month-%s-%s' => 'end month from "%s" to "%s"',
    'moder/vehicle/changes/to/today-%s-%s' => 'produced today from "%s" to "%s"',
    'moder/vehicle/changes/produced/count-%s-%s' => 'produced count from "%s" to "%s"',
    'moder/vehicle/changes/produced/exactly-%s-%s' => 'produced count exactly from "%s" to "%s"',
    'moder/vehicle/changes/is-group-%s-%s' => 'group flag from "%s" to "%s"',
    'moder/vehicle/changes/car-type-%s-%s' => 'car type from "%s" to "%s"',
    'moder/vehicle/changes/model-years/from-%s-%s' => 'start model year from "%s" to "%s"',
    'moder/vehicle/changes/model-years/to-%s-%s' => 'end model year from "%s" to "%s"',
    'moder/vehicle/changes/spec-%s-%s' => 'spec from "%s" to "%s"',

    'moder/vehicle/changes/boolean/true' => 'yes',
    'moder/vehicle/changes/boolean/false' => 'no',

    'specifications/no-value-text' => 'no value',
    'specifications/boolean/false' => 'no',
    'specifications/boolean/true' => 'yes',

    "Brand '%value%' already exists" => "Brand '%value%' already exists",
    "E-mail '%value%' not registered" => "E-mail '%value%' not registered",
    "E-mail '%value%' already registered" => "E-mail '%value%' already registered",

    'specs/attrs/45' => 'название модификации',
    'specs/attrs/95' => 'года выпуска',
    'specs/attrs/95/96' => 'с',
    'specs/attrs/95/97' => 'по',
    'specs/attrs/95/106' => 'продажи',
    'specs/attrs/95/106/109' => 'с',
    'specs/attrs/95/106/109/129' => 'год',
    'specs/attrs/95/106/109/130' => 'месяц',
    'specs/attrs/95/106/109/131' => 'число',
    'specs/attrs/95/106/111' => 'по',
    'specs/attrs/95/106/111/132' => 'год',
    'specs/attrs/95/106/111/133' => 'месяц',
    'specs/attrs/95/106/111/134' => 'число',
    'specs/attrs/95/104' => 'модельные',
    'specs/attrs/95/104/113' => 'с',
    'specs/attrs/95/104/114' => 'по',
    'specs/attrs/95/107' => 'дебют на автосалоне',
    'specs/attrs/95/107/118' => 'год',
    'specs/attrs/95/107/119' => 'месяц',
    'specs/attrs/95/107/120' => 'число',
    'specs/attrs/95/108' => 'производство',
    'specs/attrs/95/108/121' => 'с',
    'specs/attrs/95/108/121/123' => 'год',
    'specs/attrs/95/108/121/124' => 'месяц',
    'specs/attrs/95/108/121/125' => 'число',
    'specs/attrs/95/108/122' => 'по',
    'specs/attrs/95/108/122/126' => 'год',
    'specs/attrs/95/108/122/127' => 'месяц',
    'specs/attrs/95/108/122/128' => 'число',
    'specs/attrs/95/135' => 'участие в соревнованиях',
    'specs/attrs/95/135/136' => 'с',
    'specs/attrs/95/135/137' => 'по',
    'specs/attrs/16' => 'basic',
    'specs/attrs/16/12' => 'number of places',
    'specs/attrs/16/12/67' => 'total',
    'specs/attrs/16/12/67/description' => 'seating',
    'specs/attrs/16/12/68' => 'are defective',
    'specs/attrs/16/12/69' => 'standing',
    'specs/attrs/16/12/103' => 'total capacity',
    'specs/attrs/16/12/103/description' => 'including standing',
    'specs/attrs/16/13' => 'doors counts',
    'specs/attrs/16/66' => 'steering wheel location',
    'specs/attrs/16/66/options/11' => 'at left',
    'specs/attrs/16/66/options/12' => 'at right',
    'specs/attrs/16/66/options/13' => 'at center',
    'specs/attrs/16/204' => 'design',
    'specs/attrs/16/204/options/85' => 'bearing body',
    'specs/attrs/16/204/options/86' => 'frame',
    'specs/attrs/14' => 'geometry',
    'specs/attrs/14/4' => 'wheel base',
    'specs/attrs/14/17' => 'dimensions',
    'specs/attrs/14/17/description' => 'external dimensions',
    'specs/attrs/14/17/1' => 'length',
    'specs/attrs/14/17/2' => 'width',
    'specs/attrs/14/17/3' => 'height',
    'specs/attrs/14/17/140' => 'width, including mirrors',
    'specs/attrs/14/17/141' => 'height, including railings',
    'specs/attrs/14/17/203' => 'height with open roof',
    'specs/attrs/14/18' => 'track',
    'specs/attrs/14/18/5' => 'front',
    'specs/attrs/14/18/6' => 'rear',
    'specs/attrs/14/63' => 'air resistance',
    'specs/attrs/14/63/64' => 'frontal',
    'specs/attrs/14/63/65' => 'lateral',
    'specs/attrs/14/167' => 'ground clearance',
    'specs/attrs/14/167/description' => '',
    'specs/attrs/14/167/176' => 'min',
    'specs/attrs/14/167/7' => 'standard',
    'specs/attrs/14/167/168' => 'max',
    'specs/attrs/70' => 'weight',
    'specs/attrs/70/71' => 'dry',
    'specs/attrs/70/72' => 'curb',
    'specs/attrs/70/73' => 'full',
    'specs/attrs/22' => 'engine',
    'specs/attrs/22/100' => 'name',
    'specs/attrs/22/98' => 'fuel',
    'specs/attrs/22/98/options/28' => 'petrol',
    'specs/attrs/22/98/options/29' => 'hydrogen',
    'specs/attrs/22/98/options/30' => 'bioethanol',
    'specs/attrs/22/98/options/31' => 'electricity',
    'specs/attrs/22/98/options/32' => 'gas',
    'specs/attrs/22/98/options/33' => 'diesel',
    'specs/attrs/22/98/options/84' => 'Flex-fuel',
    'specs/attrs/22/98/options/36' => 'A-66',
    'specs/attrs/22/98/options/37' => 'A-70',
    'specs/attrs/22/98/options/38' => 'A-72',
    'specs/attrs/22/98/options/39' => 'A-76',
    'specs/attrs/22/98/options/40' => 'A-78',
    'specs/attrs/22/98/options/41' => 'A-80',
    'specs/attrs/22/98/options/42' => 'AI-92',
    'specs/attrs/22/98/options/43' => 'AI-93',
    'specs/attrs/22/98/options/44' => 'AI-95',
    'specs/attrs/22/98/options/45' => 'AI-98',
    'specs/attrs/22/98/options/34' => 'CNG',
    'specs/attrs/22/98/options/35' => 'LPG',
    'specs/attrs/22/19' => 'location',
    'specs/attrs/22/19/20' => 'location',
    'specs/attrs/22/19/20/options/1' => 'at front',
    'specs/attrs/22/19/20/options/2' => 'at rear',
    'specs/attrs/22/19/20/options/3' => 'at center',
    'specs/attrs/22/19/21' => 'orientation',
    'specs/attrs/22/19/21/options/4' => 'longitudinally',
    'specs/attrs/22/19/21/options/5' => 'transversely',
    'specs/attrs/22/23' => 'supply system',
    'specs/attrs/22/23/options/6' => 'injector',
    'specs/attrs/22/23/options/24' => 'carburetor',
    'specs/attrs/22/23/options/25' => '2 carburetors',
    'specs/attrs/22/23/options/55' => '3 carburetors',
    'specs/attrs/22/23/options/26' => '4 carburetors',
    'specs/attrs/22/23/options/27' => '6 carburetors',
    'specs/attrs/22/24' => 'cylinders/valves',
    'specs/attrs/22/24/25' => 'number of cylinders',
    'specs/attrs/22/24/26' => 'cylinder arrangement',
    'specs/attrs/22/24/26/options/7' => 'l',
    'specs/attrs/22/24/26/options/8' => 'V',
    'specs/attrs/22/24/26/options/9' => 'W',
    'specs/attrs/22/24/26/options/10' => 'O',
    'specs/attrs/22/24/26/options/101' => 'U',
    'specs/attrs/22/24/27' => 'valves per cylinder',
    'specs/attrs/22/24/28' => 'cylinder diameter',
    'specs/attrs/22/24/29' => 'stroke',
    'specs/attrs/22/24/159' => 'camber',
    'specs/attrs/22/30' => 'compression ratio',
    'specs/attrs/22/31' => 'volume',
    'specs/attrs/22/32' => 'power',
    'specs/attrs/22/32/33' => 'power',
    'specs/attrs/22/32/33/description' => 'Metric (PS)
1 HP = 1.014 metric PS or CV',
    'specs/attrs/22/32/34' => 'in the range from',
    'specs/attrs/22/32/35' => 'in the range to',
    'specs/attrs/22/32/171' => 'max power (DIN)',
    'specs/attrs/22/32/171/description' => 'Power by DIN 70020. European standard',
    'specs/attrs/22/32/172' => 'max power (SAE certified)',
    'specs/attrs/22/32/172/description' => 'SAE Certified Power. US standard 2005-06',
    'specs/attrs/22/32/173' => 'max power (SAE net)',
    'specs/attrs/22/32/173/description' => 'US standard 1971-72.
Transmission is not considered. Attachments - considered',
    'specs/attrs/22/32/174' => 'max power (SAE gross)',
    'specs/attrs/22/32/174/description' => 'US standard 1972 year, roughly corresponding to the power measurement technology to 1972.
Transmission is not considered',
    'specs/attrs/22/32/177' => 'max power (JIS D 1001)',
    'specs/attrs/22/32/178' => 'max power (GOST)',
    'specs/attrs/22/32/178/description' => 'Standard USSR and Russia',
    'specs/attrs/22/36' => 'torque',
    'specs/attrs/22/36/37' => 'torque',
    'specs/attrs/22/36/38' => 'in the range from',
    'specs/attrs/22/36/39' => 'in the range to',
    'specs/attrs/22/99' => 'turbo',
    'specs/attrs/22/99/options/46' => 'none',
    'specs/attrs/22/99/options/47' => 'yes',
    'specs/attrs/22/99/options/48' => '×2',
    'specs/attrs/22/99/options/54' => '×3',
    'specs/attrs/22/99/options/49' => '×4',
    'specs/attrs/engine/turbo/options/x6' => '×6',
    'specs/attrs/22/156' => 'block material',
    'specs/attrs/22/156/options/68' => 'cast iron',
    'specs/attrs/22/156/options/69' => 'aluminium alloy',
    'specs/attrs/22/156/options/70' => 'steel',
    'specs/attrs/22/156/options/83' => 'magnesium alloy',
    'specs/attrs/22/179' => 'cooling',
    'specs/attrs/22/179/options/81' => 'air',
    'specs/attrs/22/179/options/82' => 'liquid',
    'specs/attrs/22/179/options/liquid-air' => 'liquid-air',
    'specs/attrs/22/206' => 'Gas distribution mechanism',
    'specs/attrs/22/206/options/88' => 'The camshaft in the engine block',
    'specs/attrs/22/206/options/89' => 'The camshaft in the cylinder head',
    'specs/attrs/22/206/options/90' => 'Десмодромный ГРМ',
    'specs/attrs/22/206/options/91' => 'Timing without camshaft',
    'specs/attrs/22/206/options/92' => 'avalvular',
    'specs/attrs/22/206/options/93' => 'bottom valve',
    'specs/attrs/22/206/options/94' => 'With a mixed arrangement of valves',
    'specs/attrs/22/206/options/95' => 'OHV',
    'specs/attrs/22/206/options/100' => 'OHV with variable valve timing',
    'specs/attrs/22/206/options/96' => 'SOHC',
    'specs/attrs/22/206/options/97' => 'SOHC with variable valve timing',
    'specs/attrs/22/206/options/98' => 'DOHC',
    'specs/attrs/22/206/options/99' => 'DOHC with variable valve timing',
    'specs/attrs/22/207' => 'type',
    'specs/attrs/22/207/options/102' => 'Steam',
    'specs/attrs/22/207/options/103' => 'Internal combustion',
    'specs/attrs/22/207/options/104' => 'Electric',
    'specs/attrs/22/207/options/105' => 'Piston',
    'specs/attrs/22/207/options/106' => 'Rotary-piston',
    'specs/attrs/22/207/options/107' => 'Turbine',
    'specs/attrs/40' => 'transmission',
    'specs/attrs/40/41' => 'drive unit',
    'specs/attrs/40/41/options/14' => 'front-wheel drive',
    'specs/attrs/40/41/options/15' => 'rear-wheel drive',
    'specs/attrs/40/41/options/16' => 'all-wheel drive',
    'specs/attrs/40/41/options/56' => 'front-wheel drive on one wheel',
    'specs/attrs/40/41/options/57' => 'rear-wheel drive on one wheel',
    'specs/attrs/40/41/options/17' => 'four-wheel drive with switchable rear',
    'specs/attrs/40/41/options/18' => 'four-wheel drive with switchable front',
    'specs/attrs/40/41/options/19' => 'ermanent all-wheel drive',
    'specs/attrs/40/42' => 'gearbox',
    'specs/attrs/40/42/43' => 'type',
    'specs/attrs/40/42/43/options/20' => 'Manual',
    'specs/attrs/40/42/43/options/21' => 'Automatic',
    'specs/attrs/40/42/43/options/22' => 'CVT',
    'specs/attrs/40/42/43/options/23' => 'Semi-automatic',
    'specs/attrs/40/42/43/options/50' => 'robotised',
    'specs/attrs/40/42/43/options/87' => 'sequential',
    'specs/attrs/40/42/43/options/51' => 'DSG',
    'specs/attrs/40/42/43/options/52' => 'DCT',
    'specs/attrs/40/42/139' => 'name',
    'specs/attrs/40/42/44' => 'number of gears',
    'specs/attrs/40/83' => 'clutch',
    'specs/attrs/15' => 'suspension and steering',
    'specs/attrs/15/208' => 'front suspension',
    'specs/attrs/15/208/209' => 'elastic element type',
    'specs/attrs/15/208/209/options/108' => 'coil spring',
    'specs/attrs/15/208/209/options/109' => 'leaf spring',
    'specs/attrs/15/208/209/options/110' => 'pneumatic',
    'specs/attrs/15/208/209/options/111' => 'hydropneumatic',
    'specs/attrs/15/208/209/options/112' => 'torsion',
    'specs/attrs/15/208/209/options/113' => 'rubber-elastic elements',
    'specs/attrs/15/208/209/options/178' => 'none',
    'specs/attrs/15/208/209/options/114' => 'coil spring with push rod',
    'specs/attrs/15/208/209/options/115' => 'coil spring with pull rod',
    'specs/attrs/15/208/209/options/116' => 'leaf spring on the transverse springs',
    'specs/attrs/15/208/209/options/117' => 'leaf spring on longitudinal leaf springs',
    'specs/attrs/15/208/209/options/124' => 'torsion bar with the push rod',
    'specs/attrs/15/208/209/options/125' => 'torsion bar with the pull rod',
    'specs/attrs/15/208/209/options/118' => 'on the longitudinal elliptic leaf springs',
    'specs/attrs/15/208/209/options/119' => 'on longitudinal ¾-elliptic leaf springs',
    'specs/attrs/15/208/209/options/120' => 'on the longitudinal ¼-elliptic leaf springs',
    'specs/attrs/15/208/209/options/121' => 'on longitudinal semi-elliptic leaf springs',
    'specs/attrs/15/208/209/options/122' => 'on longitudinal cantilever leaf springs',
    'specs/attrs/15/208/209/options/123' => 'on the longitudinal balancing leaf springs',
    'specs/attrs/15/208/210' => 'type guide vanes',
    'specs/attrs/15/208/210/options/126' => 'dependent',
    'specs/attrs/15/208/210/options/127' => 'independent',
    'specs/attrs/15/208/210/options/128' => 'semidependent',
    'specs/attrs/15/208/210/options/129' => 'dependent linkage-less',
    'specs/attrs/15/208/210/options/130' => 'dependent to the trailing arms',
    'specs/attrs/15/208/210/options/131' => 'dependent to the hard pipe or drawbar (Torque-tube or Torque-Rod)',
    'specs/attrs/15/208/210/options/132' => 'independent with swinging half-axles',
    'specs/attrs/15/208/210/options/133' => 'independent trailing arm',
    'specs/attrs/15/208/210/options/134' => 'independent suspension Dubonnet',
    'specs/attrs/15/208/210/options/135' => 'independent on oblique levers',
    'specs/attrs/15/208/210/options/136' => 'independent double wishbone',
    'specs/attrs/15/208/210/options/137' => 'independent multi-link',
    'specs/attrs/15/208/210/options/138' => 'independent candle',
    'specs/attrs/15/208/210/options/139' => 'semidependent De Dion',
    'specs/attrs/15/208/210/options/140' => 'semidependent torsion-lever',
    'specs/attrs/15/208/210/options/141' => 'dependent with trailing arms with Watt\'s mechanism',
    'specs/attrs/15/208/210/options/142' => 'dependent with trailing arms with Scott-Russell mechanism',
    'specs/attrs/15/208/210/options/143' => 'dependent with trailing arms with a Panhard rod',
    'specs/attrs/15/208/210/options/144' => 'dependent with hard pipe or drawbar (Torque-tube or Torque-Rod) with Watt\'s mechanism',
    'specs/attrs/15/208/210/options/145' => 'dependent with hard pipe or drawbar (Torque-tube or Torque-Rod) with Scott-Russell mechanism',
    'specs/attrs/15/208/210/options/146' => 'dependent with hard pipe or drawbar (Torque-tube or Torque-Rod) with a Panhard rod',
    'specs/attrs/15/208/210/options/147' => 'independent candle sweep (McPherson)',
    'specs/attrs/15/208/210/options/149' => 'semidependent torsion-lever with Watt\'s mechanism',
    'specs/attrs/15/208/210/options/150' => 'semidependent torsion-lever with Scott-Russell mechanism',
    'specs/attrs/15/208/210/options/151' => 'semidependent torsion-lever a Panhard rod',
    'specs/attrs/15/208/210/options/148' => 'independent candle sweep (McPherson) on longitudinal and transverse arms',
    'specs/attrs/15/208/211' => 'shock absorbers',
    'specs/attrs/15/208/211/213' => 'availability',
    'specs/attrs/15/208/211/214' => 'nature of the action',
    'specs/attrs/15/208/211/214/options/152' => 'unilateral',
    'specs/attrs/15/208/211/214/options/153' => 'double-sided',
    'specs/attrs/15/208/211/215' => 'operating principle',
    'specs/attrs/15/208/211/215/options/154' => 'friction (mechanical)',
    'specs/attrs/15/208/211/215/options/155' => 'hydraulic',
    'specs/attrs/15/208/211/215/options/159' => 'oleo pneumatic',
    'specs/attrs/15/208/211/215/options/156' => 'hydraulic arm',
    'specs/attrs/15/208/211/215/options/157' => 'hydraulic twin-tube',
    'specs/attrs/15/208/211/215/options/158' => 'hydraulic single tube',
    'specs/attrs/15/208/211/216' => 'adjustability',
    'specs/attrs/15/208/212' => 'anti-roll bar',
    'specs/attrs/15/8' => 'front suspension type (deprecated)',
    'specs/attrs/15/9' => 'rear suspension type (deprecated)',
    'specs/attrs/15/10' => 'steering type',
    'specs/attrs/15/217' => 'rear suspension',
    'specs/attrs/15/217/218' => 'elastic element type',
    'specs/attrs/15/217/218/options/160' => 'coil spring',
    'specs/attrs/15/217/218/options/163' => 'leaf spring',
    'specs/attrs/15/217/218/options/172' => 'pneumatic',
    'specs/attrs/15/217/218/options/173' => 'hydropneumatic',
    'specs/attrs/15/217/218/options/174' => 'torsion',
    'specs/attrs/15/217/218/options/177' => 'rubber-elastic elements',
    'specs/attrs/15/217/218/options/179' => 'none',
    'specs/attrs/15/217/218/options/161' => 'coil spring with push rod',
    'specs/attrs/15/217/218/options/162' => 'coil spring with pull rod',
    'specs/attrs/15/217/218/options/164' => 'leaf spring on the transverse springs',
    'specs/attrs/15/217/218/options/165' => 'leaf spring on longitudinal leaf springs',
    'specs/attrs/15/217/218/options/166' => 'on the longitudinal elliptic leaf springs',
    'specs/attrs/15/217/218/options/167' => 'on longitudinal ¾-elliptic leaf springs',
    'specs/attrs/15/217/218/options/168' => 'on the longitudinal ¼-elliptic leaf springs',
    'specs/attrs/15/217/218/options/169' => 'on longitudinal semi-elliptic leaf springs',
    'specs/attrs/15/217/218/options/170' => 'on longitudinal cantilever leaf springs',
    'specs/attrs/15/217/218/options/171' => 'on the longitudinal balancing leaf springs',
    'specs/attrs/15/217/218/options/175' => 'torsion bar with the push rod',
    'specs/attrs/15/217/218/options/176' => 'torsion bar with the pull rod',
    'specs/attrs/15/217/219' => 'type guide vanes',
    'specs/attrs/15/217/219/options/180' => 'dependent',
    'specs/attrs/15/217/219/options/190' => 'independent',
    'specs/attrs/15/217/219/options/200' => 'semidependent',
    'specs/attrs/15/217/219/options/181' => 'dependent linkage-less',
    'specs/attrs/15/217/219/options/182' => 'dependent to the trailing arms',
    'specs/attrs/15/217/219/options/186' => 'dependent to the hard pipe or drawbar (Torque-tube or Torque-Rod)',
    'specs/attrs/15/217/219/options/183' => 'dependent with trailing arms with Watt\'s mechanism',
    'specs/attrs/15/217/219/options/184' => 'dependent with trailing arms with Scott-Russell mechanism',
    'specs/attrs/15/217/219/options/185' => 'dependent with trailing arms with a Panhard rod',
    'specs/attrs/15/217/219/options/187' => 'dependent with hard pipe or drawbar (Torque-tube or Torque-Rod) with Watt\'s mechanism',
    'specs/attrs/15/217/219/options/188' => 'dependent with hard pipe or drawbar (Torque-tube or Torque-Rod) with Scott-Russell mechanism',
    'specs/attrs/15/217/219/options/189' => 'dependent with hard pipe or drawbar (Torque-tube or Torque-Rod) with a Panhard rod',
    'specs/attrs/15/217/219/options/191' => 'independent with swinging half-axles',
    'specs/attrs/15/217/219/options/192' => 'independent trailing arm',
    'specs/attrs/15/217/219/options/193' => 'independent suspension Dubonnet',
    'specs/attrs/15/217/219/options/194' => 'independent on oblique levers',
    'specs/attrs/15/217/219/options/195' => 'independent double wishbone',
    'specs/attrs/15/217/219/options/196' => 'independent multi-link',
    'specs/attrs/15/217/219/options/197' => 'independent candle',
    'specs/attrs/15/217/219/options/198' => 'independent candle sweep (McPherson)',
    'specs/attrs/15/217/219/options/199' => 'independent candle sweep (McPherson) on longitudinal and transverse arms',
    'specs/attrs/15/217/219/options/201' => 'semidependent De Dion',
    'specs/attrs/15/217/219/options/202' => 'semidependent torsion-lever',
    'specs/attrs/15/217/219/options/203' => 'semidependent torsion-lever with Watt\'s mechanism',
    'specs/attrs/15/217/219/options/204' => 'semidependent torsion-lever with Scott-Russell mechanism',
    'specs/attrs/15/217/219/options/205' => 'semidependent torsion-lever a Panhard rod',
    'specs/attrs/15/217/220' => 'shock absorbers',
    'specs/attrs/15/217/220/222' => 'availability',
    'specs/attrs/15/217/220/223' => 'nature of the action',
    'specs/attrs/15/217/220/223/options/206' => 'unilateral',
    'specs/attrs/15/217/220/223/options/207' => 'double-sided',
    'specs/attrs/15/217/220/224' => 'operating principle',
    'specs/attrs/15/217/220/224/options/208' => 'friction (mechanical)',
    'specs/attrs/15/217/220/224/options/209' => 'hydraulic',
    'specs/attrs/15/217/220/224/options/213' => 'oleo pneumatic',
    'specs/attrs/15/217/220/224/options/210' => 'hydraulic arm',
    'specs/attrs/15/217/220/224/options/211' => 'hydraulic twin-tube',
    'specs/attrs/15/217/220/224/options/212' => 'hydraulic single tube',
    'specs/attrs/15/217/220/225' => 'adjustability',
    'specs/attrs/15/217/221' => 'anti-roll bar',
    'specs/attrs/74' => 'brake system',
    'specs/attrs/74/77' => 'ABS',
    'specs/attrs/74/142' => 'front brakes',
    'specs/attrs/74/142/75' => 'description',
    'specs/attrs/74/142/144' => 'type',
    'specs/attrs/74/142/144/options/58' => 'drum',
    'specs/attrs/74/142/144/options/59' => 'disc',
    'specs/attrs/74/142/146' => 'diameter',
    'specs/attrs/74/142/148' => 'thickness',
    'specs/attrs/74/142/150' => 'material',
    'specs/attrs/74/142/150/options/62' => 'metal',
    'specs/attrs/74/142/150/options/63' => 'carbon',
    'specs/attrs/74/142/150/options/64' => 'ceramics',
    'specs/attrs/74/142/152' => 'ventilated',
    'specs/attrs/74/142/153' => 'perforated',
    'specs/attrs/74/143' => 'rear brakes',
    'specs/attrs/74/143/76' => 'description',
    'specs/attrs/74/143/145' => 'type',
    'specs/attrs/74/143/145/options/60' => 'drum',
    'specs/attrs/74/143/145/options/61' => 'disc',
    'specs/attrs/74/143/147' => 'diameter',
    'specs/attrs/74/143/149' => 'thickness',
    'specs/attrs/74/143/151' => 'material',
    'specs/attrs/74/143/151/options/65' => 'metal',
    'specs/attrs/74/143/151/options/66' => 'carbon',
    'specs/attrs/74/143/151/options/67' => 'ceramics',
    'specs/attrs/74/143/154' => 'ventilated',
    'specs/attrs/74/143/155' => 'perforated',
    'specs/attrs/181' => 'electric',
    'specs/attrs/181/182' => 'onboard voltage',
    'specs/attrs/46' => 'dynamic properties',
    'specs/attrs/46/47' => 'max speed',
    'specs/attrs/46/180' => 'acceleration to 60 km/h',
    'specs/attrs/46/48' => 'acceleration to 100 km/h',
    'specs/attrs/46/175' => 'acceleration to 60 mph',
    'specs/attrs/46/49' => 'acceleration to 200 km/h',
    'specs/attrs/46/50' => 'acceleration to 300 km/h',
    'specs/attrs/46/51' => '400m run time',
    'specs/attrs/46/52' => '1000m run time',
    'specs/attrs/46/53' => 'speed limiter',
    'specs/attrs/46/160' => 'braking time at 100 km/h',
    'specs/attrs/46/161' => 'stopping distance from 100 km/h',
    'specs/attrs/54' => 'other specs',
    'specs/attrs/54/55' => 'approach angle',
    'specs/attrs/54/56' => 'departure angle',
    'specs/attrs/54/57' => 'fuel tank capacity',
    'specs/attrs/54/57/58' => 'main',
    'specs/attrs/54/57/59' => 'additional',
    'specs/attrs/54/60' => 'boot volume',
    'specs/attrs/54/60/61' => 'min',
    'specs/attrs/54/60/62' => 'max',
    'specs/attrs/54/78' => 'fuel consumption',
    'specs/attrs/54/78/183' => 'Unknown method',
    'specs/attrs/54/78/183/79' => 'city',
    'specs/attrs/54/78/183/80' => 'highway',
    'specs/attrs/54/78/183/81' => 'mixed',
    'specs/attrs/54/78/184' => 'ECE',
    'specs/attrs/54/78/184/185' => '90 km/h',
    'specs/attrs/54/78/184/186' => '120 km/h',
    'specs/attrs/54/78/184/187' => 'city',
    'specs/attrs/54/78/184/188' => 'combined',
    'specs/attrs/54/78/189' => 'EPA (to 2008)',
    'specs/attrs/54/78/189/190' => 'city',
    'specs/attrs/54/78/189/191' => 'highway',
    'specs/attrs/54/78/192' => 'EPA (from 2008)',
    'specs/attrs/54/78/192/193' => 'city',
    'specs/attrs/54/78/192/194' => 'highway',
    'specs/attrs/54/78/199' => 'EU 93/116/EC',
    'specs/attrs/54/78/199/200' => 'urban',
    'specs/attrs/54/78/199/201' => 'extra urban',
    'specs/attrs/54/78/199/202' => 'combined',
    'specs/attrs/54/78/199/202/description' => '36.8% urban + 63.2% extra urban',
    'specs/attrs/54/138' => '"start-stop" system',
    'specs/attrs/54/158' => 'capacity',
    'specs/attrs/54/205' => 'towing weight',
    'specs/attrs/54/226' => 'body volume',
    'specs/attrs/54/195' => 'spread',
    'specs/attrs/54/195/11' => 'diameter',
    'specs/attrs/54/195/11/description' => 'axis. 2×radius',
    'specs/attrs/54/195/196' => 'wall-to-wall',
    'specs/attrs/54/195/196/description' => '',
    'specs/attrs/54/195/197' => 'curb-to-curb',
    'specs/attrs/54/195/197/description' => '',
    'specs/attrs/54/198' => 'turns of steering wheel',
    'specs/attrs/84' => 'wheels and tyres',
    'specs/attrs/84/85' => 'front',
    'specs/attrs/84/85/87' => 'tyre width',
    'specs/attrs/84/85/90' => 'tyre height',
    'specs/attrs/84/85/88' => 'diameter',
    'specs/attrs/84/85/89' => 'rim width',
    'specs/attrs/84/85/162' => 'rim offset (ET)',
    'specs/attrs/84/86' => 'rear',
    'specs/attrs/84/86/91' => 'tyre width',
    'specs/attrs/84/86/94' => 'tyre height',
    'specs/attrs/84/86/92' => 'diameter',
    'specs/attrs/84/86/93' => 'rim width',
    'specs/attrs/84/86/163' => 'rim offset (ET)',
    'specs/attrs/84/164' => 'rims model',
    'specs/attrs/84/165' => 'rims material',
    'specs/attrs/84/165/options/78' => 'steel',
    'specs/attrs/84/165/options/79' => 'aluminum alloy (molding)',
    'specs/attrs/84/165/options/80' => 'aluminum alloy (forging)',
    'specs/attrs/82' => 'emissions',
    'specs/attrs/157' => 'emission standard',
    'specs/attrs/157/options/71' => 'Euro 1',
    'specs/attrs/157/options/72' => 'Euro 2',
    'specs/attrs/157/options/73' => 'Euro 3',
    'specs/attrs/157/options/74' => 'Euro 4',
    'specs/attrs/157/options/75' => 'Euro 5',
    'specs/attrs/157/options/76' => 'Euro 5+',
    'specs/attrs/157/options/77' => 'Euro 6',
    'specs/attrs/170' => 'production place',

    'specs/unit/1/abbr' => 'mm',
    'specs/unit/1/name' => 'millimeter',
    'specs/unit/2/abbr' => 'kg',
    'specs/unit/2/name' => 'kilogram',
    'specs/unit/3/abbr' => 'm',
    'specs/unit/3/name' => 'meter',
    'specs/unit/4/abbr' => 'cc',
    'specs/unit/4/name' => 'cubic centimeter',
    'specs/unit/5/abbr' => 'hp',
    'specs/unit/5/name' => 'horsepower',
    'specs/unit/6/abbr' => 'rpm',
    'specs/unit/6/name' => 'rotates per minute',
    'specs/unit/7/abbr' => 'Nm',
    'specs/unit/7/name' => 'Newton-meter',
    'specs/unit/8/abbr' => 'km/h',
    'specs/unit/8/name' => 'kilometers per hour',
    'specs/unit/9/abbr' => 's',
    'specs/unit/9/name' => 'seconds',
    'specs/unit/10/abbr' => '%',
    'specs/unit/10/name' => 'percent',
    'specs/unit/11/abbr' => '°',
    'specs/unit/11/name' => 'degree',
    'specs/unit/12/abbr' => 'l',
    'specs/unit/12/name' => 'liter',
    'specs/unit/13/abbr' => 'l/100km',
    'specs/unit/13/name' => 'liters per 100 kilometers',
    'specs/unit/14/abbr' => 'CO2 g/km',
    'specs/unit/14/name' => 'grams of CO2 per kilometer',
    'specs/unit/15/abbr' => '″',
    'specs/unit/15/name' => 'inch',
    'specs/unit/16/abbr' => 'y.',
    'specs/unit/16/name' => 'year',
    'specs/unit/17/abbr' => 'PS',
    'specs/unit/17/name' => 'Pferdestärke',
    'specs/unit/18/abbr' => 'kW',
    'specs/unit/18/name' => 'kilowatt',
    'specs/unit/19/abbr' => 'V',
    'specs/unit/19/name' => 'volt',
    'specs/unit/20/abbr' => 'm³',
    'specs/unit/20/name' => 'cubic meter',

    'telegram/info' => '[Telegram](https://telegram.org/) - is primarily a system of instant messaging, like whatsapp or viber.

In addition to the messaging and file transfer, there are many other possibilities, which will go to the description of a lot of time.

We only use two of them: a public groups and bots.

# Public group

There is an public english-language and russian-language groups for all site visitors.

Join them is very simple - just click the link and follow the instructions:

* [English-language](https://t.me/joinchat/AAAAAAvxJESUMQcUM-I5YA)
* [Russian-language](https://t.me/joinchat/AAAAAA0NvB5g7SEsWv61Rw)

# Bot

To make you WheelsAge surfing more convenient we just created a "bot" for [telegram](https://telegram.org/) app. We hope it could be useful and easy to use.

The bot name: [@autowp_bot](tg:msg).

In short, bot is a kind of telegram user, which can send you notifications from site as a messages.

Learn more about telegram bots: <https://core.telegram.org/bots/faq>

Currently supported features:
* Notifications about newly personal messages. [Details ...](#messages)
* Notifications about newly accepted pictures. [Details ...](#new)
* Notifications about newly uploaded (but still waiting for accept) pictures (this feature works only authorized users). [Details ...](#inbox)

## Bot commands

### Start: `/start`

By sending this command you will receive list of currently supported commands.

### <a name="messages"></a> Personal messages: `/messages`

Send `/messages on` for subscribe to notifications about new personal messages.

Send `/messages off` to unsubscribe.

### <a name="new"></a> New pictures: `/new`

Send `/new BMW` for subscribe to new photos of BMW.

Send `/new BMW` again to unsubscribe.


### <a name="inbox"></a> Inbox: `/inbox`

Authorization by `/me` is requried.

Send `/inbox BMW` for subscribe to notifications about new uploads to BMW.

Send `/inbox BMW` again to unsubscribe.

### Me (authorization): `/me`

This command allows you to associate themselves (telegram user) with an account on our site.

Send `/me` to receive instructions for autorization.

Send `/me 123456789` to recevice confirmation code.

Where 123456789 - is your account number, which you can find on your profile page. For example, [Juliano Scotini](/users/juliano-scotini) has number 17322

Confirmation code will be sent to you via [the private messaging system](/ng/account/messages?folder=system)

Send `/me 123456789 ХХХХХХХХХХХХХХХХ` to finish process of association your telegram account with out website user.

Where `ХХХХХХХХХХХХХХХХ` - code that will be sent to you via [the private messaging system](/ng/account/messages?folder=system)',

    'personal-message-dialog/title' => 'Send personal message',
    'personal-message-dialog/send' => 'send',
    'personal-message-dialog/sending' => 'sending ...',
    'personal-message-dialog/sent' => 'sent',
    'personal-message-dialog/cancel' => 'cancel',
    'personal-message-dialog/placeholder' => 'Message',

    'crop-dialog/title' => 'Cropper',
    'crop-dialog/close' => 'Close',
    'crop-dialog/select-all' => 'Select all',
    'crop-dialog/save' => 'Save changes',
    'crop-dialog/resolution-%s-aspect-%s' => '%s (aspect is about %s)',
    'crop-dialog/resolution-x-aspect-y' => '{resolution} (aspect is about {aspect})',

    'who-online/title' => 'Online',
    'who-online/refresh' => 'Refresh',
    'who-online/close' => 'Close',

    'picture-moder-vote/custom/title' => 'Custom reason',
    'picture-moder-vote/custom/sending' => 'Sending',
    'picture-moder-vote/custom/send' => 'Send',
    'picture-moder-vote/custom/cancel' => 'Cancel',
    'picture-moder-vote/custom/save' => 'Save as template',

    'moder/statistics/photos-with-copyrights' => 'Photos with copyrights',
    'moder/statistics/vehicles-with-4-or-more-photos' => 'Vehicles with 4 or more photos',
    'moder/statistics/specifications-values' => 'Specifications values',
    'moder/statistics/brand-logos' => 'Brand logotypes',
    'moder/statistics/from-years' => 'Years of begin production',
    'moder/statistics/from-and-to-years' => 'Years of begin and end production',
    'moder/statistics/from-and-to-years-and-months' => 'Years and months of begin and end production'
]);
