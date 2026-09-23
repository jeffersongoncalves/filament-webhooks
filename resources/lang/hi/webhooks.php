<?php

return [
    'navigation_label' => 'वेबहुक',
    'model_label' => 'वेबहुक',
    'plural_model_label' => 'वेबहुक',
    'form' => [
        'section_endpoint' => 'एंडपॉइंट',
        'section_events' => 'इवेंट',
        'name' => 'नाम',
        'url' => 'URL',
        'secret' => 'सीक्रेट',
        'secret_helper' => 'पेलोड पर हस्ताक्षर करने के लिए उपयोग किया जाता है। बिना हस्ताक्षर वाले अनुरोध भेजने के लिए खाली छोड़ें।',
        'generate_secret' => 'सीक्रेट जनरेट करें',
        'model' => 'मॉडल',
        'model_helper' => 'इस वेबहुक को सीमित करने के लिए पूर्ण मॉडल क्लास। सभी मॉडल सुनने के लिए खाली छोड़ें।',
        'events' => 'इवेंट',
        'is_active' => 'सक्रिय',
    ],
    'table' => [
        'name' => 'नाम',
        'url' => 'URL',
        'events' => 'इवेंट',
        'is_active' => 'सक्रिय',
        'created_at' => 'बनाया गया',
    ],
    'actions' => [
        'test' => [
            'label' => 'परीक्षण',
            'success' => 'परीक्षण वेबहुक सफलतापूर्वक डिलीवर हुआ।',
            'failed' => 'परीक्षण वेबहुक डिलीवर नहीं हो सका।',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'डिलीवरी लॉग',
            'success' => 'सफल',
            'event' => 'इवेंट',
            'response_code' => 'प्रतिक्रिया कोड',
            'error_message' => 'त्रुटि',
            'attempt' => 'प्रयास',
            'created_at' => 'बनाया गया',
        ],
    ],
];
