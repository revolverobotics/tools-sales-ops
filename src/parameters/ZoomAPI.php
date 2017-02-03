<?php

return [

    'accounts' => [

        'createSubAccount' => [

            'request' => [

                'required' => [

                    'email'      => 'A valid email address. It must be unique in Zoom service. If an email address is existed, a "user existing" error message will be return.',
                    'first_name' => 'User\'s first name.',
                    'last_name'  => 'User\'s last name.',
                    'password'   => 'User\'s password.'

                ],

                'optional' => [

                    'enable_share_rc',
                    'share_rc',
                    'enable_share_mc',
                    'share_mc',
                    'pay_mode',
                    'collection_method',
                    'enable_pstn',
                    'enable_enforce_login',
                    'enable_enforce_login_sd',
                    'enforce_login_domains',
                    'meeting_capacity',
                    'disable_cmr_reminder'

                ]
            ],

            'response' => [

                'json' => [
                    'id'          => 'w40hUJRpRmmkx4uPXczdHg',
                    'owner_id'    => 'uY3xXZZIQ8mt_oMJ-7dRTQ',
                    'owner_email' => 'test@zoom.us',
                    'created_at'  => '2012-11-25T12:00:00Z'
                ]

            ]
        ]
    ]

];
