<?php 

return [
    'services' => [
        'form_builder' => [
            'name' => 'Form builder',
            'base_url' => env('FORM_BUILDER_BASE_URL',''),
            'api_key' => env('FORM_BUILDER_API_KEY','')
        ],
        'booking' => [
            'name' => 'booking',
            'base_url' => env('BOOKING_BASE_URL',''),
            'api_key' => env('BOOKING_API_KEY','')
        ],
        'core_clinic' => [
            'name' => 'core clinic',
            'base_url' => env('CORE_CLINIC_BASE_URL',''),
            'api_key' => env('CORE_CLINIC_API_KEY','')
        ],

        'permission' => [
            'name' => 'permission',
            'base_url' => env('PERMISSION_BASE_URL',''),
            'api_key' => env('PERMISSION_API_KEY','')
        ],
        
    ]
];