<?php

return [
    'subscribe/mail'                                               => 'subscribe/mail',
    'subscribe/activate/<code:\\w+>'                               => 'subscribe/activate',

    'cabinet/profile'                                              => 'cabinet/profile',
    'voznesenie2016'                                               => 'site/voznesenie2016',

    'cabinet/passwordChange'                                       => 'cabinet/password_change',
    'cabinet/changeEmail'                                          => 'cabinet/change_email',
    'changeEmail/activate/<code:\\w+>'                             => 'auth/change_email_activate',


    'password/recover'                                             => 'auth/password_recover',
    'password/recover/activate/<code:\\w+>'                        => 'auth/password_recover_activate',
    'registration/<code:\\w+>'                                     => 'auth/registration_referal',

    'captcha'                                                      => 'site/captcha',

    'checkBoxTreeMask/add'                                         => 'check_box_tree_mask/add',
    'checkBoxTreeMask/addInto'                                     => 'check_box_tree_mask/add_into',
    'checkBoxTreeMask/delete'                                      => 'check_box_tree_mask/delete',

    'upload/upload'                                                => 'upload/upload',
    'upload/HtmlContent2'                                          => 'html_content/upload',

    '/'                                                            => 'site/index',
    'log'                                                          => 'site/log',
    'activate/<code:\\w+>'                                         => 'site/activate',
    'logDb'                                                        => 'site/log_db',
    'contact'                                                      => 'site/contact',
    'login'                                                        => 'site/login',
    'logout'                                                       => 'site/logout',
    'articles'                                                     => 'site/articles',
    'articles/<year:\\d{4}>/<month:\\d{2}>/<day:\\d{2}>/<id:\\w+>' => 'site/article',
    'articles/<year:\\d{4}>/<month:\\d{2}>'                        => 'site/articles_month',


    'about'                                                        => 'site/about',
    'search'                                                       => 'site/search',


    'admin'                                                        => 'admin_article/main',
    'admin/articleList'                                            => 'admin_article/index',
    'admin/articleList/add'                                        => 'admin_article/add',
    'admin/articleList/<id:\\d+>/delete'                           => 'admin_article/delete',
    'admin/articleList/<id:\\d+>/edit'                             => 'admin_article/edit',

    'admin/pages'                                                  => 'admin_page/index',
    'admin/pages/add'                                              => 'admin_page/add',
    'admin/pages/<id:\\d+>/delete'                                 => 'admin_page/delete',
    'admin/pages/<id:\\d+>/edit'                                   => 'admin_page/edit',


];