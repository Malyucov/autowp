<?php

return array_replace(include 'root.php', [
    '' => [
        'plural_forms' => 'nplurals=1; plural=0'
    ],

    'test' => '测试是确定',

    /* Common words */
    'and' => '还有',
    '%1$s pictures'       => [
        '%1$s 张图片',
    ],
    'ng/%1$s-pictures' => '{count, plural,
        other {{count} 张图片}
    }',
    '%1$s items'      => [
        '%1$s items'
    ],
    '%1$s vehicles'      => [
        '%1$s 款车型',
    ],
    '%1$s comments'      => [
        '%1$s 个评论',
    ],
    'ng/%1$s-comments' => '{count, plural,
        other {{count} 个评论}
    }',
    '%1$s messages'      => [
        '%1$s 个站内信',
    ],
    '%1$s topics'      => [
        '%1$s 个主题',
    ],

    'year' => '年',
    'month' => '月',

    'contributor' => '贡献者',
    'contributors' => '贡献者',

    'deleted-user' => '用户已注销',

    'submit' => '上传',

    /* Layout */
    'layout/meta/description' => '汽车图片的百科全书，WheelsAge.org',
    'layout/meta/keywords' => '汽车',
    'layout/brand' => 'WheelsAge.org',
    'layout/personal-messages' => '站内信',
    'layout/you-have-%1$s-new-messages' => [
        '你有-%1$s-条未读站内信'
    ],
    'ng-layout/you-have-new-messages' => '{messages, plural,
        other {你有-{messages}-条未读站内信}
    }',

    'layout/search' => '搜索',
    'layout/footer' => '请知悉，autowp服务器中全部素材都是由浏览者添加的。

站长没有这些素材的相关法律信息。

所有图片仅用于传播知识。

[举报侵权行为](mailto:autowp@yandex.ru)',

    'layout/language-contributing' => '想要加入更多语言?',

    /* Picture preview */
    'picture-preview/no-comments' => '暂无评论',
    'picture-preview/no-ratio'    => '暂无比例',
    'picture-preview/crop-desc'   => '剪裁后图片',
    'picture-preview/special-name' => '特别命名的图片',
    'Resolution'                  => '分辨率',
    'Filesize'                    => '文件大小',
    'Ratio'                       => '长宽比',
    'Views'                       => '浏览',
    'Comments count'              => '评论',

    /* SPECIFICATIONS*/
    'rpm' => 'rpm',
    'Nm'  => 'Nm',
    'kW'  => 'kW',
    'hp'  => 'hp',
    'spec/%1$s-gear' => [
        '%1$s档',
    ],

    /* PAGINATOR */
    'next'                     => '下一页',
    'previous'                 => '上一页',

    /* INDEX */
    'index/brands'             => '品牌',
    'index/factories'          => '工厂',
    'index/specifications'     => '性能参数',
    'index/twins/description' => '你或许早就知道大宇曼蒂兹有了6个[克隆车](/twins/group118812)? 可是你知道 [莲花和起亚的姊妹车型](/twins/group118750)吗? 我们相信这是一个很有趣的版块。',
    'index/categories/description' => '你知道在不同时期是哪种技术帮助了全世界的城市街道遵守法律和秩序的吗？教皇乘坐哪些车？不知道？那么你应该阅读这一版块。',
    'index/categories/mosts' => '想知道哪款车是最快的？想知道最强大的矿用卡车有多重？快来了解一下。',

    'mosts/fastest/roadster'          => '最快的敞篷跑车',
    'mosts/mighty/sedan/today'        => '当今动力最强的四门轿车',
    'mosts/dynamic/universal/2000-09' => '21世纪初最快的旅行轿车',
    'mosts/heavy/truck'               => '最重型的货车',

    'back'                     => '倒退',
    'forward'                  => '前进',

    'Picture of the day'       => '今日最佳',
    'car-of-day'               => '今日之车',
    'theme-of-day'             => 'theme of the day',
    'day ahead'                => '后一天',
    'day ago'                  => '前一天',
    'Cars by destination'      => '按用途分类',
    'All new pictures'         => '全部新图片',

    'all-link'                 => '查看全部',

    'brands/new-cars-of-brand' => '新品牌%s',

    'brands/more-companies'    => [
        '全部%s个品牌'
    ],
    'brands/pictures:' => '图片: ',

    'item/type/1/name' => '车辆',
    'item/type/1/name-plural' => '车辆',
    'item/type/1/new-item' => '新增车辆',
    'item/type/1/add-sub-item' => 'Add sub-vehicle',
    'item/type/2/name' => '发动机',
    'item/type/2/name-plural' => '发动机',
    'item/type/2/new-item' => '新增发动机',
    'item/type/2/add-sub-item' => 'Add sub-engine',
    'item/type/3/name' => '分类',
    'item/type/3/name-plural' => '分类',
    'item/type/3/new-item' => '新增分类',
    'item/type/3/add-sub-item' => 'Add sub-category',
    'item/type/4/name' => '姊妹车型',
    'item/type/4/name-plural' => '姊妹车型',
    'item/type/4/new-item' => '新增姊妹车型',
    'item/type/4/add-sub-item' => 'Add sub-twins',
    'item/type/5/name' => '品牌',
    'item/type/5/name-plural' => '品牌',
    'item/type/5/new-item' => '新增品牌',
    'item/type/5/add-sub-item' => 'Add sub-brand',
    'item/type/6/name' => '工厂',
    'item/type/6/name-plural' => '工厂',
    'item/type/6/new-item' => '新增工厂',
    'item/type/6/add-sub-item' => 'Add sub-factory',
    'item/type/7/name' => '博物馆',
    'item/type/7/name-plural' => '博物馆',
    'item/type/7/new-item' => '新增博物馆',
    'item/type/7/add-sub-item' => 'Add sub-museum',

    'item/type/8/name' => 'Person',
    'item/type/8/name-plural' => 'Persons',
    'item/type/8/new-item' => 'New person',
    'item/type/8/add-sub-item"' => 'Add sub-person',

    /* BRAND PAGE*/
    'unsorted'                => '未分类',
    'engines'                 => '发动机',
    'concepts and prototypes' => '概念车及原型车',
    'logotypes'               => '商标',
    'mixed'                   => '其它',

    'count 0'                 => '暂无',

    /* CAR LIST */
    'carlist/no-photo'        => '无图片',
    'carlist/no-photo/add'    => '添加图片',
    'carlist/all pictures'    => '全部图片',
    'carlist/details'         => '详细分类',
    'carlist/twins'           => '姊妹车型',
    'carlist/produced/one'    => '总产量1辆',
    'carlist/produced/%1$s'   => [
        '总产量%1$s辆'
    ],
    'carlist/produced-about/%1$s' => [
        '总产量约%1$s辆'
    ],
    'carlist/specifications'  => '性能参数',
    'carlist/designed by %s'  => '设计师%s',
    'carlist/edit-specs' => '编辑性能参数',
    'carlist/years' => '生产年份',
    'carlist/model-years' => '年款',

    'picturelist/engine' => '发动机',
    'picturelist/engine-%s' => '%s 发动机',
    'picturelist/factory' => '工厂',

    'present-time-abbr'       => '至今',

    /* Categories */
    'category/%s cars'        => [
        '共 %s 辆车'
    ],
    'category/%s new cars'    => [
        '共 %s 辆新车'
    ],

    /* most */
    'most/fastest' => '极速最高',
    'most/fastest/param' => '最高时速',
    'most/slowest' => '极速最低',
    'most/slowest/param' => '最高时速',
    'most/dynamic' => '加速最快',
    'most/dynamic/param' => '加速时间',
    'most/static' => '加速最慢',
    'most/static/param' => '加速时间',
    'most/mighty' => '动力最强',
    'most/mighty/param' => '发动机功率',
    'most/weak' => '动力最弱',
    'most/weak/param' => '发动机功率',
    'most/big-engine' => '排量最大',
    'most/big-engine/param' => '发动机排量',
    'most/small-engine' => '排量最小',
    'most/small-engine/param' => '发动机排量',
    'most/nimblest' => '操控最灵活',
    'most/nimblest/param' => '转弯半径',
    'most/economical' => '最省油',
    'most/economical/param' => '综合油耗',
    'most/gluttonous' => '最费油',
    'most/gluttonous/param' => '综合油耗',
    'most/clenaly' => '最环保',
    'most/clenaly/param' => '排放',
    'most/dirty' => '最污染',
    'most/dirty/param' => '排放',
    'most/heavy' => '质量最重',
    'most/heavy/param' => '整备质量',
    'most/lightest' => '质量最轻',
    'most/lightest/param' => '整备质量',
    'most/longest' => '长度最长',
    'most/longest/param' => '长度',
    'most/shortest' => '长度最短',
    'most/shortest/param' => '长度',
    'most/widest' => '宽度最宽',
    'most/widest/param' => '宽度',
    'most/narrow' => '宽度最窄',
    'most/narrow/param' => '宽度',
    'most/highest' => '高度最高',
    'most/highest/param' => '高度',
    'most/lowest' => '高度最低',
    'most/lowest/param' => '高度',
    'most/air' => '空气动力最佳',
    'most/air/param' => '风阻系数',
    'most/antiair' => '空气动力最差',
    'most/antiair/param' => '风阻系数',
    'most/bigwheel' => '车轮最大',
    'most/bigwheel/param' => '车轮尺寸',
    'most/smallwheel' => '车轮最小',
    'most/smallwheel/param' => '车轮尺寸',
    'most/bigbrakes' => '刹车盘最大',
    'most/bigbrakes/param' => '刹车盘尺寸',
    'most/smallbrakes' => '刹车盘最小',
    'most/smallbrakes/param' => '刹车盘尺寸',
    'most/bigclearance' => '通过性最强',
    'most/bigclearance/param' => '通过性',
    'most/smallclearance' => '通过性最弱',
    'most/smallclearance/param' => '通过性',

    'mosts/sidebar/mostly…' => '各项之最',
    'mosts/sidebar/between…' => '类别',

    'mosts/period/before1920' => '1920年之前',
    'mosts/period/1920-29'    => '1920-29年',
    'mosts/period/1930-39'    => '1930-39年',
    'mosts/period/1940-49'    => '1940-49年',
    'mosts/period/1950-59'    => '1950-59年',
    'mosts/period/1960-69'    => '1960-69年',
    'mosts/period/1970-79'    => '1970-79年',
    'mosts/period/1980-89'    => '1980-89年',
    'mosts/period/1990-99'    => '1990-99年',
    'mosts/period/2000-09'    => '2000-09年',
    'mosts/period/2010-16'    => '2010-16年',
    'mosts/period/present'    => '现款车型',
    'mosts/period/all-time'   => '所有年份',

    /* upload */
    'upload/image-file' => '图片文件',
    'upload/note' => '备注',
    'upload/picture/crop' => '剪切',
    'upload/picture/cropped-to' => '剪切到 %s',
    'upload/select/unsorted' => '未分类',
    'upload/select/unsorted-long' => '未分类(无车辆或发动机)',
    'upload/select/mixed' => '其它',
    'upload/select/mixed-long' => '其它(几辆车在同一张图中)',
    'upload/select/logo' => '商标',
    'upload/select/engines' => '发动机',
    'upload/select/concepts' => '概念车及原型车',
    'upload/select/other-modification' => '其它改型',

    'upload/add-picture' => '添加图片',
    'upload/select-another' => '选择另一个目录',
    'upload/description' => '如果您有没有在这个网站找到对应主题的图片，可以通过下面的目录添加它们。

遵循下列指示可以让添加照片更轻松，希望您仔细阅读。

添加照片相关要求：

* [JPEG](http://ru.wikipedia.org/wiki/JPEG)或[PNG](http://ru.wikipedia.org/wiki/PNG)格式。分辨率范围: 从640×360至4096×4096。
* 图像质量应尽可能高，且没有被调整过尺寸或压缩（模糊、模糊化、颜色失真、罗纹线等）。珍贵的扫描图片(生产商拍摄)例外。图片在网站的存留由一部分管理员决定。
* 图像不能有非该图像的作者/所有者添加的水印。
* 图像车辆必须保持原厂状态，不能存在<em>个人改装</em>，因年代久远产生的老化则可以接受。
* 图像主要和唯一的主题必须是汽车，汽车公司的商标或发动机，不允许有人物存在。
* 图像必须是专业图片，您自己或朋友的爱车照片、街拍以及车展上拍摄的照片不能保证100％被接受。
* 对于一款车型的首张照片，要求可能会提高。

**我们恳请您**, 在添加图片之前请确保它不存在于现有目录中。

请注意，添加等待审核的图片即所有图片被加入到目录之前，图片将先由网站检测。',
    'upload/only-registered' => '只有注册用户才能上传图片

[注册](/login)或[登录](/ng/signup)',

    /* catalogue */
    'catalogue/other-pictures-of-%1$s' => '%1$s的其它图片',
    'catalogue/all-pictures-of-%1$s' => '%1$s的所有图片',
    'catalogue/brand/logo-of-%s' => '%s 商标',
    'catalogue/brand/links' => '链接',
    'catalogue/brand/popular-images' => '热门图片',
    'catalogue/brand/new-pictures' => '按上传时间',
    'catalogue/brand/inbox/by-brand' => '按品牌',
    'catalogue/brand/factories' => '工厂',
    'catalogue/link-category/official' => '官方网站',
    'catalogue/link-category/helper'   => '协助发展',
    'catalogue/link-category/club'     => '俱乐部',
    'catalogue/link-category/default'  => '其它',
    'catalogue/chronological' => '按车型年代',
    'catalogue/related' => '相关目录',
    'catalogue/related-with-%1$s' => '共有 %1$s 个相关目录',
    'catalogue/sport' => '赛事',
    'catalogue/design' => '设计',
    'catalogue/stock-model' => '原始车型',
    'catalogue/sub-model' => '子车型',
    'catalogue/sport-of-%1$s' => '共%1$s个赛事',
    'catalogue/specifications-of-%1$s' => '%1$s的性能参数',
    'catalogue/specifications' => '性能参数',
    'catalogue/other-photos' => '其它图片',
    'catalogue/section/moto' => '摩托车',
    'catalogue/section/tractors' => '拖拉机',
    'catalogue/section/buses' => '巴士',
    'catalogue/section/trucks' => '客车',
    'catalogue/section/engines' => '发动机',

    'catalogue/engine-menu/vehicles' => '车型',
    'catalogue/engine-menu/pictures' => '图片',
    'catalogue/specifications/contributors:' => '贡献者:',
    'catalogue/specifications/disclaimer' => '信息由网站成员收集，如果您发现了bug或者要填补空白，可以注册后来完善。',
    'catalogue/vehicle/inbox' => '收件箱',
    'catalogue/vehicle/comments' => '评论',
    'catalogue/engine/add-engine' => '添加发动机',
    'catalogue/engine/mounted-on:' => '配备于:',

    'factories/factory-items' => '制品',
    'factories/factory/pictures' => '图片',

    /* comments */
    'comments/title' => '评论',
    'comments/reply' => '回复',
    'comments/what-to-do-for-write-comments' => '为方便发表评论，您需要<a href="/login">注册账号或用社交网站账号登陆</a>',
    'comments/it-requires-attention-of-moderators' => '向管理员发送提示',
    'comments/form-title' => '添加评论',
    'comments/message' => '站内信',
    'comments/send' => '发表',
    'comments/cancel' => '取消',
    'comments/need-wait-text' => '很抱歉稍后您才可以发表新评论。

这是由于为了防止灌水和其他不端行为，每小时发送的消息数受到限制。

现在您可以在"%s"中发表评论，建议使用清晰易懂的措辞表达您的看法：',

    'comments/author/anonymous' => '匿名',
    'comments/message-deleted-by-admin' => '消息已通过网站管理删除',
    'comments/message/delete' => '删除',
    'comments/message/restore' => '恢复',
    'comments/message/move' => '移动',
    'comments/vote/no-more-votes' => '今日表决次数已用尽',
    'comments/subscribe' => '订阅新回复通知',
    'comments/unsubscribe' => '取消订阅',

    /*perspectives*/
    'perspective/front'          => '前方',
    'perspective/back'           => '后方',
    'perspective/left'           => '左侧',
    'perspective/right'          => '右侧',
    'perspective/interior'       => '内饰',
    'perspective/front-panel'    => '中控台',
    'perspective/3/4-left'       => '¾ 左侧',
    'perspective/3/4-right'      => '¾ 右侧',
    'perspective/cutaway'        => '剖面',
    'perspective/front-strict'   => '正前',
    'perspective/left-strict'    => '正左',
    'perspective/right-strict'   => '正右',
    'perspective/back-strict'    => '正后',
    'perspective/n/a'            => '未知',
    'perspective/label'          => '铭牌',
    'perspective/upper'          => '顶部',
    'perspective/under-the-hood' => '发动机舱',
    'perspective/upper-strict'   => '正顶部',
    'perspective/bottom'         => '底部',
    'perspective/dashboard'      => '仪表台',
    'perspective/boot'           => '后备箱',
    'perspective/logo'           => '商标',
    'perspective/mascot'         => '立标',
    'perspective/sketch'         => '草图',
    'perspective/mixed'          => 'mixed',
    'perspective/exterior-details' => '外观细节',

    'login/sign-in' => '登录',
    'login/sign-out' => '注销',
    'login/login-or-email' => '用户名或邮箱',
    'login/captcha' => '请输入验证码',
    'login/registration' => '注册',
    'login/forgot-password?' => '忘记密码?',
    'login/success-text' => '欢迎来到我们的网站',
    'login/remember' => '保持登录状态',
    'login/if-you-lose-password' => '如果您忘记了密码,您可以填写表格 <a href="/restorepassword">重设电子邮件</a>',
    'login/if-you-not-registered' => '如果您尚未注册<a href="/ng/signup">现在就可注册</a>!',
    'login/sign-in-using-account' => '使用已有账号登录',
    'login/login-or-password-is-incorrect' => '您已登录或密码错误',
    'login/user-%value%-not-found' => '用户名或注册邮箱 "%value%" 不存在',

    'registration/if-you-registered' => '如果您已注册，请不要重复操作，只需在右侧输入用户名和密码即可登录',

    'account/personal-message/reply' => '站内信',
    'account/personal-message/delete' => '删除',
    'account/personal-message/entire-dialog' => '全部会话',
    'account/personal-message/system-notification' => '系统提示',
    'account/personal-message/delete-all-sent' => '清空发件箱',
    'account/personal-message/delete-all-system' => '清空系统提示',
    'account/personal-message/new' => '未读信息',
    'account/personal-message/sent' => '已发送信息',
    'account/profile/personal' => '个人信息',
    'account/profile/photo' => '头像',
    'account/profile/photo/saved' => '已保存图片',
    'account/profile/photo/deleted' => '已删除图片',
    'account/profile/use-gravatar' => '您可以上传头像或使用<a href="http://gravatar.com/">Gravatar</a>',
    'account/profile/photo/delete' => '删除头像',
    'account/profile/other' => '其它信息',
    'account/profile/votes-per-day' => '可用表决',
    'account/profile/votes-left' => '剩余表决',
    'account/profile/timezone' => '时区',
    'account/profile/language' => '语言',
    'account/profile/saved' => '数据已保存',

    'account/access/change-password' => '修改密码',
    'account/access/change-password/current' => '当前密码',
    'account/access/change-password/new' => '新密码',
    'account/access/change-password/new-confirm' => '再次确认新密码',
    'account/access/change-password/current-password-is-incorrect' => '您输出的密码不正确',
    'account/access/change-password/saved' => '密码修改成功',
    'account/access/self-delete' => '注销账号',
    'account/access/self-delete/password-is-incorrect' => '您输出的密码不正确',

    'account/specs/weight' => '比重',

    'account/specs/conflicts/filter/all' => '所有',
    'account/specs/conflicts/filter/i-disagree' => '我不同意',
    'account/specs/conflicts/filter/do-not-agree-with-me' => '不同意我的看法',
    'account/specs/conflicts/filter/errors' => '警告',

    'account/specs/conflicts/title/object' => '目标',
    'account/specs/conflicts/title/object/engine' => '发动机',
    'account/specs/conflicts/title/parameter' => '参数',
    'account/specs/conflicts/title/my-value' => '我的价值',
    'account/specs/conflicts/title/other-values' => '其他价值',

    'account/specs/conflicts/my-value/none' => '暂无',

    'account/email/your-current-email:' => '您当前的电子邮件地址：',
    'account/email/your-dont-enter-email' => '您没有输入电子邮件地址',
    'account/email/text' => '您可以在本页修改您的电子邮件地址。

确认邮件已发送到您的新电子邮箱地址。',

    'account/accounts/add' => '添加帐户',
    'account/accounts/remove' => '取消',
    'account/accounts/removed' => '取消账户',
    'account/accounts/connect-failed' => '未能关联帐户，发生错误或该帐户拒绝访问',
    'account/accounts/disconnect-failed' => '无法删除该帐户。

这种情况可能由捆绑账户是唯一的身份验证方法引起，即：没有指定的电子邮件或其他帐户。',

    'account/delete/text' => '我们为您来到这一页面感到惋惜，请您确认打算永远离开我们的网站。

按下红色按钮，所有与你相关的数据将被匿名或删除。

这个过程是不可逆的，请仔细思考，不要草率决定。',
    'account/deleted/text' => '删除帐户
祝您幸福。',

    'feedback/title' => '反馈',
    'feedback/name'  => '标题',
    'feedback/message' => '内容',
    'feedback/donate-text' => '如果您希望表达自己的支持，您可以通过[捐款支持](/donate)',
    'feedback/sent' => '您的信息已发送',

    'map/museums-and-factories' => '工厂及博物馆',

    'picture/image-specifications' => '图像参数',
    'picture/added-by:' => '贡献者:',
    'picture/location' => 'Coordinates',
    'picture/status:' => '图片状态:',
    'picture/status/inbox' => '尚未审核',
    'picture/status/accepted' => '已通过',
    'picture/status/removing' => '被删除',
    'picture/propose-image-replacement' => '建议替换图片',
    'picture/moderators-about-this-picture' => '相关管理员',
    'picture/all-images-have-owners' => '任何图片都有权益人。',
    'picture/if-you-found-error' => '如果您认为有用户存在不正确的上传行为，我们诚挚地请您撰写评论并指出错误。',
    'picture/where-to-talk' => '前往<a href="/forums/">论坛</a>可以讨论任何车型的任何话题。',
    'picture/other-languages' => '其它语言翻译',
    'picture/picture-suggested-to-replace' => '图片被建议更换',
    'picture/that-engine-is-mounted-to-vehicle' => '配备此发动机的车辆有',
    'picture/that-engine-is-mounted-to-vehicles:' => '配备此发动机的车辆有于:',
    'picture/factory-details' => '工厂详情...',
    'picture/on-that-factory-produced-vehicle' => '该工厂生产的车辆有',
    'picture/on-that-factory-produced-vehicles:' => '该工厂生产的车辆有：',
    'picture/on-that-factory-produced-vehicles/and' => '还有',
    'picture/on-that-factory-produced-vehicles/and-other' => '其它 ...',

    'user/name' => '用户名',
    'user/password' => '密码',
    'user/password-confirm' => '确认密码',

    'users/user/known-as:' => '用户名: ',
    'users/user/before-known-as:' => '先前用户名： ',
    'users/user/type:' => '身份: ',
    'users/user/type/moderator' => '管理员',
    'users/user/type/visitor' => '访客',

    'users/user/upload-pictures:' => '已上传图片: ',
    'users/user/pictures-left-on-site:' => '被采纳图片: ',

    'users/comments/order/new' => '新',
    'users/comments/order/old' => '老',
    'users/comments/order/positive' => '赞',
    'users/comments/order/negative' => '踩',

    'users/for-moderators' => '管理员页面',
    'users/for-moderators/remove-photo' => '删除用户图片',
    'users/for-moderators/remove-user' => '删除用户',
    'users/for-moderators/last-visit-from-ip' => '最后访问IP地址：',

    'ban/that-address-is-banned' => '本地址已被屏蔽',
    'ban/until' => '直到',
    'ban/unban' => '解除屏蔽',
    'ban/ban' => '屏蔽',
    'ban/reason' => '原因',
    'ban/period' => '时长',
    'ban/period/hour' => '1小时',
    'ban/period/2-hours' => '2小时',
    'ban/period/4-hours' => '4小时',
    'ban/period/8-hours' => '8小时',
    'ban/period/16-hours' => '16小时',
    'ban/period/day' => '1天',
    'ban/period/2-days' => '2天',

    'users/user/recent-activity' => '最新动态',
    'users/user/recent-uploads' => '最新上传',
    'users/user/recent-comments' => '最新评论',
    'users/user/registration-date' => '注册时间',
    'users/user/last-visited' => '最后登陆于',
    'users/user/send-personal-message' => '发送站内信',
    'users/user/log' => '在线中',
    'users/user/uploaded-pictures' => '已上传图片',
    'users/user/not-upload-pictures' => '未上传图片',

    'users/rating/specifications' => '性能参数',
    'users/rating/pictures' => '图片',
    'users/rating/likes' => '赞',
    'users/rating/picture-likes' => '收到赞',
    'users/rating/specs-volume' => '数量',
    'users/rating/weight' => '权重',

    'users/registration/email-confirm-subject' => '注册于%1$s',
    'users/registration/email-confirm-message' =>
        "您好.\n" .
        "您已成功注册 %1\$s\n" .
        "详细注册信息请见:\n" .
        "电子邮件地址: %2\$s\n" .
        "为了确认注册, 请您点击链接进入电子邮件 %3\$s\n\n" .
        "如果您没有注册成功，请删除这条消息\n\n" .
        "诚挚的机器人 %4\$s",
    'users/registration/email-confirm/token-not-found' => '链接已超时',
    'users/registration/email-confirm/success-text' => '您的电子邮件地址已成功确认。',
    'users/registration/success/email-sent' => '用于确认电子邮件地址的邮件已发送。',
    'users/change-email/confirm-subject' => '电子邮件确认于%1$s',
    'users/change-email/confirm-message' =>
        "您好.\n\n" .
        "在 %1\$s 您或他人要求修改账户联系地址为 %2\$s\n" .
        "为了验证操作, 您需要点击链接 %3\$s\n\n" .
        "如果这条信息错误发送到您的收件箱，请删除\n\n" .
        "诚挚的机器人 %1\$s\n",
    'users/change-email/confirmation-message-sent' => '验证邮件已发送到您的电子邮箱',

    'user/add-to-contacts' => '添加到好友',
    'user/remove-from-contacts' => '从好友中删除',

    'donate/text' => '尽管我们始终努力坚持非盈利运营，但百科网站终归需要金钱去维持。

网站发展和技术支持总是需要花费。

如果您希望资助我们每日的工作，可以通过PayPal或Yandex.Money进行捐助。

在捐助的同时可以告诉我们您对网站的愿景。

原则上我们进行不记名捐助，但如果您要求，我们会标记您的贡献。

我们还可以让您[钦定今日之车](/donate/vod)做为回报',
    'donate/target' => '为了维持网站运营',
    'donate/project' => 'WheelsAge.org',
    'donate/comment-hint' => '您的建议',
    'donate/success-text' => '感谢您的支持。 
我们尽己所能让您满意。',

    'donate/vod/text' => '我们可以做出一点微小的工作作为回报-您有机会钦定下一个“今日之车”，无论您做出任意数额的[无条件捐助](/donate) 我们都会很高兴。',
    'donate/vod/select-date' => '1. 选择日期',
    'donate/vod/date-busy' => '日期已有安排',
    'donate/vod/select-item' => '2. 选择车型',
    'donate/vod/select-item-text' => '几乎所有车型都可以被选作 "今日之车"，但还是有一些限制:

- 车辆是首次作为今日之车
- 车辆至少有3张图片',
    'donate/vod/select-item/selection:' => '选择: ',
    'donate/vod/select-item/select' => '选择 ...',
    'donate/vod/preview' => '3. 预览',
    'donate/vod/anonymous' => '匿名捐助',
    'donate/vod/with-name' => '记名捐助 (需要注册)',
    'donate/vod/make-donation' => '4. 做出捐助',
    'donate/vod/order-message' => 'WheelsAge.org: 今日之车',
    'donate/vod/order-target' => '订单%s',
    'donate/vod/message' => '您的期许',
    'donate/vod/price:' => '金额:',
    'donate/vod/price/currency' => ' 卢布',
    'donate/vod/price-aroud' => '约合$%s',
    'donate/vod/method/credit-card' => '信用卡',
    'donate/vod/method/mobile' => '手机运营商账户',
    'donate/vod/method/yandex.money' => 'Yandex.Money',
    'donate/vod/send' => '支付',

    'donate/vod/success-text' => '收到来自您的捐款信息后我们将会执行您的选择。 
感谢您的支持。 

我们尽己所能让您满意。',
    'donate/vod/wants-to-select?' => '想要钦定今日之车?',

    'message/user-cancel-car-engine' => '%1$s为%2$s车型取消%3$s( %4$s )发动机',

    'car-type/roadster'       => '跑车',
    'car-type/spyder'         => '敞篷跑车',
    'car-type/cabriolet'      => '敞篷轿车',
    'car-type/cabrio-coupe'   => '敞篷双门轿车',
    'car-type/targa'          => 'Targa',
    'car-type/coupe'          => '双门轿车',
    'car-type/sedan'          => '轿车',
    'car-type/hatchback'      => '掀背轿车',
    'car-type/crossover'      => '跨界车',
    'car-type/universal'      => '旅行车',
    'car-type/limousine'      => '加长轿车',
    'car-type/pickup'         => '皮卡',
    'car-type/caravan'        => '厢式客车',
    'car-type/offroad'        => 'SUV',
    'car-type/minivan'        => '小型厢式车',
    'car-type/van'            => '厢式货车',
    'car-type/truck'          => '货车',
    'car-type/bus'            => '客车',
    'car-type/phaeton'        => 'Phaeton',
    'car-type/4door-hardtop'  => '四门硬顶轿车',
    'car-type/landau'         => 'Landau',
    'car-type/offroad-cabrio' => '敞篷SUV',
    'car-type/liftback-coupe' => 'Liftback-coupe',
    'car-type/liftback-sedan' => 'Liftback-sedan',
    'car-type/2door-hardtop'  => '双门硬顶轿车',
    'car-type/minibus'        => '小型客车',
    'car-type/car'            => '轿车',
    'car-type/multiplex-bus'  => '铰接客车',
    'car-type/offroad-short'  => '小型SUV',
    'car-type/brougham'       => 'Brougham',
    'car-type/fastback-sedan' => '溜背轿车',
    'car-type/fastback-coupe' => '溜背双门轿车',
    'car-type/tonneau'        => 'Tonneau',
    'car-type/2-floor-bus'    => '双层客车',
    'car-type/town-car'       => 'Town car',
    'car-type/barchetta'      => 'Barchetta',
    'car-type/moto'           => '摩托车',
    'car-type/tractor'        => '拖拉机',
    'car-type/tracked'        => '履带底盘',

    'car-type-rp/roadster'       => '跑车',
    'car-type-rp/spyder'         => '敞篷跑车',
    'car-type-rp/cabriolet'      => '敞篷轿车',
    'car-type-rp/cabrio-coupe'   => '敞篷双门轿车',
    'car-type-rp/targa'          => 'Targa',
    'car-type-rp/coupe'          => '双门轿车',
    'car-type-rp/sedan'          => '轿车',
    'car-type-rp/hatchback'      => '掀背轿车',
    'car-type-rp/crossover'      => '跨界车',
    'car-type-rp/universal'      => '旅行轿车',
    'car-type-rp/limousine'      => '加长轿车',
    'car-type-rp/pickup'         => '皮卡',
    'car-type-rp/caravan'        => '厢式客车',
    'car-type-rp/offroad'        => 'SUV',
    'car-type-rp/minivan'        => '小型厢式车',
    'car-type-rp/van'            => '厢式货车',
    'car-type-rp/truck'          => '货车',
    'car-type-rp/bus'            => '客车',
    'car-type-rp/phaeton'        => 'Phaeton',
    'car-type-rp/4door-hardtop'  => '四门硬顶轿车',
    'car-type-rp/landau'         => 'Landau',
    'car-type-rp/offroad-cabrio' => '敞篷SUV',
    'car-type-rp/liftback-coupe' => 'Liftback-coupe',
    'car-type-rp/liftback-sedan' => 'Liftback-sedan',
    'car-type-rp/2door-hardtop'  => '双门硬顶轿车',
    'car-type-rp/minibus'        => '小型客车',
    'car-type-rp/car'            => '轿车',
    'car-type-rp/multiplex-bus'  => '铰接客车',
    'car-type-rp/offroad-short'  => '小型SUV',
    'car-type-rp/brougham'       => 'Brougham',
    'car-type-rp/fastback-sedan' => '溜背轿车',
    'car-type-rp/fastback-coupe' => '溜背双门轿车',
    'car-type-rp/tonneau'        => 'Tonneau',
    'car-type-rp/2-floor-bus'    => '双层客车',
    'car-type-rp/town-car'       => 'Town car',
    'car-type-rp/barchetta'      => 'Barchetta',
    'car-type-rp/moto'           => '摩托车',
    'car-type-rp/tractor'        => '拖拉机',
    'car-type-rp/tracked'        => '履带底盘',

    'about/text' => '### 我们的团队
来到这里投入时间和知识的人们是本网站存在的根基。

我们当中既有人添加图片，也有人帮助修改错误。有的人钟爱某一品牌，也有人喜爱所有车型。不仅有人一步步充实网站，更有人贡献出自己稀有的图片收藏。

在这个庞大的群体中，每个人都与众不同，这里是一些主要成员：

%users%

#### "不同颜色的用户名"

首先，我们当中一些人被一种特殊的颜色标记着———绿色，这是一个特殊的标签，当你看到绿色用户名时，可以向他们任何一位咨询关于网站的问题，因为绿色代表着本站最重要、最热情的一群人。

绿色用户名往往意味着管理员身份。

### 意见反馈

如果您有任何意见、建议或其他的想法，可以到[论坛](/forums/)联系他们, 选择通过站内信或写“[意见反馈](/ng/feedback)”为网站管理提建议。

如果您有关于广告、交换链接或推广产品的问题，很抱歉：我们不设置广告。

### 资源

对于庞大的图片数量我们不能免俗地产生一种自豪感，并且想把这些数字公布出来，下面只是其中一部分:

* 线上收录了超过%total-pictures%张图片、%total-vehicles%款车型，数据总量超过%total-size%。
* 逾%total-users%名用户发表了超过%total-comments%条评论。

### 开发

网站的发展和技术支持主要来自%developer%([首要贡献者](https://github.com/autowp/autowp/graphs/contributors))

法语页面建设者: %fr-translator%

中文页面建设者: %zh-translator%

技术支持：[Zend Framework](http://framework.zend.com/)、[jQuery](http://jquery.com/)、[Twitter bootstrap](http://getbootstrap.com/)，还有许多优秀的计算机语言。

网站源代码向所有人开放，每个人都有机会影响网站的性质和质量。

%github%

[![Build Status](https://travis-ci.org/autowp/autowp.svg?branch=master)](https://travis-ci.org/autowp/autowp)
[![Code Climate](https://codeclimate.com/github/autowp/autowp/badges/gpa.svg)](https://codeclimate.com/github/autowp/autowp)
[![Coverage Status](https://coveralls.io/repos/github/autowp/autowp/badge.svg?branch=master)](https://coveralls.io/github/autowp/autowp?branch=master)

### 支持我们

您可以通过[捐助](/donate) 或[反馈意见](/ng/feedback)支持我们网站
欲添加更多语言请参与 [翻译网站](https://github.com/autowp/autowp/tree/master/module/Application/language) 。',

    'page/1/name' => "主页",
    'page/2/name' => "主目录",
    'page/10/name' => "品牌",
    'page/14/name' => "%BRAND_NAME%按推出时间排序",
    'page/15/name' => "%BRAND_NAME%的最新图片",
    'page/19/name' => "品牌",
    'page/20/name' => "生产商类型",
    'page/21/name' => "汽车之最",
    'page/22/name' => "用途类别",
    'page/24/name' => "限量或特别版本",
    'page/25/name' => "姊妹车型",
    'page/27/name' => "%TWINS_GROUP_NAME%技术参数",
    'page/28/name' => "%TWINS_GROUP_NAME%的所有图片",
    'page/29/name' => "添加图片",
    'page/30/name' => "选择品牌",
    'page/31/name' => "相关文章",
    'page/34/name' => "%CAR_NAME%的所有图片",
    'page/36/name' => "%CAR_NAME%的技术参数",
    'page/37/name' => "%BRAND_NAME%的概念车或原型车",
    'page/39/name' => "%BRAND_NAME%的商标",
    'page/40/name' => "%BRAND_NAME%的其它图片",
    'page/41/name' => "未分类图片",
    'page/42/name' => "论坛",
    'page/45/name' => "新主题",
    'page/48/name' => "个人主页",
    'page/49/name' => "站内信",
    'page/51/name' => "最新添加",
    'page/52/name' => "注册",
    'page/53/name' => "确定",
    'page/54/name' => "确认邮箱地址",
    'page/55/name' => "我的电子邮箱",
    'page/56/name' => "已更改",
    'page/57/name' => "论坛订阅更新",
    'page/60/name' => "重设密码",
    'page/61/name' => "所有品牌",
    'page/63/name' => "用户上传的图片",
    'page/66/name' => "%BRAND_NAME% %DESIGN_PROJECT_NAME%的所有图片",
    'page/67/name' => "管理员页面",
    'page/68/name' => "页面",
    'page/69/name' => "添加",
    'page/70/name' => "修改",
    'page/71/name' => "权限",
    'page/73/name' => "图片",
    'page/74/name' => "按字母排序",
    'page/75/name' => "操作日志",
    'page/76/name' => "等待审核",
    'page/77/name' => "交通",
    'page/79/name' => "登录",
    'page/80/name' => "已发送",
    'page/81/name' => "系统消息",
    'page/83/name' => "移动",
    'page/86/name' => "图片已成功上传",
    'page/87/name' => "更多",
    'page/89/name' => "意见反馈",
    'page/90/name' => "注销",
    'page/91/name' => "注册",
    'page/93/name' => "已发送信息",
    'page/94/name' => "未审核图片",
    'page/96/name' => "多重目录车型",
    'page/97/name' => "角度",
    'page/100/name' => "属性",
    'page/102/name' => "%CAR_NAME%性能参数编辑器",
    'page/103/name' => "历史记录",
    'page/104/name' => "用户统计",
    'page/105/name' => "添加评论",
    'page/106/name' => "规定",
    'page/107/name' => "规定",
    'page/109/name' => "剖视",
    'page/110/name' => "意见反馈",
    'page/114/name' => "Specifications log",
    'page/117/name' => "地图",
    'page/119/name' => "贡献排行榜",
    'page/120/name' => "版块",
    'page/122/name' => "技术参数",
    'page/123/name' => "我的账号",
    'page/124/name' => "有谁在线?",
    'page/125/name' => "分类",
    'page/126/name' => "添加",
    'page/127/name' => "编辑",
    'page/128/name' => "收件箱",
    'page/129/name' => "头像",
    'page/130/name' => "已贡献图片",
    'page/131/name' => "Items",
    'page/133/name' => "账号管理",
    'page/134/name' => "设定新密码",
    'page/135/name' => "新密码已保存",
    'page/136/name' => "关于我们",
    'page/137/name' => "删除账号",
    'page/138/name' => "%BRAND_NAME% %CAR_TYPE_NAME%按车型及推出时间排序",
    'page/141/name' => "%BRAND_NAME%的图片",
    'page/144/name' => "Parent selection",
    'page/148/name' => "剪裁",
    'page/149/name' => "移动图片",
    'page/153/name' => "%BRAND_NAME%姊妹车型",
    'page/155/name' => "Most %MOST_NAME% %CAR_TYPE_NAME%",
    'page/156/name' => "Most %MOST_NAME% %CAR_TYPE_NAME% %YEAR_NAME%",
    'page/159/name' => "博物馆",
    'page/161/name' => "活跃度",
    'page/162/name' => "所有图片",
    'page/164/name' => "最顶级的",
    'page/165/name' => "最顶级的%MOST_NAME% %BRAND_NAME%",
    'page/166/name' => "最顶级的%MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME%",
    'page/167/name' => "最顶级的%MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME% %YEAR_NAME%",
    'page/173/name' => "贡献排行榜",
    'page/174/name' => "技术参数",
    'page/175/name' => "工厂",
    'page/176/name' => "添加",
    'page/180/name' => "工厂",
    'page/182/name' => "制品",
    'page/186/name' => "所有图片",
    'page/188/name' => "纠纷",
    'page/189/name' => "纠纷",
    'page/196/name' => "捐助",
    'page/197/name' => "历史标题",
    'page/198/name' => "好友",

    'page/1/title' => "汽车图片的百科全书。WheelsAge.org",
    'page/14/title' => "%BRAND_NAME%按推出时间排序",
    'page/15/title' => "%BRAND_NAME%的最新图片",
    'page/19/title' => "品牌",
    'page/21/title' => "汽车之最",
    'page/22/title' => "用途类别",
    'page/25/title' => "姊妹车型",
    'page/27/title' => "%TWINS_GROUP_NAME%技术参数",
    'page/28/title' => "%TWINS_GROUP_NAME%所有图片",
    'page/29/title' => "添加图片",
    'page/30/title' => "选择品牌",
    'page/31/title' => "相关文章",
    'page/34/title' => "%CAR_NAME%的所有图片",
    'page/36/title' => "%CAR_NAME%的技术参数",
    'page/37/title' => "%BRAND_NAME%的概念车或原型车",
    'page/39/title' => "%BRAND_NAME%的商标",
    'page/40/title' => "%BRAND_NAME%的其它",
    'page/41/title' => "未分类",
    'page/42/title' => "论坛",
    'page/45/title' => "新主题",
    'page/48/title' => "个人主页",
    'page/49/title' => "站内信",
    'page/51/title' => "最新添加",
    'page/52/title' => "注册",
    'page/53/title' => "确定",
    'page/54/title' => "确认邮箱地址",
    'page/55/title' => "我的电子邮箱",
    'page/56/title' => "更改电子邮箱",
    'page/57/title' => "论坛订阅更新",
    'page/60/title' => "重设密码",
    'page/63/title' => "用户上传的图片",
    'page/66/title' => "%BRAND_NAME% %DESIGN_PROJECT_NAME%的所有图片",
    'page/76/title' => "等待审核",
    'page/79/title' => "登录",
    'page/80/title' => "已发送",
    'page/81/title' => "系统消息",
    'page/83/title' => "移动",
    'page/86/title' => "图片已成功上传",
    'page/87/title' => "更多",
    'page/94/title' => "未审核图片",
    'page/102/title' => "%CAR_NAME%性能参数编辑器",
    'page/103/title' => "历史记录",
    'page/105/title' => "添加评论",
    'page/106/title' => "规定",
    'page/107/title' => "规定",
    'page/110/title' => "意见反馈",
    'page/114/title' => "Specifications log",
    'page/117/title' => "地图",
    'page/122/title' => "技术参数",
    'page/123/title' => "我的账号",
    'page/125/title' => "分类",
    'page/126/title' => "添加",
    'page/127/title' => "编辑",
    'page/128/title' => "收件箱",
    'page/129/title' => "头像",
    'page/130/title' => "已贡献图片",
    'page/133/title' => "访问控制",
    'page/134/title' => "设定新密码",
    'page/136/title' => "关于我们",
    'page/138/title' => "%BRAND_NAME% %CAR_TYPE_NAME%按推出时间排序",
    'page/141/title' => "%BRAND_NAME%的图片",
    'page/144/title' => "Parent selection",
    'page/148/title' => "Cropper",
    'page/149/title' => "移动图片",
    'page/153/title' => "%BRAND_NAME% Twins",
    'page/155/title' => "Most %MOST_NAME% %CAR_TYPE_NAME%",
    'page/156/title' => "Most %MOST_NAME% %CAR_TYPE_NAME% %YEAR_NAME%",
    'page/161/title' => "活跃度",
    'page/162/title' => "所有图片",
    'page/164/title' => "最顶级的",
    'page/165/title' => "Most %MOST_NAME% %BRAND_NAME%",
    'page/166/title' => "Most %MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME%",
    'page/167/title' => "最顶级的%MOST_NAME% %CAR_TYPE_NAME% %BRAND_NAME% %YEAR_NAME%",
    'page/173/title' => "详细",
    'page/174/title' => "统计",
    'page/175/title' => "工厂",
    'page/176/title' => "添加",
    'page/180/title' => "工厂",
    'page/182/title' => "制品",
    'page/186/title' => "所有图片",
    'page/188/title' => "争议",
    'page/189/title' => "争议",
    'page/196/title' => "捐助",
    'page/197/title' => "历史标题",
    'page/198/title' => "好友",

    'page/14/breadcrumbs' => "按推出时间排序",
    'page/15/breadcrumbs' => "最新图片",
    'page/19/breadcrumbs' => "品牌",
    'page/27/breadcrumbs' => "性能参数",
    'page/28/breadcrumbs' => "所有图片",
    'page/30/breadcrumbs' => "选择品牌",
    'page/31/breadcrumbs' => "相关文章",
    'page/34/breadcrumbs' => "所有图片",
    'page/36/breadcrumbs' => "性能参数",
    'page/37/breadcrumbs' => "概念车 & 原型车",
    'page/39/breadcrumbs' => "商标",
    'page/40/breadcrumbs' => "杂项",
    'page/41/breadcrumbs' => "未分类",
    'page/45/breadcrumbs' => "新主题",
    'page/63/breadcrumbs' => "用户的图片",
    'page/66/breadcrumbs' => "所有图片",
    'page/83/breadcrumbs' => "移动",
    'page/86/breadcrumbs' => "成功",
    'page/102/breadcrumbs' => "性能参数编辑器",
    'page/109/breadcrumbs' => "剖视",
    'page/122/breadcrumbs' => "性能参数",
    'page/123/breadcrumbs' => "我的账号",
    'page/141/breadcrumbs' => "%BRAND_NAME% pictures",
    'page/144/breadcrumbs' => "Parent selection",
    'page/148/breadcrumbs' => "Cropper",
    'page/149/breadcrumbs' => "移动图片",
    'page/161/breadcrumbs' => "动态",
    'page/164/breadcrumbs' => "Mosts",
    'page/173/breadcrumbs' => "贡献排行榜",
    'page/174/breadcrumbs' => "性能参数",
    'page/175/breadcrumbs' => "工厂",
    'page/176/breadcrumbs' => "添加",
    'page/180/breadcrumbs' => "工厂",
    'page/182/breadcrumbs' => "制品",
    'page/186/breadcrumbs' => "图片",
    'page/188/breadcrumbs' => "争议",
    'page/189/breadcrumbs' => "Low weight",
    'page/196/breadcrumbs' => "捐助",
    'page/197/breadcrumbs' => "撰写历史",
    'page/198/breadcrumbs' => "联系我们",

    'page/201/name'        => "立标",
    'page/201/title'       => "立标",
    'page/201/breadcrumbs' => "立标",

    'page/202/name'        => '剖视',
    'page/202/title'       => '剖视',
    'page/202/breadcrumbs' => '剖视',

    'page/203/name'        => '用户',
    'page/203/title'       => '用户',
    'page/203/breadcrumbs' => '用户',

    'page/204/name'        => 'Telegram',
    'page/204/title'       => 'Telegram',
    'page/204/breadcrumbs' => 'Telegram',

    'page/205/name'        => '评论',
    'page/205/title'       => '评论',
    'page/205/breadcrumbs' => '评论',

    'page/208/name'        => '%BRAND_NAME% Engines',
    'page/208/title'       => '%BRAND_NAME% Engines',
    'page/208/breadcrumbs' => '%BRAND_NAME% Engines',

    'page/211/name'        => '好友',
    'page/211/title'       => '好友',
    'page/211/breadcrumbs' => '好友',

    'page/212/name'        => 'Picture vote templates',
    'page/212/title'       => 'Picture vote templates',
    'page/212/breadcrumbs' => 'Picture vote templates',

    'moder-menu/title' => '管理员菜单',
    'moder-menu/inbox' => '收件箱',

    'moder/database-id-%s' => '数据库id: %s',
    'ng/moder/database-id-n' => '数据库id: {id}',

    'moder/picture/missing-perspective' => '缺少视角',
    'moder/picture/delete-queue' => '垃圾箱',
    'moder/picture/votes' => '表决',
    'moder/picture/comments' => '评论',
    'moder/picture/new-votes' => '新表决',
    'moder/picture/replaces' => '替换',
    'moder/picture/edit/special-name' => 'Special name',

    'moder/pictures/acceptance/message' => '站内信',

    'moder/vehicle/name' => '车名',
    'moder/vehicle/body' => '车身代号',
    'moder/vehicle/spec' => '规格',
    'moder/vehicle/type' => '型号',
    'moder/vehicle/model-years' => '年款',
    'moder/vehicle/begin' => '投产',
    'moder/vehicle/end' => '停产',
    'moder/item/produced' => '产量',
    'moder/item/produced/number' => 'number',
    'moder/item/produced/precision' => 'exactly?',
    'moder/item/produced/about' => 'about',
    'moder/item/produced/exactly' => 'exactly',
    'moder/vehicle/concept' => '概念车(原型车)',
    'moder/vehicle/group' => '组',
    'moder/vehicle/year' => '年',
    'moder/vehicle/year/from' => 'from',
    'moder/vehicle/year/to' => 'to',
    'moder/vehicle/month' => '月',
    'moder/vehicle/today' => '现在',
    'moder/vehicle/today/ended' => '截止',
    'moder/vehicle/today/continue' => '至今.',
    'moder/vehicle/is-concept/no' => '否',
    'moder/vehicle/is-concept/yes' => '是',
    'moder/vehicle/is-concept/inherited-no' => '无继承性',
    'moder/vehicle/is-concept/inherited-yes' => '有继承性',
    'moder/vehicle/is-concept/inherited' => '已有继承性',

    'moder/item/short-description' => 'Short description',
    'moder/item/full-description' => 'Full description',

    'moder/vehicle/meta/description' => '简介',

    'moder/vehicle/move/here' => 'here',

    'moder/vehicle/add/as-submodel' => 'As submodel',

    'attrs/attribute/name' => 'Name',
    'attrs/attribute/type' => 'Type',
    'attrs/attribute/unit' => 'Unit',
    'attrs/attribute/precision' => 'Precision (for float attribute)',
    'attrs/attribute/description' => '简介',

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

    'moder/picture/edit-picture-%s' => '编辑图片№%s',
    'moder/picture/edit-item-%s' => '编辑%s',
    'moder/picture/edit-brand-%s' => '编辑品牌%s',
    'moder/picture/edit-engine-%s' => '编辑发动机%s',
    'moder/picture/edit-factory-%s' => '编辑工厂%s',

    'moder/picture/picture-n-%s' => '图片№%s',
    'moder/picture/previous' => '<< 上一张',
    'moder/picture/next' => '下一张>>',
    'moder/picture/previous-new' => '<<上上张',
    'moder/picture/next-new' => '下下张>>',

    'moder/picture/perspective' => '视角',
    'moder/picture/perspective-by' => '视角: ',

    'moder/picture/acceptance' => '状态/删除/通过',
    'moder/picture/acceptance/accepted' => '已通过',
    'moder/picture/acceptance/not-accepted' => '未通过',
    'moder/picture/acceptance/in-delete-queue' => '垃圾箱',
    'moder/picture/acceptance/accept' => '通过',
    'moder/picture/acceptance/delete' => '删除',
    'moder/picture/acceptance/unaccept' => '不通过',
    'moder/picture/acceptance/restore' => '恢复',
    'moder/picture/acceptance/removed' => '已删除',
    'moder/picture/acceptance/removing' => 'Deleting',
    'moder/picture/acceptance/inbox' => 'Inbox',
    'moder/picture/acceptance/reason' => 'Reason',
    'moder/picture/acceptance/custom' => 'Custom ...',
    'moder/picture/acceptance/add-reason' => 'Add template',
    'moder/picture/acceptance/vote' => 'Vote',

    'moder/picture/acceptance/want-accept' => '求通过',
    'moder/picture/acceptance/want-delete' => '求删除',
    'moder/picture/acceptance/cancel-vote' => '取消我的表决',
    'moder/picture/acceptance/already-voted' => '已表决: ',
    'moder/picture/acceptance/that-is-one-accepted-picture' => '此车唯一的图片',
    'ng/moder/picture/acceptance/accepted-pictures-is-n' => '接受的图片仍然属于{count}',
    'moder/picture/acceptance/accepted-pictures-is-%s' => '接受的图片仍然属于%s',

    'moder/picture/public-url:' => 'Public URL: ',
    'moder/picture/image:' => 'Image: ',
    'moder/picture/image-specs:' => 'Image specs: ',
    'moder/picture/resolution:' => 'Resolution: ',
    'moder/picture/filesize:' => 'File size: ',
    'moder/picture/upload-date:' => 'Upload date: ',
    'moder/picture/settings' => 'Settings',
    'moder/picture/copyrights' => '版权',

    'moder/pciture/move/brands' => '品牌',
    'moder/pciture/move/factories' => '工厂',
    'moder/pciture/move/engines' => '发动机',

    'brand' => 'Brand',
    'brand/name' => '名字',
    'brand/logo' => '商标',

    'moder/brands/meta-data/full-name' => '全名',
    'moder/brands/logo/description' => '* 商标必须是PNG格式。
* 所有的透明区域必须是透明的，而不是白的！
* 标识必须靠近边缘，不需要留白。
* 上传最大分辨率的图像——这是为了追求更好的质量和未来使用它的能力。商标在网站上自动缩放。',
    'moder/brands/logo/saved' => 'Logotype saved',

    'moder/edit-object' => '编辑',

    'moder/markdown/description' => 'Markdown syntax.

使用指南:
[1](https://en.wikipedia.org/wiki/Markdown),
[2](https://guides.github.com/features/mastering-markdown/),
[3](https://daringfireball.net/projects/markdown/basics),

Internal hyperlinks must be relative: ~~http://autowp.ru/bmw/~~ */bmw/*',
    'moder/markdown/edit' => '编辑',
    'moder/markdown/preview' => '预览',
    'moder/markdown/history' => '历史',

    'moder/users/login' => '登录',
    'moder/users/name' => '用户名',
    'moder/users/role' => '职务',
    'moder/users/profile' => '头像',
    'moder/users/last-visit' => '最后访问于',
    'moder/users/registration' => '注册',

    'latitude' => 'Latitude',
    'longtitude' => 'Longtitude',

    'museum/name' => '名字',
    'museum/address' => '地址',
    'museum/photo' => '图片',
    'museum/description' => '介绍',

    'moder/museums/add' => '添加博物馆',

    'factory/name' => '名字',
    'factory/year_from' => '起始年份',
    'factory/year_to' => '终止年份',

    'moder/comments/title' => '评论',
    'moder/comments/filter' => 'Filter',
    'moder/comments/filter/user-id' => '用户№',
    'moder/comments/filter/brand-id' => '品牌№',
    'moder/comments/filter/moderator_attention' => 'Moderator attention',
    'moder/comments/filter/moderator_attention/not-matters' => 'Not matters',
    'moder/comments/filter/moderator_attention/not-required' => 'Not required',
    'moder/comments/filter/moderator_attention/required' => 'Required',
    'moder/comments/filter/moderator_attention/resolved' => 'Resolved',
    'moder/comments/filter/vehicle-id' => 'Item',
    'moder/comments/not-readed' => '未读',

    'engine/name' => 'Name',

    'moder/engines/engine/vehicles' => '配备该发动机的车型',

    'page/name' => '名称',
    'page/is_group_node' => 'Is group node?',
    'page/registered_only' => 'Only for registered?',
    'page/guests_only' => 'Only for guests?',
    'page/class' => '等级',
    'page/parent' => 'Parent',

    'moder/pages/new' => 'New',

    'moder/index/other-tools' => '其它工具',

    'moder/acl/add-role' => 'Add role',
    'moder/acl/add-rule' => 'Add rule',
    'moder/acl/add-rule/action' => 'Action',
    'moder/acl/add-rule/action/allow' => 'allow',
    'moder/acl/add-rule/action/deny' => 'deny',
    'moder/acl/add-parent' => 'Add parent',
    'moder/acl/role' => 'Role',
    'moder/acl/parent-role' => 'Parent role',
    'moder/acl/privilege' => 'Privilege',

    'votings/do-vote' => '表决',
    'votings/who-voted' => '表决用户',
    'votings/voting/voters/during-%s-%s' => '从%s至%s期间的表决',
    'votings/voting/voters/show-all' => '显示全部',
    'votings/voting/voters/show-contributors' => '从100张已上传图片中显示',

    'museums/museum/address:' => '地址:',
    'museums/museum/on-the-map' => '显示地图',
    'museums/museum/website:' => '网站: ',

    'restore-password/text' => '如果您忘记了密码，请输入注册时使用的电子邮件地址设置新密码',
    'restore-password/new-password/text' => '请输入新密码',
    'restore-password/new-password/saved' => '新密码已保存。

请不要忘记，',
    'restore-password/new-password/instructions-sent' => '说明已发送到您的电子邮箱',
    'restore-password/new-password/email-not-found' => '未找到该电子邮箱匹配用户',
    'restore-password/new-password/mail/subject' => '恢复密码',
    'restore-password/new-password/mail/body-%s' =>
        "请在链接中输入新密码：%s\n\n" .
        "诚挚的www.wheelsage.org\n机器人",

    'twins/group/name' => '名字',
    'twins/group/description' => '简介',

    'specifications-editor/description' => '由于所有数据将公开，请您认真进行所有操作。


本身的结构特征。

所有技术参数都组织成“选项——数据”的结构，数据可以是数字或文本。

每项技术参数可以被多个用户同时限定，在这种情况下，当前（旧）数据在系统中优先显示。

如果对之前输入的数据存在异议，您可以联系作者，系统会自动通知作者数据产生了争议。


所有被输入的数据都会显示在网站上，如“汽车之最”中的技术参数和网站其它一些地方。',
    'specifications-editor/not-save' => '数据保存失败，详情如下',
    'specifications-editor/parameter' => '参数',
    'specifications-editor/your-value' => '您的数据',
    'specifications-editor/actual-value' => '当前数据',
    'specifications-editor/all-values' => '所有数据',
    'specifications-editor/tabs/info' => '信息',
    'specifications-editor/tabs/engine' => '发动机',
    'specifications-editor/tabs/specs' => '性能参数',
    'specifications-editor/tabs/result' => '结果',
    'specifications-editor/tabs/admin' => 'Admin',
    'specifications-editor/engine' => '从目录中查看发动机',
    'specifications-editor/engine/inherited-from' => '继承自',
    'specifications-editor/engine/select-another' => '选择其它发动机',
    'specifications-editor/engine/cancel' => '取消发动机',
    'specifications-editor/engine/inherit' => '继承发动机',
    'specifications-editor/engine/not-selected' => '[未选择]',
    'specifications-editor/engine/select' => '选择发动机',
    'specifications-editor/engine/dont-inherit' => '不继承发动机',
    'specifications-editor/save' => '上传',

    'specifications-editor/log' => '输入数据',
    'specifications-editor/log/date' => '日期',
    'specifications-editor/log/user' => '用户',
    'specifications-editor/log/object' => '目标',
    'specifications-editor/log/attribute' => '属性',
    'specifications-editor/log/value' => '数据',
    'specifications-editor/log/editor' => '编辑器',
    'specifications-editor/log/to-editor' => '前往编辑器',
    'specifications-editor/log/filter/user-id' => 'User',
    'specifications-editor/log/low-weight-text' => '您输入过大量有争议的数据，其他用户经常质疑您提供的资料。

数据输入暂时被中止，请等争议经过审核后先进行更正。

请进入[专用接口](/account/specs-conflicts/conflict/minus-weight)，这里收集了其它用户提出的争议。',
    'specifications-editor/errors-alert' => '**注意!** 您输入的数据已经积累了大量误差。

您可以到[这里](/account/specs-conflicts)查看其它用户的数据',

    'specifications-editor/admin/date' => '日期',
    'specifications-editor/admin/user' => '用户',
    'specifications-editor/admin/parameter' => '参数',
    'specifications-editor/admin/value' => '数据',
    'specifications-editor/admin/move' => '移动',

    'pm/user-%s-edited-brand-description-%s-%s' => '用户%s编辑了品牌介绍%s ( %s )',
    'pm/user-%s-edited-item-language-%s-%s' => "User %s edited language data %s ( %s )\n%s",
    'pm/user-%s-edited-vehicle-meta-data-%s-%s-%s' => "用户%s编辑了型基本数据%s ( %s )\n%s",
    'pm/user-%s-adds-item-%s-%s-to-item-%s-%s' => 'User %s added %s ( %s ) to %s ( %s )',
    'pm/user-%s-removed-item-%s-%s-from-item-%s-%s' => 'User %s removed %s ( %s ) from %s ( %s )',
    'pm/user-%s-cancel-link-vehicle-%s-%s-with-categories-%s' => '用户%s为车型%s ( %s )取消了到目录: %s的关联',
    'pm/user-%s-edited-factory-description-%s-%s' => '用户%s编辑了工厂介绍%s ( %s )',
    'pm/your-picture-%s-enqueued-to-remove-%s' => "您的图片%s已被删除\n%s",
    'pm/new-picture-%s-vote-%s/accept' => "收到接受图片表决\n%s\nReason: %s",
    'pm/new-picture-%s-vote-%s/delete' => "收到删除图片表决\n%s\nReason: %s",
    'pm/user-%s-edited-picture-copyrights-%s-%s' => '用户%s编辑了图片版权%s ( %s )',
    'pm/user-%s-accept-replace-%s-%s' => '%s接受了替换申请%s на %s',
    'pm/your-picture-accepted-%s' => "您的图片已通过\n%s",
    'pm/user-%s-edited-twins-description-%s-%s' => '用户%s编辑了%s ( %s )',
    'pm/user-%s-edited-vehicle-specs-%s' => '%s编辑了车型性能参数 %s',
    'pm/user-%s-canceled-vehicle-engine-%s-%s-%s' => '%s取消了%s ( %s )的发动机%s',
    'pm/user-%s-set-inherited-vehicle-engine-%s-%s' => '%s为车型%s ( %s )设定了继承发动机%s',
    'pm/user-%s-set-vehicle-engine-%s-%s-%s' => '%s为车型 %s ( %s )设定了发动机%s',
    'pm/user-%s-replies-to-you-%s' => "%s回复了您\n%s",
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

    'moder/vehicle/changes/boolean/true' => '是',
    'moder/vehicle/changes/boolean/false' => '否',

    'specifications/no-value-text' => '无数据',
    'specifications/boolean/false' => '否',
    'specifications/boolean/true' => '是',

    "Brand '%value%' already exists" => "'%value%'已经存在",
    "E-mail '%value%' not registered" => "电子邮件'%value%未注册",
    "E-mail '%value%' already registered" => "电子邮件'%value%'已注册",

    'specs/attrs/45' => '改款名称',
    'specs/attrs/95' => '推出年份',
    'specs/attrs/95/96' => '从',
    'specs/attrs/95/97' => '至',
    'specs/attrs/95/106' => '销售',
    'specs/attrs/95/106/109' => '从',
    'specs/attrs/95/106/109/129' => '年',
    'specs/attrs/95/106/109/130' => '月',
    'specs/attrs/95/106/109/131' => '日',
    'specs/attrs/95/106/111' => '在',
    'specs/attrs/95/106/111/132' => '年',
    'specs/attrs/95/106/111/133' => '月',
    'specs/attrs/95/106/111/134' => '日',
    'specs/attrs/95/104' => '型号',
    'specs/attrs/95/104/113' => '从',
    'specs/attrs/95/104/114' => '至',
    'specs/attrs/95/107' => '在车展亮相',
    'specs/attrs/95/107/118' => '年',
    'specs/attrs/95/107/119' => '月',
    'specs/attrs/95/107/120' => '日',
    'specs/attrs/95/108' => '生产',
    'specs/attrs/95/108/121' => '从',
    'specs/attrs/95/108/121/123' => '年',
    'specs/attrs/95/108/121/124' => '月',
    'specs/attrs/95/108/121/125' => '日',
    'specs/attrs/95/108/122' => '至',
    'specs/attrs/95/108/122/126' => '年',
    'specs/attrs/95/108/122/127' => '月',
    'specs/attrs/95/108/122/128' => '日',
    'specs/attrs/95/135' => '参加赛事',
    'specs/attrs/95/135/136' => '从',
    'specs/attrs/95/135/137' => '至',
    'specs/attrs/16' => '基本信息',
    'specs/attrs/16/12' => '座位数',
    'specs/attrs/16/12/67' => '共',
    'specs/attrs/16/12/67/description' => '座位数',
    'specs/attrs/16/12/68' => '有缺陷',
    'specs/attrs/16/12/69' => '站立乘客数量',
    'specs/attrs/16/12/103' => '载客量',
    'specs/attrs/16/12/103/description' => '含站立乘客数量',
    'specs/attrs/16/13' => '车门数',
    'specs/attrs/16/66' => '转向装置',
    'specs/attrs/16/66/options/11' => '左侧',
    'specs/attrs/16/66/options/12' => '右侧',
    'specs/attrs/16/66/options/13' => '中央',
    'specs/attrs/16/204' => '设计',
    'specs/attrs/16/204/options/85' => '轴承',
    'specs/attrs/16/204/options/86' => '底盘',
    'specs/attrs/14' => '外观',
    'specs/attrs/14/4' => 'wheel base',
    'specs/attrs/14/17' => '外形尺寸',
    'specs/attrs/14/17/description' => '外形尺寸',
    'specs/attrs/14/17/1' => '长度',
    'specs/attrs/14/17/2' => '宽度',
    'specs/attrs/14/17/3' => '高度',
    'specs/attrs/14/17/140' => '宽度，含外后视镜',
    'specs/attrs/14/17/141' => '高度，含围栏',
    'specs/attrs/14/17/203' => '敞篷高度',
    'specs/attrs/14/18' => '布局',
    'specs/attrs/14/18/5' => '前部',
    'specs/attrs/14/18/6' => '后部',
    'specs/attrs/14/63' => '空气阻力',
    'specs/attrs/14/63/64' => '挡风玻璃',
    'specs/attrs/14/63/65' => '侧部',
    'specs/attrs/14/167' => '离地间隙',
    'specs/attrs/14/167/description' => '空重',
    'specs/attrs/14/167/176' => '分钟',
    'specs/attrs/14/167/7' => '标准',
    'specs/attrs/14/167/168' => '最大',
    'specs/attrs/70' => '质量',
    'specs/attrs/70/71' => 'dry',
    'specs/attrs/70/72' => '整备质量',
    'specs/attrs/70/73' => '满载质量',
    'specs/attrs/22' => '发动机',
    'specs/attrs/22/100' => '名称',
    'specs/attrs/22/98' => '燃料',
    'specs/attrs/22/98/options/28' => '汽油',
    'specs/attrs/22/98/options/29' => '氢',
    'specs/attrs/22/98/options/30' => '生物乙醇',
    'specs/attrs/22/98/options/31' => '电',
    'specs/attrs/22/98/options/32' => '天然气',
    'specs/attrs/22/98/options/33' => '柴油',
    'specs/attrs/22/98/options/84' => '弹性燃料',
    'specs/attrs/22/98/options/36' => 'A-66汽油',
    'specs/attrs/22/98/options/37' => 'А-70汽油',
    'specs/attrs/22/98/options/38' => 'А-72汽油',
    'specs/attrs/22/98/options/39' => 'А-76汽油',
    'specs/attrs/22/98/options/40' => 'А-78汽油',
    'specs/attrs/22/98/options/41' => 'А-80汽油',
    'specs/attrs/22/98/options/42' => 'AI-92汽油',
    'specs/attrs/22/98/options/43' => 'AI-93汽油',
    'specs/attrs/22/98/options/44' => 'AI-95汽油',
    'specs/attrs/22/98/options/45' => 'АI-98汽油',
    'specs/attrs/22/98/options/34' => 'CNG',
    'specs/attrs/22/98/options/35' => 'LPG',
    'specs/attrs/22/19' => '位置',
    'specs/attrs/22/19/20' => '位置',
    'specs/attrs/22/19/20/options/1' => '前部',
    'specs/attrs/22/19/20/options/2' => '后部',
    'specs/attrs/22/19/20/options/3' => '中部',
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
    'specs/attrs/22/32/171' => '最大扭矩 (DIN)',
    'specs/attrs/22/32/171/description' => 'Power by DIN 70020. European standard',
    'specs/attrs/22/32/172' => '最大功率 (SAE certified)',
    'specs/attrs/22/32/172/description' => 'SAE Certified Power. US standard 2005-06',
    'specs/attrs/22/32/173' => 'max power (SAE net)',
    'specs/attrs/22/32/173/description' => 'US standard 1971-72.
Transmission is not considered. Attachments - considered',
    'specs/attrs/22/32/174' => 'max power (SAE gross)',
    'specs/attrs/22/32/174/description' => 'US standard 1972 year, roughly corresponding to the power measurement technology to 1972.
Transmission is not considered',
    'specs/attrs/22/32/177' => '最大功率 (JIS D 1001)',
    'specs/attrs/22/32/178' => '最大功率 (GOST)',
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
    'specs/attrs/54/60/61' => '最小',
    'specs/attrs/54/60/62' => '最大',
    'specs/attrs/54/78' => 'fuel consumption',
    'specs/attrs/54/78/183' => 'Unknown method',
    'specs/attrs/54/78/183/79' => 'city',
    'specs/attrs/54/78/183/80' => 'highway',
    'specs/attrs/54/78/183/81' => 'mixed',
    'specs/attrs/54/78/184' => 'ECE',
    'specs/attrs/54/78/184/185' => '90 km/h',
    'specs/attrs/54/78/184/186' => '120 km/h',
    'specs/attrs/54/78/184/187' => '城市',
    'specs/attrs/54/78/184/188' => '综合',
    'specs/attrs/54/78/189' => 'EPA (to 2008)',
    'specs/attrs/54/78/189/190' => '城市',
    'specs/attrs/54/78/189/191' => '高速',
    'specs/attrs/54/78/192' => 'EPA (from 2008)',
    'specs/attrs/54/78/192/193' => '城市',
    'specs/attrs/54/78/192/194' => '高速',
    'specs/attrs/54/78/199' => 'EU 93/116/EC',
    'specs/attrs/54/78/199/200' => '郊区',
    'specs/attrs/54/78/199/201' => 'extra urban',
    'specs/attrs/54/78/199/202' => '综合',
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
    'specs/attrs/157/options/71' => '欧I',
    'specs/attrs/157/options/72' => '欧II',
    'specs/attrs/157/options/73' => '欧III',
    'specs/attrs/157/options/74' => '欧IV',
    'specs/attrs/157/options/75' => '欧V',
    'specs/attrs/157/options/76' => '欧V+',
    'specs/attrs/157/options/77' => '欧VI',
    'specs/attrs/170' => '生产地',

    'specs/unit/1/abbr' => 'mm',
    'specs/unit/1/name' => '毫米',
    'specs/unit/2/abbr' => 'kg',
    'specs/unit/2/name' => '千克',
    'specs/unit/3/abbr' => 'm',
    'specs/unit/3/name' => '米',
    'specs/unit/4/abbr' => 'cc',
    'specs/unit/4/name' => '立方厘米',
    'specs/unit/5/abbr' => 'hp',
    'specs/unit/5/name' => '马力',
    'specs/unit/6/abbr' => 'rpm',
    'specs/unit/6/name' => '转/分钟',
    'specs/unit/7/abbr' => 'Nm',
    'specs/unit/7/name' => '牛米',
    'specs/unit/8/abbr' => 'km/h',
    'specs/unit/8/name' => '公里/时',
    'specs/unit/9/abbr' => 's',
    'specs/unit/9/name' => '秒',
    'specs/unit/10/abbr' => '%',
    'specs/unit/10/name' => '百分之',
    'specs/unit/11/abbr' => '°',
    'specs/unit/11/name' => '度',
    'specs/unit/12/abbr' => 'l',
    'specs/unit/12/name' => '升',
    'specs/unit/13/abbr' => 'l/100km',
    'specs/unit/13/name' => '升/100公里',
    'specs/unit/14/abbr' => 'CO2 g/km',
    'specs/unit/14/name' => 'CO2排放 克/公里',
    'specs/unit/15/abbr' => '″',
    'specs/unit/15/name' => '英寸',
    'specs/unit/16/abbr' => 'y.',
    'specs/unit/16/name' => '年',
    'specs/unit/17/abbr' => 'PS',
    'specs/unit/17/name' => '匹马力',
    'specs/unit/18/abbr' => 'kW',
    'specs/unit/18/name' => 'k千瓦',
    'specs/unit/19/abbr' => 'V',
    'specs/unit/19/name' => 'v伏',
    'specs/unit/20/abbr' => 'm³',
    'specs/unit/20/name' => '立方米',

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

    'moder/statistics/photos-with-copyrights' => '有版权图片',
    'moder/statistics/vehicles-with-4-or-more-photos' => '有4张以上图片的车型',
    'moder/statistics/specifications-values' => '性能参数数据',
    'moder/statistics/brand-logos' => '商标',
    'moder/statistics/from-years' => '投产年份',
    'moder/statistics/from-and-to-years' => '停产年份',
    'moder/statistics/from-and-to-years-and-months' => '投产及停产年月'
]);
